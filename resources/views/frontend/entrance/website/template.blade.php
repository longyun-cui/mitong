@extends('frontend.layout.layout')


{{--html.head--}}
@section('head_title'){{$info->name or ''}}@endsection
@section('meta_author')@endsection
@section('meta_title')@endsection
@section('meta_description')@endsection
@section('meta_keywords')@endsection


{{--custom-content--}}
@section('custom-content')

    <iframe id="iframe" class="website-template-iframe" src="{{$websiteTemplate->link_url}}" frameborder="0" width="100%" height="100%" ></iframe>


    <ul id="menu" class="mfb-component--tr mfb-zoomin " data-mfb-toggle="hover" style="display: block;">
        <li class="mfb-component__wrap">

            <a href="javascript:void(0)" class="mfb-component__button--main">
                <i class="mfb-component__main-icon--resting ion-plus-round"></i>
                <i class="mfb-component__main-icon--active ion-close-round"></i>
            </a>

            <ul class="mfb-component__list">
                <li>
                    <a class="mfb-component__button--child" data-mfb-label="返回首页" href="{{ url('/') }}">
                        <i class="mfb-component__child-icon fa fa-home"></i>
                    </a>
                </li>

                <li>
                    <a class="mfb-component__button--child" data-mfb-label="返回模板" href="{{ url('website/templates') }}">
                        <i class="mfb-component__child-icon fa fa-list"></i>
                    </a>
                </li>
            </ul>

        </li>
    </ul>

@endsection


@section('style')
    <link type="text/css" rel="stylesheet" href="{{ asset('templates/themes/floating-button/ionicons.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('templates/themes/floating-button/mfb.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('templates/themes/floating-button/index.css') }}" />
@endsection


@section('script')
    <script src="{{ asset('templates/themes/floating-button/modernizr.touch.js') }}"></script>
    <script src="{{ asset('templates/themes/floating-button/mfb.js') }}"></script>
    <script type="text/javascript">
        var panel = document.getElementById('panel'),
            menu = document.getElementById('menu'),
            showcode = document.getElementById('showcode'),
            selectFx = document.getElementById('selections-fx'),
            selectPos = document.getElementById('selections-pos'),
            // demo defaults
            effect = 'mfb-zoomin',
            pos = 'mfb-component--br';

        showcode.addEventListener('click', _toggleCode);
        selectFx.addEventListener('change', switchEffect);
        selectPos.addEventListener('change', switchPos);

        function _toggleCode() {
            panel.classList.toggle('viewCode');
        }

        function switchEffect(e){
            effect = this.options[this.selectedIndex].value;
            renderMenu();
        }

        function switchPos(e){
            pos = this.options[this.selectedIndex].value;
            renderMenu();
        }

        function renderMenu() {
            menu.style.display = 'none';
            // ?:-)
            setTimeout(function() {
                menu.style.display = 'block';
                menu.className = pos + effect;
            },1);
        }
    </script>
@endsection