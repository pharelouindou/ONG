<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="@yield('meta_description', 'ADéProG-ONG — Association pour le Développement Durable et la Promotion du Genre. Nutrition, santé communautaire et agroécologie au Bénin.')" />
    <title>@yield('title', config('app.name'))</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset(config('site.images.logo')) }}" type="image/jpeg" />
    <link rel="stylesheet" href="{{ asset('css/site.css') }}" />
    @stack('head')
</head>
<body>
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="{{ asset('js/site.js') }}"></script>
    @stack('scripts')
</body>
</html>
