@extends('layouts.app')

@section('content')
    <div class="flex flex-col align-items-center items-center">
        <div class="w-8/12 bg-white p-6 rounded-lg my-10 flex justify-center">
            Hello, Welcome to the page.
        </div>
        {{-- Todo : display username --}}
        <div  class="w-8/12 bg-white p-6 rounded-lg flex justify-around">
            <a href={{route('register')}}>
                <button  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-32">
                    Register
                </button>
            </a>
            <a href={{route('login')}} >
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-32">Login</button>
            </a>
            <a href={{route('blogs')}} >
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-32">Read</button>
            </a>
        </div>
    </div>
@endsection