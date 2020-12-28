<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <h2>List of books</h2>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
          @if(!$books->isEmpty())
          <table>
            @foreach ($books as $book)
                <tr>

                    <td><a href="/books/{{ $book->id }}">{{ $book->title }}</a></td>
                    <td><a>{{$book->isbn}}</a></td>
                    <td><a href="/books/{{ $book->id }}">Details</a></td>
                </tr>
            @endforeach
          </table>
            @else
              <a>No books in database.</a>
              @endif
        </div>
        <div>
            <a href="books/create">Create new...</a>
        </div>
    </div>
</x-guest-layout>
