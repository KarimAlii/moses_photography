<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums=Album::all();
        $images=Image::all();
        return view('admin.albums.all',compact('albums','images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums=Album::all();
        $categories=Category::all();
        return view('admin.albums.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $album=Album::create([
            'name'=>$request->name,

            'category_id'=>$request->category_id,
        ]);

        foreach($request->images as $image){
            $albumImage=Time() . "_" . $image->getClientOriginalName();
            $image->move('albums',$albumImage);
            Image::create([
                'album_id'=>$album->id,
                'filename'=>$albumImage
            ]);

        }
        $albums=Album::all();
        return view('admin.albums.all',compact('albums'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album=Album::findOrFail($id);
        return view('admin.albums.edit',compact('album'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $album=Album::findOrFail($id);
        $album->update([
            'name'=>$request->name,

            'category_id'=>$request->category_id,
        ]);

        foreach($request->images as $image){
            $albumImage=Time() . "_" . $image->getClientOriginalName();
            $image->move('albums',$albumImage);
            Image::create([
                'album_id'=>$album->id,
                'filename'=>$albumImage
            ]);
        }
        $albums=Album::all();
        return view('admin.albums.all',compact('albums'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album=Album::findOrFail($id);
        $album->delete();
        return redirect()->back();
    }
}
