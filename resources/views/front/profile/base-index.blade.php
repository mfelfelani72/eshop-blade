@extends('layouts.administrator.index')

@section('tag-head')
    @include('layouts/front/profile/tag-head')
@endsection
@section('preloader')
    @include('layouts/administrator/preloader')
@endsection

@section('sidebar')
    @include('layouts/front/profile/sidebar')
@endsection

@section('navheader')
    @include('layouts/administrator/navheader')
@endsection

@section('chat')
    @include('layouts/administrator/chat')
@endsection

@section('header')
    @include('layouts/administrator/header')
@endsection

@section('content')
    @include($address)
@endsection

@section('footer')
    @include('layouts/administrator/footer')
@endsection

@section('tag-script')
    @include('layouts/front/profile/tag-script')
@endsection

@section('js')
    <script>
        function destroyUser(event, $id) {

            event.preventDefault();
            document.querySelector('#userDelete-' + $id).submit();
        }
    </script>
@endsection
