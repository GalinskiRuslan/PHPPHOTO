<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoStoreReqest;
use App\Services\CalculateSumService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    public function index()
    {
        $directory = '/photos';
        $files = Storage::allFiles($directory);
        return view("photos.index", compact("files"));
    }
    public function create()
    {
        $photo = (object)['title' => 'Photo title', 'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores rem quaerat dolor porro eaque inventore odit, tempore illo laboriosam eligendi minima? A mollitia, tempore itaque ipsum vitae incidunt ex temporibus?'];
        return view("photos.create", compact("photo"));
    }
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('photos');
            return back()->with(['success' => 'Фото добавлено', 'path' => '/storage/' . $path]);
        } else {
            dd($request->image->getErrorMessage());
        }
    }
    public function show($photo)
    {
        return view("photos.show", compact("photo"));
    }
    public function update()
    {
    }
    public function edit()
    {
    }
    public function destroy(Request $request)
    {
        Storage::delete($request->path());
        return Redirect::route('photos.index')->with(['success' => 'Фото удалено']);
    }
    public function photoView()
    {
        dd(DB::table("users")->get());
        $directory = '/photos';
        $files = Storage::allFiles($directory);
        return view("photoView.index", compact("files"));
    }
    public function someCalculate(Request $request, CalculateSumService $service)
    {
        dd($service->sum($request->query('a'), $request->query('b')));
    }
}
