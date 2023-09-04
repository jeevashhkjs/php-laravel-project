<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ request()->routeIs('notes.index') ? __('Notes') : __('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(request()->routeIs('notes.index'))
                <div class="bg-white w-24 rounded-md mb-3"><a href="{{ route('notes.create') }}"> + New Note</a></div>
            @endif
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            @forelse($userData as $data)
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a
                    @if(request()->routeIs('notes.index'))
                        href="{{ route('notes.show',$data)}}"
                    @else
                        href="{{ route('trashed.show',$data)}}"
                    @endif

                ><h2 class="font-bold text-2xl">{{$data->title}}</h2></a>
                    <p class="mt-2">{{Str::limit($data->text, 2, '...')}}</p>
                </div>
                <p class="text-white">
                    {{$data->created_at->diffForHumans()}}

                </p>
                @empty
            @if(request()->routeIs('notes.index'))
                <p>No notes</p>
            @else
                <p>You no items on trashed</p>
            @endif
            @endforelse
            </div>
            {{ $userData->links() }}
        </div>
    </div>
</x-app-layout>
