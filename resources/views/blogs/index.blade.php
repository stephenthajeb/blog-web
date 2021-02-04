@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth
            <form action={{route('blogs')}} method="POST" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Words are powerful if you use it wisely. Write it here !!"></textarea>
                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                </div>
            </form>
            @endauth
            @if ($blogs->count())
                @foreach ($blogs as $blog)
                    <x-blog :blog="$blog"/>
                @endforeach
                {{ $blogs->links() }}
            @else
                <p>There are not blogs. Would you like to be the first one to write it ?</p>
            @endif
       
        </div>
    </div>
@endsection