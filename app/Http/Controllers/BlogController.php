<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        // Info: Make sure the user is login.
        $this->middleware(['auth'])->only([
            'store',
            'destroy',
            'edit',
            'update',
        ]);
    }

    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('blogs.index', ['blogs' => $blogs]);
    }

    public function store(Request $request)
    {
        $this->validate($request, ['body' => 'required']);
        $request
            ->user()
            ->blogs()
            ->create($request->only('body'));
        return back();
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog,
        ]);
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit', [
            'blog' => $blog,
        ]);
    }

    // Info: Req params $id can be type cast to the model object or the id it self.
    public function update(Request $request, $id)
    {
        $this->validate($request, ['body' => 'required']);
        $targetBlog = Blog::find($id);
        $this->authorize('update', $targetBlog);
        $targetBlog->body = $request->body;
        $targetBlog->save();

        return redirect(route('blogs'));
    }

    public function destroy(Blog $blog)
    {
        $this->authorize('delete', $blog);
        $blog->delete();
        return back();
    }
}
