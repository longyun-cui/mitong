{{--<!--Nav Container-->--}}
<section class="nav-container">
    <div class="container">

        <!--Logo-->
        <div class="pull-left logo"><a href="{{ url('/') }}"><img src="/mitong/picture/logo.png" alt="" height="100%" />
            </a></div>
        <!--Logo Text-->
        <div class="pull-left logo-text">
            <p>
                米同智能营销云平台
            </p>
            <p>
                米同科技旗下产品
            </p>

        </div>

        <!--Search-->

        <!--Member-->
        <div class="member-btns pull-right">
            <a href="http://seo.shmitong.com:99/Service/Home/home" target='_blank' class="member-btn clearfix" target="_blank"><span>用户登录</span><i class="icon-user"></i></a>
        </div>

        <!--Nav-->
        <nav class="nav pull-right hidden-sm hidden-xs" id="nav">
            <div class="line" id="nav-line">&nbsp;</div>
            <ul class="list-unstyled clearfix">
                <li>
                    <a href="{{ url('/') }}" data-info="首 页">米同科技</a>
                </li>
                <li>
                    <a href="{{ url('/platform') }}" data-info="平台概览">平台概览</a>
                    <div class="nav-childs platform-childs">
                        <div class="container">
                            <div class="pull-right list">
                                <dl>
                                    <dd class="type-1">
                                        <a href="{{ url('/platform') }}" class="icon">平台优势</a>
                                        <div class="text">
                                            广告投放全程系统监控，自动调优策略与投放细节，智能提升广告效果。
                                        </div>
                                    </dd>
                                    <dd class="type-2">
                                        <a href="{{ url('/platform') }}" class="icon">平台资源</a>
                                        <div class="text">
                                            将网络营销中需要的各种渠道、工具、资源都聚集到一起，按照多维的...
                                        </div>
                                    </dd>
                                    <dd class="type-3">
                                        <a href="{{ url('/platform') }}" class="icon">行业趋势</a>
                                        <div class="text">
                                            新的模式不单单对于广告主，网络营销（未来必须也包含线下广告）的...
                                        </div>
                                    </dd>
                                    <dd class="type-4">
                                        <a href="{{ url('/platform') }}" class="icon">平台价值</a>
                                        <div class="text">
                                            有机整合权威第三方及米同十年沉淀的用户数据，打造适当中国营销...
                                        </div>
                                    </dd>

                                </dl>
                            </div>
                            <div class="pull-right title">
                                <h2>平台概览</h2>
                                <a href="{{ url('/platform') }}" class="view">LEARN MORE</a>
                            </div>
                        </div>
                    </div>
                </li>
                {{--服务产品--}}
                <li style="display:none;">
                    <a href="products_Cloud.php.html" data-info="数字商业云">服务产品</a>
                    <!--Child-->
                    <div class="nav-childs pro-childs">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 pull-right">

                                    <a href="index.html#" class="max-name">搜索引擎</a>

                                    <a href="products_Cloud_Show.php-cid=4&amp;id=4.html" class="max-list">舆情公关<br/></a>
                                    <a href="products_Cloud_Show.php-cid=4&amp;id=3.html" class="max-list">网站代运营<br/></a>
                                    <a href="products_Cloud_Show.php-cid=4&amp;id=2.html" class="max-list">网站优化<br/></a>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!--Child-->
                </li>
                <li>
                    <a href="{{ url('/services') }}" data-info="关于米同">服务产品</a>
                    <div class="nav-childs about-childs">
                        <div class="container">
                            <div class="pull-right items-box">
                                <dl class="list-unstyled list">
                                    <dd><a href="{{ url('/service/SEO') }}">SEO搜索引擎优化</a></dd>
                                    <dd><a href="{{ url('/service/PR') }}">危机公关</a></dd>
                                    <dd><a href="{{ url('/service/AIBully') }}">智能AI霸屏</a></dd>
                                </dl>
                            </div>
                            <div class="pull-right items-box text-right">
                                <a href="{{ url('/services') }}" class="title block clearfix"><div>服务产品</div></a>
                                <span class="text block clearfix">专注于数字营销的技术、产品、服务的创新与整合致力于成为中国领先智能营销云平台</span>

                            </div>
                        </div>
                    </div>
                </li>
                {{--SEO案例--}}
                <li style="display:none;">
                    <a href="{{ url('/seo/cases') }}" data-info="案例">SEO案例</a>
                </li>
                {{--企业建站--}}
                <li style="display:none;">
                    <a href="{{ url('/website/templates') }}" data-info="案例">企业建站</a>
                </li>
                {{--关于米同--}}
                <li>
                    <a href="{{ url('/about') }}" data-info="案例">关于米同</a>
                </li>
                {{--关于米同--}}
                <li style="display:none;">
                    <a href="{{ url('/about') }}" data-info="关于米同">关于米同</a>
                    <div class="nav-childs about-childs">
                        <div class="container">
                            <div class="pull-right items-box">
                                <dl class="list-unstyled list">
                                    <dd><a href="about.php-cid=10.html">新闻动态</a></dd>
                                    <dd><a href="about.php-cid=13.html">米同布局</a></dd>
                                </dl>
                            </div>
                            <div class="pull-right items-box">
                                <dl class="list-unstyled list">
                                    <dd>
                                        <a href="{{ url('/about/introduction') }}">企业介绍</a>
                                    </dd>
                                    <dd>
                                        <a href="{{ url('/about/honor') }}">资质与荣誉</a>
                                    </dd>
                                    <dd>
                                        <a href="{{ url('/about/partner') }}">合作伙伴</a>
                                    </dd>
                                    {{--<dd>--}}
                                        {{--<a href="{{ url('/about/evaluate') }}">客户评价</a>--}}
                                    {{--</dd>--}}
                                    <dd >
                                        <a href="{{ url('/about/message') }}">在线留言</a>
                                    </dd>
                                </dl>
                            </div>
                            <div class="pull-right items-box text-right">
                                <a href="about_Home.php.html" class="title block clearfix"><div>关于米同</div></a>
                                <span class="text block clearfix">专注于数字营销的技术、产品、服务的创新与整合致力于成为中国领先智能营销云平台</span>

                            </div>
                        </div>
                    </div>
                </li>
                <li style="display:none;"><a href="#contact">联系我们</a></li>
                <li><a href="{{ url('/joinUS') }}">招商加盟</a></li>
            </ul>
        </nav>

    </div>
</section>