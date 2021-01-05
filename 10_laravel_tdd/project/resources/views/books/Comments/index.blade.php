<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comments:') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        @foreach($book->comments as $comment)
                        <div class="mt-4">
                                <h2>{{$comment->title}}</h2>
                                {{$comment->text}}

                            <form method="get" action="{{ route('books.comments.edit', [$book,$comment->id]) }}">
                                <x-button class="ml-4">
                                    {{ __('Edit') }}
                                </x-button>
                            </form>

                            <form method="post" action="{{ route('books.comments.destroy', [$book,$comment->id]) }}">
                                @csrf
                                @method("DELETE")
                                <x-button class="ml-4">
                                    {{ __('Delete') }}
                                </x-button>
                            </form>
                        </div>
                        @endforeach
                </div>
                <div class="flex items-center justify-end mt-4 px-4 pb-5">
                    <form method="get" action="{{ route('books.comments.create',$book) }}">
                        <x-button class="ml-4">
                            {{ __('Create new...') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
