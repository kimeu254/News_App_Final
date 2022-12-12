<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\SouthEasternNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SouthEasternNewsController extends Controller
{
    public function index()
    {
        return SouthEasternNews::all();
    }

    public function store(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'headline' => 'required',
            'story' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        $fileUpload = new SouthEasternNews();
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
                $news->south_eastern_id = $fileUpload->id;
                $news->save();
    
                return response()->json([
                    'success'=>'Post upload was success.',
                    'news' => $news,
                    'southEasterNews' => $fileUpload,
                ]);
            }
    }

    public function addDoubleStory(Request $request) 
    {
        $south = SouthEasternNews::all()->last();
        $news = News::all()->last();

        $attrs = $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        if($request->file()) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('posts', $file_name, 'public');
    
            $south->image_one = time().'_'.$request->file->getClientOriginalName();
            $south->path_one = '/storage/' . $file_path;
            $south->story_one = $request->story_one;
            $south->save();

            $news->image_one = time().'_'.$request->file->getClientOriginalName();
            $news->path_one = '/storage/' . $file_path;
            $news->story_one = $request->story_one;
            $news->save();
    
                return response()->json([
                    'success'=>'Post upload was success.',
                    'news' => $news,
                    'southEasterNews' => $south,
                ]);
        }
    }

    public function addTripleStory(Request $request) 
    {
        $south = SouthEasternNews::all()->last();
        $news = News::all()->last();

        $attrs = $request->validate([
            'url' => 'required',
            'story_two' => 'required'
        ]);

        $south->url = $request->url;
        $south->story_two = $request->story_two;
        $south->save();

        $news->url = $request->url;
        $news->story_two = $request->story_two;
        $news->save();

        return response()->json([
            'success'=>'Post upload was success.',
            'news' => $news,
            'southEasterNews' => $south,
        ]);
    }

    public function update(Request $request, $id)
    {
        $south = SouthEasternNews::find($id);
        $news_south_id = DB::table('news')->select('south_eastern_id')->get();

        if ($news_south_id === $south)
        {
            $news_south_id->update(request()->all());
        }
        $south->update(request()->all());

    }

    public function destroy($id)
    {
        $south = SouthEasternNews::find($id);
        $news_south_id = DB::table('news')->select('south_eastern_id')->get();
        $path = storage_path().'/app/public/posts/'.$south->image;
        $path_one = storage_path().'/app/public/posts/'.$south->image_one;

        if(file_exists($path)){
            File::delete($path);
        }

        if(file_exists($path_one)){
            File::delete($path_one);
        }
        
        if ($news_south_id === $south)
        {
            $news_south_id->delete();
        }
        $south->delete();

        return response([
            'message' => 'Post deleted.'
        ], 200);
    }
}
