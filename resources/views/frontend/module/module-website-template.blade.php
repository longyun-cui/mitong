<div class="row full wrapper-module-container module-template {{ $style or '' }}">
    <div class="col-md-14">
        <div class="row full block-in">


            <div class="module-header-container wow fadeInUp" data-wow-delay=".2s">
                <span class="menu-title"><b>网站模板</b></span>
            </div>

            <div class="module-block-container rectangle-col-4 wow fadeInUp" data-wow-delay=".4s">

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

            <div class="module-footer-container">
                <div class="text-center">
                    <a href="javascript:void(0);" class="home-customer-more wow fadeInRight" data-wow-delay=".8s" target="_blank">
                        查看更多 &nbsp;&nbsp;<i class="icon-hand-right"></i>
                    </a>
                </div>
            </div>


        </div>
    </div>
</div>
