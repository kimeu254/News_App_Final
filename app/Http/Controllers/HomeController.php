<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(auth()->id());
        $user->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "contact" => $request->contact,
            "address" => $request->address,
            "bio" => $request->bio,
        ]); 

        return response()->json([
            'success' => 'Profile Updated Succesfully',
            'user' => $user
        ]);
    }

    public function updatePic(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        $user = User::find(auth()->id());
        $current_img = storage_path().'/app/public/profile/'.$user->profile_image;

        if($request->file() && $current_img != "") {
            File::delete( $current_img);

            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('profile', $file_name, 'public');

            $user->profile_image = time().'_'.$request->file->getClientOriginalName();
            $user->path = '/storage/' . $file_path;
            $user->update();
            

            return response()->json([
                'success'=>'Picture uploaded succesfully.',
                'user' => $user
            ]);
        }

    }
}
