<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Sports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SportsController extends Controller
{
    public function index()
    {
        return Sports::all();
    }

    public function store(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'headline' => 'required',
            'story' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        $fileUpload = new Sports();
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
                $news->sports_id = $fileUpload->id;
                $news->save();
    
                return response()->json([
                    'success'=>'Post upload was success.',
                    'news' => $news,
                    'sports' => $fileUpload,
                ]);
            }
    }

    public function addDoubleStory(Request $request) 
    {
        $Sports = Sports::all()->last();
        $news = News::all()->last();

        $attrs = $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        if($request->file()) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('posts', $file_name, 'public');
    
            $Sports->image_one = time().'_'.$request->file->getClientOriginalName();
            $Sports->path_one = '/storage/' . $file_path;
            $Sports->story_one = $request->story_one;
            $Sports->save();

            $news->image_one = time().'_'.$request->file->getClientOriginalName();
            $news->path_one = '/storage/' . $file_path;
            $news->story_one = $request->story_one;
            $news->save();
    
                return response()->json([
                    'success'=>'Post upload was success.',
                    'news' => $news,
                    'sports' => $Sports,
                ]);
        }
    }

    public function addTripleStory(Request $request) 
    {
        $Sports = Sports::all()->last();
        $news = News::all()->last();

        $attrs = $request->validate([
            'url' => 'required',
            'story_two' => 'required'
        ]);

        $Sports->url = $request->url;
        $Sports->story_two = $request->story_two;
        $Sports->save();

        $news->url = $request->url;
        $news->story_two = $request->story_two;
        $news->save();

        return response()->json([
            'success'=>'Post upload was success.',
            'news' => $news,
            'sports' => $Sports,
        ]);

    }


    public function update(Request $request, $id)
    {
        $Sports = Sports::find($id);
        $news_south_id = DB::table('news')->select('sports_id')->get();

        if ($news_south_id === $Sports)
        {
            $news_south_id->update(request()->all());
        }
        $Sports->update(request()->all());
    }

    public function destroy($id)
    {
        $Sports = Sports::find($id);
        $news_Sports_id = DB::table('news')->select('sports_id')->get();
        $path = storage_path().'/app/public/posts/'.$Sports->image;
        $path_one = storage_path().'/app/public/posts/'.$Sports->image_one;

        if(file_exists($path)){
            File::delete($path);
        }

        if(file_exists($path_one)){
            File::delete($path_one);
        }

        if ($news_Sports_id === $Sports)
        {
            $news_Sports_id->delete();
        }
        $Sports->delete();

        return response([
            'message' => 'Post deleted.'
        ], 200);
    }
}
