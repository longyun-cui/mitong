{{--<!--Content-->--}}
<div class="wrapper-module-container module-none-padding module-fixed-menu module-about">

    <div class="block-full">

        <!--Banner-->
        @if(!empty($about_banner_img))
            <section class="module-fixed-banner">
                <img src="{{ $about_banner_img or '' }}" width="100%" alt="" />
            </section>
        @endif

    </div>

    <div class="block-full module-fixed-breadcrumb">

        <div class="block-in">

            <!--Breadcrumb-->
            <section>

                <ol class="breadcrumb text-right">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> 首页</a></li>
                    <li><a href="{{ url('/about') }}"><i class="fa "></i> 关于米同</a></li>
                    <li><a href="javascript:void(0);"><i class="fa "></i> {{ $about_name or '' }}</a></li>
                </ol>

            </section>

        </div>

    </div>

    <div class="block-in">
        <div class="content clearfix">


            <!--Breadcrumb-->
            <section class="module-fixed-body">

                <div class="aside-left-box">

                    <nav class="aside-nav aside-left" id="aside-nav">
                        <b class="round" id="aside-round">&nbsp;</b>
                        <ul class="list-unstyled">

                            <li class="{{ $about_news_active or '' }}">
                                <a href="{{ url('about/news') }}">新闻动态</a>
                            </li>

                            <li class="{{ $about_layout_active or '' }}">
                                <a href="{{ url('about/layout') }}">米同布局</a>
                            </li>

                            <li class="{{ $about_introduction_active or '' }}">
                                <a href="{{ url('about/introduction') }}">企业介绍</a>
                            </li>

                            <li class="{{ $about_honor_active or '' }}">
                                <a href="{{ url('about/honor') }}">资质与荣誉</a>
                            </li>

                            <li class="{{ $about_partner_active or '' }}">
                                <a href="{{ url('about/partner') }}">合作伙伴</a>
                            </li>

                            <li class="{{ $about_message_active or '' }}">
                                <a href="{{ url('about/message') }}">在线留言</a>
                            </li>

                            <li class="{{ $about_evaluate_active or '' }}">
                                <a href="{{ url('about/evaluate') }}">客户评价</a>
                            </li>

                        </ul>
                    </nav>

                </div>

                <div class="aside-right-box">

                        <!--Column Name-->
                        <div class="module-header-bin">
                            <div class="module-title-row"><h3><font>{{ $about_name or '' }}</font></h3></div>
                            <div class="module-desc-row">{{ $about_description or '' }}</div>
                        </div>

                        <!--Company Container-->
                        <div class="module-content-bin">
                            {!! $about_data or '' !!}
                            @yield('about-content')
                        </div>

                </div>

            </section>


        </div>
    </div>

</div>