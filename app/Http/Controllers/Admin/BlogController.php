<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Blog::latest('id')->paginate();
        return view('admin.blog.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blog = new Blog;
        return view('admin.blog.create', compact('blog'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'body' => 'required',
            'date' => 'required',
            'image' => 'required|image',
        ]);

        $data = Blog::create([
              'name' => $request->name,
              'body' => $request->body,
              'date' => $request->date,
        ]);

        $img = $request->File('image');
        $img_name = rand().time().$img->getClientOriginalName();
        $img->move(public_path('images'), $img_name);
        $data->image()->create([
              'path' => $img_name,
        ]);

        return redirect()->route('admin.blog.index')->with('msg', 'Add Blog Done')
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
            $request->validate([
                'name' => 'required',     
            ]);

        $blog->update([
              'name' => $request->name,
              'body' => $request->body,
              'date' => $request->date,
        ]);

        if($request->hasFile('image')) {
            if($blog->image) {
                File::delete(public_path('images/'.$blog->image->path));
                $blog->image()->delete();
            }
            $img = $request->File('image');
            $img_name = rand().time().$img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);
            $blog->image()->create([
                  'path' => $img_name,
            ]);
        }

        return redirect()->route('admin.blog.index')
        ->with('msg', 'Edit Blog Done')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if($blog->image) {
            File::delete(public_path('images/'.$blog->image->path));
        }
        $blog->image()->delete();
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('msg', 'Delete Blog Done')
        ->with('type', 'danger');
    }
}







