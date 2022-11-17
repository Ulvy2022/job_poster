<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use App\Models\User;
use App\Models\Features;
use App\Models\Plane;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{

    public function index()
    {
        return Subscribe::get();
    }


    public function store(Request $request)
    {
        $date = date("Y-m-d");
        $subscribsion = new Subscribe();
        $feature = Features::find($request->features_id);
        $subscribsion->user_id = $request->user_id;
        $subscribsion->features_id = $request->features_id;
        $subscribsion->name = $feature['name'];
        $subscribsion->feature = $feature['features'];
        $subscribsion->charge = $this->setChargeBySubName($feature['name']);
        $subscribsion->leftCharge = $this->setChargeBySubName($feature['name']);
        $subscribsion->save();
        $user = User::find($request->user_id);
        $user->subscription = $subscribsion->name;
        $user->update();
        $subscribes_id = Subscribe::where('user_id', $request->user_id)->get()->last();
        app('App\Http\Controllers\RestorePostController')->store($subscribes_id['id'], $subscribes_id['user_id'], );
        app('App\Http\Controllers\PlaneController')->store($request);
        return response()->json(['msg' => 'success']);
    }

    public function show($id)
    {
        return Subscribe::where('user_id', $id)->get();
    }


    public function update(Request $request, Subscribe $subscribsion)
    {
        //
    }


    public function destroy($id)
    {
        return Subscribe::destroy($id);
    }


    public function getUserPlane($id)
    {
        return User::with(['Subscribsion'])->where('id', $id)->first();
    }

    public function  userTrail(Request $request)
    {
        $subscribsion = new Subscribe();
        $feature = Features::find(1);
        $subscribsion->user_id = $request->user_id;
        $subscribsion->features_id = $request->features_id;
        $subscribsion->charge = $this->setChargeBySubName($feature['name']);
        $subscribsion->leftCharge = $this->setChargeBySubName($feature['name']);
        $subscribsion->save();
        $user = User::find($request->user_id);
        $user->subscription = $subscribsion->name;
        $user->update();
        $subscribes_id = Subscribe::where('user_id', $request->user_id)->get()->last();
        app('App\Http\Controllers\RestorePostController')->store($subscribes_id['id'], $subscribes_id['user_id'], );
        app('App\Http\Controllers\PlaneController')->store($request);
        return response()->json(['msg' => 'success']);
    }



    public function getCostOfSub($name)
    {
        if ($name == "Trailer") {
            return 0;
        } else if ($name == "Silver") {
            return 20;
        } else if ($name == "Gold") {
            return 40;
        } else if ($name == "Diamond") {
            return 60;
        }
    }

    public function setChargeBySubName($name)
    {
        if ($name == 'Trailer') {
            return 1;
        } else if ($name == 'Silver') {
            return 3;
        } else if ($name == 'Gold') {
            return 6;
        } else if ($name == 'Diamond') {
            return 1000000000;
        }
    }
}
