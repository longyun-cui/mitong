{{--footer--}}
<section class="footer-navs hidden-xs">
</section>

<div class="wrapper-footer-container" id="contact" style="border-top: 2px solid #e34f43">


    <div class="block-in">
        <div class="footer-title-row"><b>企业简介</b></div>
        <div class="">
            {{$info->description or '暂无简介'}}
        </div>
    </div>
    <div class="">&nbsp;</div>


    <div class="block-in">

        <div class="footer-title-row"><b>网站地图</b></div>
        <div class="">
            @foreach($menus as $menu)
                <a href="{{ url('/menu/'.encode($menu->id)) }}">{{ $menu->title }}</a>
                @if(!$loop->last)|@endif
            @endforeach
        </div>
        <div class="">&nbsp;</div>

        <div class="footer-title-row">
            <b>联系方式</b>
            <div class="footer-block-row">
                @if(!empty($info->wechat_qrcode))
                <div class="footer-block">
                    <div class="footer-block-top">
                        <img src="{{ url($info->wechat_qrcode) }}"/>
                    </div>
                    <div class="footer-block-bottom">
                        微信二维码
                    </div>
                </div>
                @endif
            </div>
        </div>
        @if(!empty($info->address))
            <div class=""><i class="fa fa-location-arrow"></i> 地址： {{$info->address or ''}}</div>
        @endif
        @if(!empty($info->after_sale))
            <div class=""><i class="fa fa-phone"></i> 全国售前热线： {{$info->pre_sale or ''}}</div>
        @endif
        @if(!empty($info->after_sale))
            <div class=""><i class="fa fa-phone"></i> 全国售后热线： {{$info->after_sale or ''}}</div>
        @endif

        @if(!empty($info->email))
            <div class=""><i class="fa fa-envelope"></i> 邮箱： {{$info->email or ''}}</div>
        @endif
        @if(!empty($info->wechat_id))
            <div class=""><i class="fa fa-weixin"></i> 微信： {{$info->wechat_id or ''}}</div>
        @endif
        @if(!empty($info->weibo_name))
            <div class=""><i class="fa fa-weibo"></i> 微博：
                @if(!empty($info->weibo_address))
                    <a target="_blank" href="{{$info->weibo_address or ''}}">{{$info->weibo_name or ''}}</a>
                @else
                    {{$info->weibo_name or ''}}
                @endif
            </div>
        @endif

        <div class="">&nbsp;</div>
        <div class="">版权所有 <a target="_blank" href="javascript:void(0);">©上海米同网络科技有限公司</a></div>
        <div class=""><a target="_blank" href="http://www.miitbeian.gov.cn">沪ICP备18011005号</a></div>

    </div>


</div>

{{--footer--}}
<div class="footer" style="display:none;">
    <div class="bt-scroll-top"><i class="icon-arrow-down"></i> </div>
    <div class="social-links" style="display: none">
        <a href="https://www.instagram.com/softorg/" target="_blank">
            <img src="{{asset('/frontend/themes/vipp/assets/img/instagram.webp')}}" alt="instagram"/>
        </a>
        <a href="https://www.facebook.com/softorgdotcom/" target="_blank">
            <img src="{{asset('/frontend/themes/vipp/assets/img/facebook.webp')}}" alt="facebook"/>
        </a>
        <a href="https://www.pinterest.com/softorgdotcom/" target="_blank">
            <img src="{{asset('/frontend/themes/vipp/assets/img/pinterest.webp')}}" alt="pinterest"/>
        </a>
        <a href="https://www.linkedin.com/company/softorg" target="_blank">
            <img src="{{asset('/frontend/themes/vipp/assets/img/linkedin.webp')}}" alt="linkedin"/>
        </a>
        <a href="https://www.youtube.com/user/softorgdesign" target="_blank">
            <img src="{{asset('/frontend/themes/vipp/assets/img/youtube.webp')}}" alt="youtube"/>
        </a>
        <a href="https://twitter.com/softorg" target="_blank">
            <img src="{{asset('/frontend/themes/vipp/assets/img/twitter.webp')}}" alt="twitter"/>
        </a>
    </div>
    <ul style="margin-bottom:16px;">
        <li><a href="/org/{{$info->website_name or '1'}}">首页</a></li>
        <li><a href="/org/{{$info->website_name or '1'}}/product">产品</a></li>
        <li><a href="/org/{{$info->website_name or '1'}}/activity">活动</a></li>
        <li><a href="/org/{{$info->website_name or '1'}}/survey">问卷</a></li>
        <li><a href="/org/{{$info->website_name or '1'}}/article">文章</a></li>
    </ul>
    <div style="margin-bottom:16px;">

        <div class="term" style="margin-top:4px;">COPYRIGHT©{{$info->name or 'name'}}</div>
        <div class="term" style="margin-top:4px;">版权所有©上海米同网络科技有限公司</div>
        <div class="term" style="margin-top:4px;"><a href="http://www.miitbeian.gov.cn">沪ICP备18011005号</a></div>

        <div class="copyright" style="display: none">COPYRIGHT©上海如哉网络科技有限公司 技术支持 (2017-2018) 沪ICP备17052782号-1</div>
        <div class="term" style="display: none"><a href="#">Terms and conditions</a></div>

    </div>
</div>