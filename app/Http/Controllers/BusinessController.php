<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BusinessController extends Controller
{
    public function index()
    {
        return Business::all();
    }

    public function store(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'headline' => 'required',
            'story' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        $fileUpload = new Business();
        $news = new News();
    
            if($request->file()) {
                $file_name = time().'_'.$request->file->getClientOriginalName();
                $file_path = $request->file('file')->storeAs('posts', $file_name, 'public');
    
                $fileUpload->image = time().'_'.$request->file->getClientOriginalName();
                $fileUpload->path = '/storage/' . $file_path;
                $fileUpload->headline = $request->headline;
                $fileUpload->story = $request->story;
                $fileUpload->posted_by = Auth::user()->id;
                $fileUpload->save();

                $news->image = time().'_'.$request->file->getClientOriginalName();
                $news->path = '/storage/' . $file_path;
                $news->headline = $request->headline;
                $news->story = $request->story;
                $news->posted_by = Auth::user()->id;
                $news->businesses_id = $fileUpload->id;
                $news->save();
    
                return response()->json([
                    'success'=>'Post upload was success.',
                    'news' => $news,
                    'business' => $fileUpload,
                ]);
            }
    }

    public function addDoubleStory(Request $request) 
    {
        $business = Business::all()->last();
        $news = News::all()->last();

        $attrs = $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        if($request->file()) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('posts', $file_name, 'public');
    
            $business->image_one = time().'_'.$request->file->getClientOriginalName();
            $business->path_one = '/storage/' . $file_path;
            $business->story_one = $request->story_one;
            $business->save();

            $news->image_one = time().'_'.$request->file->getClientOriginalName();
            $news->path_one = '/storage/' . $file_path;
            $news->story_one = $request->story_one;
            $news->save();
    
                return response()->json([
                    'success'=>'Post upload was success.',
                    'news' => $news,
                    'business' => $business,
                ]);
        }
    }

    public function addTripleStory(Request $request) 
    {
        $business = Business::all()->last();
        $news = News::all()->last();

        $attrs = $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        if($request->file()) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('posts', $file_name, 'public');
    
            $business->image_two = time().'_'.$request->file->getClientOriginalName();
            $business->path_two = '/storage/' . $file_path;
            $business->story_two = $request->story_two;
            $business->save();

            $news->image_two = time().'_'.$request->file->getClientOriginalName();
            $news->path_two = '/storage/' . $file_path;
            $news->story_two = $request->story_two;
            $news->save();
    
                return response()->json([
                    'success'=>'Post upload was success.',
                    'news' => $news,
                    'business' => $business,
                ]);
        }
    }

    public function update(Request $request, $id)
    {
        $business = Business::find($id);
        $news_south_id = DB::table('news')->select('businesses_id')->get();

        if ($news_south_id === $business)
        {
            $news_south_id->update(request()->all());
        }
        $business->update(request()->all());
    }

    public function destroy($id)
    {
        $business = Business::find($id);
        $news_business_id = DB::table('news')->select('businesses_id')->get();
        $path = storage_path().'/app/public/posts/'.$business->image;
        $path_one = storage_path().'/app/public/posts/'.$business->image_one;
        $path_two = storage_path().'/app/public/posts/'.$business->image_two;

        if(file_exists($path||$path_one||$path_two)){
            File::delete( $path, $path_one, $path_two);
        }

        if ($news_business_id === $business)
        {
            $news_business_id->delete();
        }
        $business->delete();

        return response([
            'message' => 'Post deleted.'
        ], 200);
    }
}
