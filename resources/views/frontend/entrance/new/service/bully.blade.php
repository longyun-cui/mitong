@extends('frontend.layout.layout')


{{--html.head--}}
@section('head_title')AI关键词霸屏-{{$info->name or ''}}@endsection
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


    <div class="wrapper-module-container module-none-padding">
        <div class="block-full">
            <img src="{{ asset('/mitong/images_new/bully.png') }}" width="100%" alt="" />
        </div>
    </div>


@endsection

