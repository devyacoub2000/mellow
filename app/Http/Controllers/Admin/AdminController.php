<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Reservation;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function reservations() {
        $data = Reservation::latest('id')->paginate();
        return view('admin.reservations', compact('data'));
    }

    public function update_status(Request $request, $id) {
        $request->validate([
            'status' => 'required',
        ]);

        $item = Reservation::findOrFail($id);

        $item->update([
               'status' => $request->status,   
        ]);

        return redirect()->route('admin.reservations')->with('msg', 'Change Status Successfully')
        ->with('type', 'success');
    }

    public function delete_reservation($id) {
         $item = Reservation::findOrFail($id);
         $item->delete();
         return redirect()->route('admin.reservations')->with('msg', 'Delete Reservation Done')
         ->with('type', 'danger');
    }

    public function contact() {
        $data = Contact::latest('id')->paginate();
        return view('admin.contact', compact('data'));
    }

    public function delete_contact($id) {
         $item = Contact::findOrFail($id);
         $item->delete();
         return redirect()->route('admin.contact')->with('msg', 'Delete Contact Done')
         ->with('type', 'danger');
    }

    public function profile() {
        $admin = Auth::user();
        return view('admin.profile_data', compact('admin'));
    }

     public function profile_data(Request $request) {

       $request->validate([
            'name' => 'required',
            'current_password' => 'required_with:password',
            'password' => 'nullable|min:8|confirmed',
       ]); 

       $admin = Auth::user();
       $data = [
          'name' => $request->name,
       ];
       if($request->has('password')) {
          $data['password'] = bcrypt($request->password);
       }

       $admin->update($data);

       if($request->hasFile('image')) {
              if($admin->image) {
                 File::delete(public_path('images/'.$admin->image->path));
                 $admin->image()->delete();
              }
              $img = $request->File('image');
              $img_name = rand().time().$img->getClientOriginalName();
              $img->move(public_path('images'), $img_name);
                $admin->image()->create([
                       'path' => $img_name,
                   ]); 
       }

       return redirect()->back()->with('msg', 'Profile Update Successfully');
    }

     public function check_password(Request $request) {

         return (Hash::check($request->password, Auth::user()->password));
    }

    public function settings() {
        // $settings = Setting::select('key', 'value')->get()->toArray();
        // Create new Array with key and value pair
        // $new_settings = [];
        // foreach ($settings as $setting) {
        //     $new_settings[$setting['key']] = $setting['value'];
        // }
        // $settings = $new_settings;
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings', compact('settings'));
    }

    public function save_settings(Request $request) {
        $data = $request->except('website_logo', '_token', '_method');

         if($request->hasFile('website_logo')) {  
                $old_logo = Setting::where('key', 'website_logo')->first();
                if($old_logo) {
                     File::delete(public_path('settings/'.$old_logo['value']));
                }   
                //dd('done Delete');
                $img = $request->File('website_logo');    
                $img_name = rand().time().$img->getClientOriginalName();
                $img->move(public_path('settings'), $img_name);    
                $data['website_logo'] = $img_name;
         }
         // dd($data['website_logo']);

         foreach ($data as $key => $value) {
             Setting::updateOrCreate([
              
                'key' => $key,

             ],[

                'value' => $value,

             ]);
         }

         return redirect()->back()->with('msg', 'Setting Update Done...');

    }

    public function del_site_logo(Request $request) {
         
         \Illuminate\Support\Facades\Artisan::call('cache:clear');
         Setting::where('key', 'website_logo')->update([
             'value' => null
         ]);

         return response()->json(['message' => 'Logo Delete Done']);

    }























}
