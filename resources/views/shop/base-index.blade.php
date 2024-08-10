@extends('layouts.shop.index')


@section('tag-head')
    @include('layouts/front/tag-head')
@endsection

@section('header')
    @include('layouts/front/header')
@endsection

@section('content')
    @include($address)
@endsection

@section('brands')
    @include('layouts/front/brands')
@endsection

@section('features')
    @include('layouts/front/features')
@endsection

@section('banners')
    @include('layouts/front/banners')
@endsection


@section('footer')
    @include('layouts/front/footer')
@endsection

@section('mobile-menu-bottom')
    @include('layouts/front/mobile-menu-bottom')
@endsection

@section('mobile-search-bottom')
    @include('layouts/front/mobile-search-bottom')
@endsection



@section('tag-script')
    @include('layouts/front/tag-script')
@endsection

{{-- @section('js')
    <script>
        function destroyUser(event, $id) {

            event.preventDefault();
            document.querySelector('#userDelete-' + $id).submit();
        }
    </script>
@endsection --}}
