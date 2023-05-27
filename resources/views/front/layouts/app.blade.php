<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Miam miam</title>

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">

    @vite("resources/css/front/app.css")
</head>

<body>
    {{-- NAVBAR --}}
    <div class="hero_area mb-12">
        @include('front.layouts.navigation')
    </div>

    {{-- MAIN CONTENT --}}
    <main id="app">
        @yield('content')
    </main>

    {{-- JS SCRIPTS    --}}
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if($message = session('success'))
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ $message }}',
                showConfirmButton: false,
                timer: 2500,
                width: '300px',
                height: '150px'
            })
        @endif
    </script>

@yield('footer-script')

@vite("resources/js/front/app.js")
</body>

</html>
