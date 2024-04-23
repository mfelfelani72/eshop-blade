@extends('layouts.front.index')


@section('tag-head')
    @include('layouts/front/tag-head')
@endsection


@section('asside')
    @include('layouts/front/asside')
@endsection

@section('header')
    @include('layouts/front/header')
@endsection

@section('slider')
    @include('layouts/front/slider')
@endsection

@section('brands')
    @include('layouts/front/brands')
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
