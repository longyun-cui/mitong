@extends('frontend.layout.layout')


{{--html.head--}}
@section('head_title')企业介绍-{{$info->name or ''}}@endsection
@section('meta_author')@endsection
@section('meta_title')@endsection
@section('meta_description')@endsection
@section('meta_keywords')@endsection



{{--header--}}
@section('component-header')
    @include('frontend.component.header')
@endsection


{{--footer--}}
@section('component-footer')
    @include('frontend.component.footer')
@endsection


{{--about-content--}}
@section('about-content')
    @include('frontend.module.about.module-about-message')
@endsection




{{--custom-content--}}
@section('custom-content')


    {{--module-advantage--}}
    @include('frontend.module.module-about', [
        'about_name'=>"在线留言",
        'about_description'=>"MESSAGE",
        'about_banner_img'=>"/mitong/images/platform-banner.jpg.png",
        'about_message_active'=>"active cur",
        'about_data'=>"",
    ])

    {{--module-toolbar--}}
    @include('frontend.module.module-toolbar')


@endsection
