@extends('layout')

@section('content')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

    @if (count($listings) == 0)
        <p>No Listings Found</p>
    @else
        @foreach ($listings as $listing)
            <div class="bg-gray-50 border border-gray-200 rounded p-6">
                <div class="flex">
                    <img class="hidden w-48 mr-6 md:block" src="{{asset('images/no-image.png')}}" alt="" />
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

@endsection