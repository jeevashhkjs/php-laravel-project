<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 bg-white lg:px-8">
            <form action="{{ route('notes.update',$note) }}" method="POST">
                @method('PUT')
                @csrf
                <x-text-input class="mt-3 mb-3 w-full" field="title" :value="@old('title',$note->title)" name="title"></x-text-input>
                <x-textarea class="block w-full" field="text" :value="@old('text')" placeholder="Typing here" name="text">Jasmine</x-textarea>
                <x-primary-button class="mt-6 mb-6">Submit</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
