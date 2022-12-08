<?php

namespace App\Http\Controllers;

use App\Models\NationalNews;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class NationalNewsController extends Controller
{
    public function index()
    {
        return NationalNews::all();
    }

    public function store(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'headline' => 'required',
            'story' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        $fileUpload = new NationalNews();
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
                $news->national_news_id = $fileUpload->id;
                $news->save();
    
                return response()->json([
                    'success'=>'Post upload was success.',
                    'news' => $news,
                    'NationalNews' => $fileUpload,
                ]);
            }
    }

    public function update(Request $request, $id)
    {
        $NationalNews = NationalNews::find($id);
        $news_south_id = DB::table('news')->select('national_news_id')->get();


        if ($news_south_id === $NationalNews)
        {
            $news_south_id->update(request()->all());
        }
        $NationalNews->update(request()->all());
    }

    public function destroy($id)
    {
        $NationalNews = NationalNews::find($id);
        $news_National_id = DB::table('news')->select('national_news_id')->get();
        $path = storage_path().'/app/public/posts/'.$NationalNews->image;

        if(file_exists($path)){
            File::delete( $path);
        }

        if ($news_National_id === $NationalNews)
        {
            $news_National_id->delete();
        }
        $NationalNews->delete();

        return response([
            'message' => 'Post deleted.'
        ], 200);
    }
}
