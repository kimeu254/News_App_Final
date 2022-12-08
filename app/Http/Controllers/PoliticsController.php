<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Politics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PoliticsController extends Controller
{
    public function index()
    {
        return Politics::all();
    }

    public function store(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'headline' => 'required',
            'story' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);

        $fileUpload = new Politics();
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
                $news->politics_id = $fileUpload->id;
                $news->save();
    
                return response()->json([
                    'success'=>'Post upload was success.',
                    'news' => $news,
                    'Politics' => $fileUpload,
                ]);
            }
    }

    public function update(Request $request, $id)
    {
        $Politics = Politics::find($id);
        $news_south_id = DB::table('news')->select('politics_id')->get();

        if ($news_south_id === $Politics)
        {
            $news_south_id->update(request()->all());
        }
        $Politics->update(request()->all());
    }

    public function destroy($id)
    {
        $Politics = Politics::find($id);
        $news_Politics_id = DB::table('news')->select('politics_id')->get();
        $path = storage_path().'/app/public/posts/'.$Politics->image;

        if(file_exists($path)){
            File::delete( $path);
        }

        if ($news_Politics_id === $Politics)
        {
            $news_Politics_id->delete();
        }
        $Politics->delete();

        return response([
            'message' => 'Post deleted.'
        ], 200);
    }
}
