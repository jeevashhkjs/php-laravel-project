<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ !$note->trashed() ? __('Notes') : __('Trashed') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            @if(!$note->trashed())
                <p class="bg-white pl-5 pr-5 pb-2 pt-3 w-24">
                    {{ $note->created_at->diffForHumans() }}
                </p>
                <p class="bg-white pl-5 pr-5 pb-2 pt-3 w-24 mt-3">
                    {{ $note->updated_at->diffForHumans() }}
                </p>
                <a href="{{ route('notes.edit',$note) }}" class="btn-link ml-auto bg-white mt-4">Edit Note</a>
                <form action="{{ route('notes.destroy',$note) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" onclick="return confirm('Are You sure move to trash?')" class="btn btn-danger ml-4 bg-white">Move to trash</button>
                </form>
            @else
                <p class="bg-white pl-5 pr-5 pb-2 pt-3 w-24">
                    {{ $note->deleted_at->diffForHumans() }}
                </p>
                <a href="{{ route('notes.edit',$note) }}" class="btn-link ml-auto bg-white mt-4">Edit Note</a>
                <form action="{{ route('trashed.update',$note) }}" method="post">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn-link ml-auto py-1 px-1 mb-4 bg-white">Restore</button>
                </form>
                <form action="{{ route('trashed.destroy',$note) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" onclick="return confirm('Are You sure delete this note forever?')" class="btn btn-danger ml-4 bg-white">Delete Forever</button>
                </form>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-5">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-bold text-2xl">{{$note->title}}</h2>
                    <p class="mt-2">{{($note->text)}}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
