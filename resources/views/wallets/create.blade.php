<x-layout>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-3">
                    Create a Wallet
                </h2>
            </header>

            <form method="POST" action="/wallets">
                @csrf
                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2">Title</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                        value="{{ old('title') }}" />

                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="balance" class="inline-block text-lg mb-2">Balance</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="balance"
                        placeholder="Example: 299.20" value="{{ old('balance') }}"/>

                    @error('balance')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="currency" class="inline-block text-lg mb-2">Currency</label>
                    <select id="currency" name="currency" class="border border-gray-200 rounded p-2 w-full">
                        <option selected value="UAH">UAH</option>
                        <option value="USD">USD</option>
                    </select>

                    @error('balance')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="description" class="inline-block text-lg mb-2">
                        Description
                    </label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="3"
                        placeholder="Card number, bank name, etc">{{ old('description') }}</textarea>

                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                

                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Create Wallet
                    </button>

                    <a href="/wallets" class="text-black ml-4"> Back </a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
