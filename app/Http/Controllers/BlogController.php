<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('blogs.index', ['blogs' => $blogs]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['body' => 'required']);
        $request
            ->user()
            ->blogs()
            ->create($request->only('body'));
        return back();
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Blog  $blog
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Blog $blog)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Blog  $blog
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Blog $blog)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Blog  $blog
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Blog $blog)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        // Todo : Check isAdmin & authorization
        $blog->delete();
        return back();
    }
}
