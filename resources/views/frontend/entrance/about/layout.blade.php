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
    @include('frontend.module.about.module-about-layout')
@endsection




{{--custom-content--}}
@section('custom-content')


    {{--module-advantage--}}
    @include('frontend.module.module-about', [
        'about_name'=>"米同布局",
        'about_description'=>"MITONG LAYOUT",
        'about_banner_img'=>"",
        'about_layout_active'=>"active cur",
        'about_data'=>"",
    ])

    {{--module-toolbar--}}
    @include('frontend.module.module-toolbar')


@endsection
