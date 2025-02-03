<x-layout>
    <div class="w-full">

    </div>
    <div class="px-10 py-5">
        <h1 class="text-2xl inline-block">Wallets</h1> <a href="/wallets/create"
            class="bg-black text-white ml-5 py-2 px-5">Create wallet</a>
    </div>


    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">


        @if (count($wallets) == 0)
            <p>No wallets Found</p>
        @else
            @foreach ($wallets as $wallet)
                <x-card>
                    <x-wallet-card :wallet="$wallet" />
                </x-card>
            @endforeach

            <div id="calculator"></div>

            <div id="kanuar_logo"></div>

            <div>
                Premium Ukrainian Clothing Brand with dynamic and functional logo.
            </div>
        @endif

    </div>
</x-layout>
