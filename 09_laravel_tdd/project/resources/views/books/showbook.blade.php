
<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <h2>
            Viewing a book
        </h2>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h3>{{$book->isbn}}</h3>
            <a>{{$book->title}}</a>
            @markdown($book->description)
            <a href="/books/{{$book->id}}/edit">Edit</a>
            <a href="/books/{{$book->id}}/delete">Delete</a>
        </div>
    </div>
</x-guest-layout>
