{{--<!--Seciton Cases 案例-->--}}
<section class="wrapper-module-container section-case background-fixed bg-fixed-map-point">
    <div class="row full block-in">


        {{--<!--header-->--}}
        <div class="module-header-box">
            <div class="module-header-title-row wow fadeInUp" data-wow-delay=".2s">
                <h2 class="">SEO 案例展示</h2>
            </div>
            <div class="module-header-desc-row wow fadeInUp" data-wow-delay=".4s">
                <h4 class="">Seo Cases</h4>
            </div>
        </div>

        <!--Case-->
        <div class="module-body-box wow fadeInUp" data-wow-delay=".4s">
            <ul class="list-unstyled clearfix">

                @foreach($datas as $v)
                    <li class="rectangle-container">
                        <table>
                            <tbody>
                                <tr>
                                    <td colspan="2" class="keyword ">
                                        <a target="_blank" href="https://www.baidu.com/s?ie=UTF-8&wd={{$v->keywords or ''}}">{{$v->keywords or ''}}</a>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td class="td-left">网址</td>
                                    <td class="row-ellipsis">{{$v->link_url or ''}}</td>
                                </tr>
                                <tr>
                                    <td class="td-left">初始排名</td>
                                    <td class="row-ellipsis">{{ json_decode($v->custom)->previous_rank }}</td></tr>
                                <tr>
                                    <td class="td-left">当前排名</td>
                                    <td class="row-ellipsis">{{ json_decode($v->custom)->after_rank }}</td></tr>
                                <tr>
                                    <td class="td-left">渠道</td>
                                    <td>
                                        @if($v->type == 1)
                                            <a target="_blank" href="https://www.baidu.com/s?ie=UTF-8&wd={{$v->keywords or ''}}">
                                                <img src="/mitong/images/pc.png">
                                            </a>
                                        @elseif($v->type == 2)
                                            <a target="_blank" href="https://m.baidu.com/s?ie=UTF-8&wd={{$v->keywords or ''}}">
                                                <img src="/mitong/images/phone.png">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                @endforeach



                @for($i=0; $i<3; $i++)
                    <a target="_blank" href="">
                        <li class="rectangle-container _none" style="display:none;">
                            <div class="before-box before-1-2">
                                <div class="rectangle-inner">
                                    <img class="vcenter" alt="" src="/mitong/uploads/image/20180414/1523708035.jpg">
                                </div>
                            </div>
                            <div class="width-full height-auto">
                                <div class="width-full height-32px line-32px font-16px">
                                    <b>快快贷</b>
                                </div>
                                <div class="width-full height-48px line-24px font-14px text-left">
                                    <p><i class="fa fa-check-circle-o"></i> 行业：金融</p>
                                    <p><i class="fa fa-check-circle-o"></i> 服务核心应用：SEO案例</p>
                                </div>
                                <div class="width-full height-48px line-32px font-14px text-left">
                                    <a href="javascript:void(0);"> 浏览 129</a>
                                    <a href="http://www.jiathis.com/share?uid=0" class="pull-right"><i class="icon-share"></i></a>
                                </div>
                            </div>
                        </li>
                    </a>
                @endfor

            </ul>
        </div>


        <div class="text-center">
            <a target="_blank" href="{{ url('seo/cases') }}" class="home-customer-more wow fadeInRight" data-wow-delay=".8s">
                查看更多 <i class="icon-hand-right"></i>
            </a>
        </div>

    </div>
</section>
