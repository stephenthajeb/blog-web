@props(['blog' => $blog])

<div class="mb-4">
    <div class="mb-4 bg-gray-100 px-2 py-1 border-1">
        <a href=""  class="font-bold text-2xl">
            {{$blog->user->username}}
        </a>
        <span class="text-gray-600 text-sm">{{$blog->created_at->diffForHumans()}}</span>
        <p>
            {{$blog->body}}
        </p>
        <form action="{{route("blogs.destroy",$blog->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-end">
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold p-2 rounded mb-2">Delete</button>
            </div>
        </form>
    </div>
</div>