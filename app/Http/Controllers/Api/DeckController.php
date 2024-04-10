<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DescStoreRequest;
use App\Http\Resources\DeskResourse;
use App\Models\Desk;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    public function index()
    {
        return DeskResourse::collection(Desk::all());
    }

    public function show($id)
    {

        return new DeskResourse(Desk::findOrFail($id));
    }

    public function store(DescStoreRequest $request)
    {

        $created_desk = Desk::create($request->validated());
        return new DeskResourse($created_desk);
    }

    public function destroy($id)
    {
        $record = Desk::find($id);
        if ($record) {

            return response()->json($record->delete());
        }
        return response()->json('desc not found', 400);
    }
}
