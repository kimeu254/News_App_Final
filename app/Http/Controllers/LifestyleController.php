<?php

namespace App\Http\Controllers;

use App\Models\Lifestyle;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class LifestyleController extends Controller
{
    public function index()
    {
        return Lifestyle::all();
    }

    public function store(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'headline' => 'required',
            'story' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        $fileUpload = new Lifestyle();
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
                $news->lifestyles_id = $fileUpload->id;
                $news->save();
    
                return response()->json([
                    'success'=>'Post upload was success.',
                    'news' => $news,
                    'Lifestyle' => $fileUpload,
                ]);
            }
    }

    public function addDoubleStory(Request $request) 
    {
        $Lifestyle = Lifestyle::all()->last();
        $news = News::all()->last();

        $attrs = $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        if($request->file()) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('posts', $file_name, 'public');
    
            $Lifestyle->image_one = time().'_'.$request->file->getClientOriginalName();
            $Lifestyle->path_one = '/storage/' . $file_path;
            $Lifestyle->story_one = $request->story_one;
            $Lifestyle->save();

            $news->image_one = time().'_'.$request->file->getClientOriginalName();
            $news->path_one = '/storage/' . $file_path;
            $news->story_one = $request->story_one;
            $news->save();
    
                return response()->json([
                    'success'=>'Post upload was success.',
                    'news' => $news,
                    'lifestyle' => $Lifestyle,
                ]);
        }
    }

    public function addTripleStory(Request $request) 
    {
        $Lifestyle = Lifestyle::all()->last();
        $news = News::all()->last();

        $attrs = $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        if($request->file()) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('posts', $file_name, 'public');
    
            $Lifestyle->image_two = time().'_'.$request->file->getClientOriginalName();
            $Lifestyle->path_two = '/storage/' . $file_path;
            $Lifestyle->story_two = $request->story_two;
            $Lifestyle->save();

            $news->image_two = time().'_'.$request->file->getClientOriginalName();
            $news->path_two = '/storage/' . $file_path;
            $news->story_two = $request->story_two;
            $news->save();
    
                return response()->json([
                    'success'=>'Post upload was success.',
                    'news' => $news,
                    'lifestyle' => $Lifestyle,
                ]);
        }
    }


    public function update(Request $request, $id)
    {
        $Lifestyle = Lifestyle::find($id);
        $news_south_id = DB::table('news')->select('lifestyles_id')->get();

        if ($news_south_id === $Lifestyle)
        {
            $news_south_id->update(request()->all());
        }
        $Lifestyle->update(request()->all());
    }

    public function destroy($id)
    {
        $Lifestyle = Lifestyle::find($id);
        $news_Lifestyle_id = DB::table('news')->select('lifestyles_id')->get();
        $path = storage_path().'/app/public/posts/'.$Lifestyle->image;
        $path_one = storage_path().'/app/public/posts/'.$Lifestyle->image_one;
        $path_two = storage_path().'/app/public/posts/'.$Lifestyle->image_two;

        if(file_exists($path||$path_one||$path_two)){
            File::delete( $path, $path_one, $path_two);
        }

        if ($news_Lifestyle_id === $Lifestyle)
        {
            $news_Lifestyle_id->delete();
        }
        $Lifestyle->delete();

        return response([
            'message' => 'Post deleted.'
        ], 200);
    }
}
