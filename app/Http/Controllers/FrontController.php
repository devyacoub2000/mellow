<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Reservation;
use App\Models\Room;
class FrontController extends Controller
{
    
    public function index() {
        $room = Room::select('id', 'title')->get(); 
        return view('user.index', compact('room'));
    }

    public function store_book(Request $request) {
        $request->validate([
           'check_in' => 'required',
           'check_out' => 'required',
           'guest' => 'required',
           'room_id' => 'required',
        ]);

        Reservation::create($request->all());

        return redirect()->route('front.index')->with('msg', 'Request Reservation Done ..');
    }

    public function store_contact(Request $request) {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->route('front.index')->with('msg', 'Add Contact Done');
    }

    

}


