<?php

namespace App\Http\Controllers;

use App\Models\UserPlane;
use App\Models\User;
use Illuminate\Http\Request;

class UserPlaneController extends Controller
{

    public function index()
    {
        return UserPlane::all();
    }

    public function store(Request $request)
    {
        $plane = new UserPlane();
        $plane->user_id = $request->user_id;
        $plane->subscriobsion_id = $request->subscriobsion_id;
        $plane->start_date = $request->start_date;
        $plane->end_date = $request->end_date;
        $plane->save();
        return response()->json(['msg' => 'created']);
    }


    public function show( $id)
    {
        return User::with(['plane', 'subscribsion'])->where('id', $id)->first();
    }



    public function update(Request $request,  $id)
    {
        $plane =  UserPlane::findOrFail($id);
        $plane->start_date = $request->start_date;
        $plane->end_date = $request->end_date;
        $plane->update();
        return response()->json(['msg' => 'updated']);
    }


    public function destroy( $id)
    {
        return UserPlane::destroy($id);
    }
}
