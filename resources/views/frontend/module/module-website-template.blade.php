{{--<!--Seciton Website-Templates 建站模板-->--}}
<section class="wrapper-module-container module-website-template {{ $style or '' }}">
    <div class="block-in">


        {{--<!--header-->--}}
        <div class="module-header-box">
            <div class="module-header-title-row wow fadeInUp" data-wow-delay=".1s">
                <h2 class="">{{ $module_name or '建站模板' }}</h2>
            </div>
            <div class="module-header-desc-row wow fadeInUp" data-wow-delay=".2s">
                <h4 class="">Website Templates</h4>
            </div>
        </div>


        {{--<!--body-->--}}
        <div class="module-body-box wow fadeInUp" data-wow-delay=".3s">

            @foreach($datas as $v)
                <a target="_blank" href="{{ url('/website/template/'.encode($v->id)) }}">
                    <div class="rectangle-container grow">
                        <div class="before-box before-3-4">
                            <div class="before-inner">
                                <img src="{{ config('common.host.'.env('APP_ENV').'.cdn').'/'.$v->cover_pic }}" alt="">
                            </div>
                        </div>
                        <div class="before-outer">
                            <div class="height-40px line-48px row-ellipsis">
                                <b>{{ $v->title or '' }}</b>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>


        {{--<!--footer-->--}}
        <div class="module-footer-box wow fadeInUp" data-wow-delay=".4s">
            @if(!empty($module_type) && $module_type == 'paginate')
                {{ $datas->links() }}
            @else
                <div class="text-center">
                    <a target="_blank" href="{{url('/website/templates')}}" class="home-customer-more wow fadeInRight" data-wow-delay=".8s">
                        查看更多 <i class="icon-hand-right"></i>
                    </a>
                </div>
            @endif
        </div>


    </div>
</section>
