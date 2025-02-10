<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Room;
use App\Models\Image;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Room::latest('id')->paginate();
        return view('admin.room.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $room = new Room;
        return view('admin.room.create', compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   


        $request->validate([
           'title' => 'required',

           'body' => 'required',

           'price' => 'required',

           'size' => 'required',

           'capacity' => 'required',

           'bed' => 'required',

           'service' => 'required',

           'image' => 'required|image',

           'gallery' => 'required',

        ]);

        $data = Room::create([
           'title' => $request->title,
           'body' => $request->body,
           'price' => $request->price,
           'size' => $request->size,
           'capacity' => $request->capacity,
           'bed' => $request->bed,
           'service' => $request->service,
        ]);

        $img = $request->File('image');
        $img_name = rand().time().$img->getClientOriginalName();
        $img->move(public_path('images'), $img_name);
        $data->image()->create([
            'path' => $img_name
        ]);

        foreach ($request->gallery as $img) {
         
            $img_name = rand().time().$img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);
            $data->gallery()->create([
                'path' => $img_name,
                'type' => 'gallery',
            ]);

       }

        return redirect()->route('admin.room.index')
        ->with('msg', 'Add Rome is Done')
        ->with('type', 'success');;

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
    public function edit(Room $room)
    {
        return view('admin.room.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
         $request->validate([
           'title' => 'required',
           'body' => 'required',
           'price' => 'required',
           'size' => 'required',
           'capacity' => 'required',
           'bed' => 'required',
           'service' => 'required',
        ]);

        $room->update([
           'title' => $request->title,
           'body' => $request->body,
           'price' => $request->price,
           'size' => $request->size,
           'capacity' => $request->capacity,
           'bed' => $request->bed,
           'service' => $request->service,
        ]);
         
        if($request->hasFile('image')) {
           if($room->image) {
               File::delete(public_path('images/'.$room->image->path));
               $room->image()->delete();
           }
            $img = $request->File('image');
            $img_name = rand().time().$img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);
            $room->image()->create([
                'path' => $img_name
            ]);
        }

         if($request->has('gallery')) {

            foreach($request->gallery as $img) {
                $img_name = rand().time().$img->getClientOriginalName();
                $img->move(public_path('images'), $img_name);
                $room->gallery()->create([
                    'path' => $img_name,
                    'type' => 'gallery',
                ]);
            }
            
         }
    

        return redirect()->route('admin.room.index')->with('msg', 'Edit Rome is Done')
        ->with('type', 'info');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
         if($room->image && $room->gallery) {
               File::delete(public_path('images/'.$room->image->path));
               foreach($room->gallery as $img) {
                File::delete(public_path('images/'.$img->path));
               }
               
          }
        $room->image()->delete();
        $room->gallery()->delete();
        $room->delete();

        $room->delete(); 
        return redirect()->route('admin.room.index')
        ->with('msg', 'Delete Rome is Done')
        ->with('type', 'danger');; 

    }

    public function delete_img($id) {
        $img = Image::find($id);
        File::delete(public_path('images/'.$img->path));
        return Image::destroy($id);
    }
}
