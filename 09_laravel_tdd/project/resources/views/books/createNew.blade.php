<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <h2>
            Creating a book
        </h2>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
           @if ($errors->any())
               <ul>
                   @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                   @endforeach
               </ul>
           @endif

            <form method="POST" action="create">
                @csrf

                ISBN <input type="text" name="isbn" id="isbn" value="{{old('isbn')}}"> <br/>
                TITLE <input type="text" name="title" id="title" value="{{old('title')}}"> <br/>
                DESCRIPTION <input type="text" name="description" id="description" value="{{old('description')}}"> <br/>
                <input type="submit" value="Create">
            </form>
        </div>
    </div>
</x-guest-layout>
