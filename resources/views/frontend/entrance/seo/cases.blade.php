@extends('frontend.layout.layout')


{{--html.head--}}
@section('head_title')SEO案例 - {{$info->name or ''}}@endsection
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
    <section class="wrapper-module-container module-banner-img">
        <div class="row full block-full">
            <img src="{{ asset('mitong/images/platform-banner.jpg.png') }}" alt="">
        </div>
    </section>

    {{--module-seo-case--}}
    @include('frontend.module.module-seo-case-list', ['datas'=>$seoCases, 'module_name'=>'建站模板', 'module_type'=>'paginate'])

    {{--module-contact--}}
    @include('frontend.module.module-contact')

@endsection

