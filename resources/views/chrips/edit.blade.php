<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-5 lg:p-8">
        <h2 class="text-4xl">Edit View</h2>
        <form action="{{ route('chrips.update', $chrip) }}" method="POST">
            @csrf
            @method('patch')
            <textarea
                class="block w-full border-gray-600 focus:border-indigo-300 focus:ring focus:ring-indigo-300 focus:ring-opacity-60 rounded shadow-sm "
                name="message" rows="5">
            {{ old('message', $chrip->message) }}
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                <div class="mt-4 space-x-2">
                    <x-primary-button>{{ __('SAVE') }}</x-primary-button>
                    <a href="{{route('chrips.index')}}">{{ __('Cancel') }}</a>
                </div>
        </textarea>

        </form>
    </div>
</x-app-layout>
