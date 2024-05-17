<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">


<!-- PAGE TITLE HERE -->
<title>Admin Dashboard</title>


<link href="{{ asset('administrator/css/jquery-nice-select/nice-select.css') }}" rel="stylesheet">
<link href="{{ asset('administrator/css/owlcarousel/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('administrator/css/owlcarousel/owl.theme.default.min.css') }}" rel="stylesheet">
<link href="{{ asset('administrator/css/nouislider/nouislider.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">

<!-- Datatable -->
<link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">


{{-- for set ltr or rtl style --}}
@if (in_array(Session::get('locale'), Config::get('config-app.rtl-langs')))
    <link rel="stylesheet" href="{{ asset('administrator/css/rtl-style-admin.css') }}">
@else
    <link rel="stylesheet" href="{{ asset('administrator/css/ltr-style-admin.css') }}">
@endif
{{-- for set ltr or rtl style --}}

<!-- Style css -->
{{-- <link href="{{ asset('administrator/css/style.css') }}" rel="stylesheet"> --}}
