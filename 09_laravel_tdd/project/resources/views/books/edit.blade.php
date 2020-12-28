<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <h2>Editing a book</h2>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="edit">
                    @csrf

                    ISBN <input type="text" name="isbn" id="isbn" value="{{$book->isbn}}"> <br/>
                    TITLE <input type="text" name="title" id="title" value="{{$book->title}}"> <br/>
                    DESCRIPTION <input type="text" name="description" id="description" value="{{$book->description}}"> <br/>
                    <input type="submit" value="Update">
            </form>

        </div>

    </div>
</x-guest-layout>
