<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Gallery::latest('id')->paginate(10);
        return view('admin.gallery.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gallery = new Gallery;
        return view('admin.gallery.create', compact('gallery'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        $data = Gallery::create();

        $img = $request->File('image');
        $img_name = rand().time().$img->getClientOriginalName();
        $img->move(public_path('gallery'), $img_name);
        $data->image()->create([
           'path' => $img_name,
        ]);


        return redirect()->route('admin.gallery.index')
        ->with('msg', 'Add Image Done')
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
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {

       if($request->hasFile('image')) {
          if($gallery->image) {
            File::delete(public_path('gallery/'.$gallery->image->path));
            $gallery->image()->delete();
          }

            $img = $request->File('image');
            $img_name = rand().time().$img->getClientOriginalName();
            $img->move(public_path('gallery'), $img_name);
            $gallery->image()->create([
               'path' => $img_name,
            ]);
       } 

        return redirect()->route('admin.gallery.index')
        ->with('msg', 'Edit Image Done')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if($gallery->image) {
            File::delete(public_path('gallery/'.$gallery->image->path));
            $gallery->image()->delete();
          }
          $gallery->delete();
          return redirect()->route('admin.gallery.index')
          ->with('msg', 'Delete Image Done')
          ->with('type', 'danger');
    }
}
