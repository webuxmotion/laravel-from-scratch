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

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @if (count($listings) == 0)
            <p>No Listings Found</p>
        @else
            @foreach ($listings as $listing)
                <div class="bg-gray-50 border border-gray-200 rounded p-6">
                    <div class="flex">
                        <img class="hidden w-48 mr-6 md:block" src="images/acme.png" alt="" />
                        <div>
                            <h3 class="text-2xl">
                                <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a>
                            </h3>
                            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
                            {{$listing->tags}}
                            <ul class="flex">
                                @foreach(explode(',', $listing->tags) as $tag)
                                    <li
                                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                        <a href="#">{{$tag}}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="text-lg mt-4">
                                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

</body>

</html>
