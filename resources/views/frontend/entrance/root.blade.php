@extends('frontend.layout.layout')


{{--html.head--}}
@section('head_title'){{$info->name or ''}}@endsection
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




{{--custom-content--}}
@section('custom-content')


    {{--banner--}}
    @include('frontend.component.banner')

    {{--module-advantage--}}
    @include('frontend.module.module-advantage')

    {{--module-seo-case--}}
    @include('frontend.module.module-seo-case', ['datas'=>$seoCases])

    {{--bmodule-website-templateanner--}}
    @include('frontend.module.module-website-template', ['datas'=>$websiteTemplates, 'module_name'=>'建站模板', 'module_type'=>'root'])

    {{--module-partner--}}
    @include('frontend.module.module-partner')

    {{--module-contact--}}
    @include('frontend.module.module-contact')

    {{--module-toolbar--}}
    @include('frontend.module.module-toolbar')


@endsection
