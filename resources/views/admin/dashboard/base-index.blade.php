@extends('layouts.admin.index')

@section('tag-head')
    @include('layouts/admin/tag-head')
@endsection
@section('preloader')
    @include('layouts/admin/preloader')
@endsection

@section('sidebar')
    @include('layouts/admin/sidebar')
@endsection

@section('navheader')
    @include('layouts/admin/navheader')
@endsection

@section('chat')
    @include('layouts/admin/chat')
@endsection

@section('header')
    @include('layouts/admin/header')
@endsection

@section('content')
    @include($address)
@endsection

@section('footer')
    @include('layouts/admin/footer')
@endsection

@section('tag-script')
    @include('layouts/admin/tag-script')
@endsection

@section('js')
    <script>
        function destroyUser(event, $id) {

            event.preventDefault();
            document.querySelector('#userDelete-' + $id).submit();
        }
    </script>
@endsection
