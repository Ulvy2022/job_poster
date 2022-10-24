<?php

namespace App\Http\Controllers;

use App\Models\Plane;
use App\Models\User;
use Illuminate\Http\Request;

class PlaneController extends Controller
{

    public function index()
    {
        return Plane::all();
    }

    public function store(Request $request)
    {
        $plane = new Plane();
        $plane->user_id = $request->user_id;
        $plane->subscriobsion_id = $request->subscriobsion_id;
        $plane->start_date = $request->start_date;
        $plane->end_date = $request->end_date;
        $plane->save();
        return response()->json(['msg' => 'created']);
    }


    public function show($id)
    {
        return User::with(['plane', 'subscribsion'])->where('id', $id)->first();
    }



    public function update(Request $request, $id)
    {
        $plane = Plane::findOrFail($id);
        $plane->start_date = $request->start_date;
        $plane->end_date = $request->end_date;
        $plane->update();
        return response()->json(['msg' => 'updated']);
    }


    public function destroy($id)
    {
        return Plane::destroy($id);
    }


}
