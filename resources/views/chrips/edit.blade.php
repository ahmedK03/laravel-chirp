<x-app-layout>
    <div class="max-w-3xl mx-auto p-4 sm:p-5 lg:p-8">
        <h2 class="text-3xl mb-5">Edit Chirp</h2>
        <form action="{{ route('chrips.update', $chrip) }}" method="POST">
            @csrf
            @method('patch')
            <textarea
                class="block w-full border-gray-600 focus:border-indigo-300 focus:ring focus:ring-indigo-300 focus:ring-opacity-60 rounded shadow-sm "
                name="message" rows="5">
            {{ old('message', $chrip->message) }}

        </textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Update') }}</x-primary-button>
                <a href="{{ route('chrips.index') }}">{{ __('Cancel') }}</a>
            </div>

        </form>
    </div>
</x-app-layout>
