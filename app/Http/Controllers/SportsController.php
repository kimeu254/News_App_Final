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

        if(file_exists($path)){
            File::delete( $path);
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
