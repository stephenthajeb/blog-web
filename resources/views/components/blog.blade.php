@props(['blog' => $blog, 'isEdit'=>(boolean)$isEdit])

<div class="mb-4">
    <div class="mb-4 bg-gray-100 px-2 py-1 border-1">
        <a href={{route("blogs.show",$blog->id)}}  class="font-bold text-2xl">
            {{$blog->user->username}}
        </a>
        <span class="text-gray-600 text-sm float-right">{{$blog->created_at->diffForHumans()}}</span>
        @if ($isEdit)        
            <form action={{route('blogs.update',$blog->id)}} method="POST" class="mb-4">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="sr-only">Body</label>
                    <textarea name="body" cols="30" rows="4" placeholder={{$blog->body}} class="bg-gray-100 text-green-600 border-2 w-full p-4 rounded-lg @error ('body') border-red-500 @enderror"></textarea>
                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-500 text-white font-bold p-2 rounded mb-2 w-20">Save</button>
                    <a href={{route('blogs')}} class="ml-2">
                        <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold p-2 rounded mb-2 w-20">Back</button>
                    </a>
                </div>
            </form >
        @else
            <p>
                {{$blog->body}}
            </p>
            {{-- Todo add likes and comment models and routes --}}
            <form action="{{route("blogs.destroy",$blog->id)}}" method="POST">
                @csrf
                @method('DELETE')
                @auth
                @if(auth()->user()->is_admin or auth()->user()->id === $blog->user->id)
                    <div class="flex justify-end">
                        {{-- Only user himself can edit his/her blog content. Admin also can't do that. But admin have the right to delete content if it the content is illegal --}}
                        @if(auth()->user()->id === $blog->user->id) 
                            <a href={{route('blogs.edit',$blog->id)}}>
                                <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold p-2 rounded mb-2 w-20">Edit</button>
                            </a>
                        @endif
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold p-2 rounded mb-2 w-20 mx-2">Del</button>
                    </div>
                @endif
                @endauth
            </form>
        @endif

    </div>
</div>