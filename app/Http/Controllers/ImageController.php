<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Image;
use Auth;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('images.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titre' => 'required',
            'photo_local_link' => 'required',
        ]);
        
        $userid = Auth::user()->id;

        $image= new Image();
        $image->titre= $request->get('titre') ? $request->get('titre') : '';
        $image->url= $request->get('url') ? $request->get('url') : '';
        $image->description= $request->get('description') ? $request->get('description') : '';
        $image->user_id=$userid;

        if ($request->get('categories') && $request->hasFile('photo_local_link')) {

            $album = Album::firstOrNew(['titre' => $request->get('categories') ]);
            $album->user_id = $userid;
            $image->album_id=$album->id ;
            $image->photo_local_link= $request->file('photo_local_link')->store('public/'.$userid.'/'.$request->get('categories'));
        }

        if (!$request->get('categories') && $request->hasFile('photo_local_link')) {
            $image->photo_local_link= $request->file('photo_local_link')->store('public/'.$userid.'/images');
        }

        return $image->save()? $image: null;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::find($id);
        return  view('images.show',compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
