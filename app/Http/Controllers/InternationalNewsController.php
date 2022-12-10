<?php

namespace App\Http\Controllers;

use App\Models\InternationalNews;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class InternationalNewsController extends Controller
{
    public function index()
    {
        return InternationalNews::all();
    }

    public function store(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'headline' => 'required',
            'story' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        $fileUpload = new InternationalNews();
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
                $news->international_news_id = $fileUpload->id;
                $news->save();
    
                return response()->json([
                    'success'=>'Post upload was success.',
                    'news' => $news,
                    'InternationalNews' => $fileUpload,
                ]);
            }
    }

    public function addDoubleStory(Request $request) 
    {
        $InternationalNews = InternationalNews::all()->last();
        $news = News::all()->last();

        $attrs = $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        if($request->file()) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('posts', $file_name, 'public');
    
            $InternationalNews->image_one = time().'_'.$request->file->getClientOriginalName();
            $InternationalNews->path_one = '/storage/' . $file_path;
            $InternationalNews->story_one = $request->story_one;
            $InternationalNews->save();

            $news->image_one = time().'_'.$request->file->getClientOriginalName();
            $news->path_one = '/storage/' . $file_path;
            $news->story_one = $request->story_one;
            $news->save();
    
                return response()->json([
                    'success'=>'Post upload was success.',
                    'news' => $news,
                    'international_news' => $InternationalNews,
                ]);
        }
    }

    public function addTripleStory(Request $request) 
    {
        $InternationalNews = InternationalNews::all()->last();
        $news = News::all()->last();

        $attrs = $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        if($request->file()) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('posts', $file_name, 'public');
    
            $InternationalNews->image_two = time().'_'.$request->file->getClientOriginalName();
            $InternationalNews->path_two = '/storage/' . $file_path;
            $InternationalNews->story_two = $request->story_two;
            $InternationalNews->save();

            $news->image_two = time().'_'.$request->file->getClientOriginalName();
            $news->path_two = '/storage/' . $file_path;
            $news->story_two = $request->story_two;
            $news->save();
    
                return response()->json([
                    'success'=>'Post upload was success.',
                    'news' => $news,
                    'international_news' => $InternationalNews,
                ]);
        }
    }

    public function update(Request $request, $id)
    {
        $InternationalNews = InternationalNews::find($id);
        $news_south_id = DB::table('news')->select('international_news_id')->get();

        if ($news_south_id === $InternationalNews)
        {
            $news_south_id->update(request()->all());
        }
        $InternationalNews->update(request()->all());
    }

    public function destroy($id)
    {
        $InternationalNews = InternationalNews::find($id);
        $news_International_id = DB::table('news')->select('international_news_id')->get();
        $path = storage_path().'/app/public/posts/'.$InternationalNews->image;
        $path_one = storage_path().'/app/public/posts/'.$InternationalNews->image_one;
        $path_two = storage_path().'/app/public/posts/'.$InternationalNews->image_two;

        if(file_exists($path||$path_one||$path_two)){
            File::delete( $path, $path_one, $path_two);
        }

        if ($news_International_id === $InternationalNews)
        {
            $news_International_id->delete();
        }
        $InternationalNews->delete();

        return response([
            'message' => 'Post deleted.'
        ], 200);
    }
}
