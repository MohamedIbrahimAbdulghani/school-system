<!-- Title -->
<title>@yield("title")</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<!-- Font -->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

{{-- Tailwind --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" integrity="..." crossorigin="anonymous"/>


@yield('css')

<!--- Style css -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

<!--- RTL / LTR styles -->
@if (App::getLocale() == 'en')
    <link href="{{ asset('assets/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ asset('assets/css/rtl.css') }}" rel="stylesheet">
@endif
