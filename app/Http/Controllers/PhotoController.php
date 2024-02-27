<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoStoreReqest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index(){
        $photos = [1,2,3,4,5,6,7,8,9];
        return view("photos.index", compact("photos"));
    }
    public function create(){
        $photo =(object)['title' => 'Photo title', 'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores rem quaerat dolor porro eaque inventore odit, tempore illo laboriosam eligendi minima? A mollitia, tempore itaque ipsum vitae incidunt ex temporibus?'];
        return view("photos.create", compact("photo"));
    }
    public function store(Request $request){
        if($request->hasFile('image')){
            $path = $request->file('image')->store('photos');
            return back()->with(['success' => 'Фото добавлено', 'path' => '/storage/'. $path]);
        }
        else {
            dd($request->image->getErrorMessage());
        }


    }
    public function show($photo){
        $photo =(object)['title' => 'Photo title', 'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores rem quaerat dolor porro eaque inventore odit, tempore illo laboriosam eligendi minima? A mollitia, tempore itaque ipsum vitae incidunt ex temporibus?'];
        return view("photos.show", compact("photo"));
    }
    public function update(){

    }
    public function edit(){

    }
    public function destroy(){

    }
    public function photoView(){
        $directory = '/photos';
        $files = Storage::allFiles($directory);
        return view("photoView.index", compact("files"));
    }
}
