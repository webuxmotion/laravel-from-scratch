<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>laravel-from-scratch</title>

    <style>
        body {
            width: 100%;
            height: 100vh;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
    </style>

    <link rel="icon" type="image/png" href="/favicon.png" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    @else
    @endif
</head>

<body class="font-sans antialiased">

    <h1>{{ $heading }}</h1>

    @if (count($listings) == 0)
        <p>No Listings Found</p>
    @else
        @foreach ($listings as $listing)
            <div class="my-3">
                <h2 class="text-xl">
                    <a href="/listings/{{$listing['id']}}">
                        {{ $listing['title'] }}
                    </a>
                </h2>
                <p>{{ $listing['description'] }}</p>
                <p>{{ $listing['tags'] }}</p>
            </div>
        @endforeach
    @endif

</body>

</html>
