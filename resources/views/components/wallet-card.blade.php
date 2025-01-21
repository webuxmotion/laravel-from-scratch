@props(['wallet'])

<div class="flex">

    <div>
        <h3 class="text-2xl">
            <a href="/wallets/{{ $wallet->id }}">{{ $wallet->title }}</a>
        </h3>
        <p>{{$wallet->description}}</p>
        <div class="text-xl font-bold mb-4">{{$wallet->company}}</div>
        
        <div class="text-lg mt-4">
            <i class="fa-solid fa-money-bill-wave"></i> {{$wallet->balance}} {{$wallet->currency}}
        </div>
    </div>
</div>