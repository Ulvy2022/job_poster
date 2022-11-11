<?php

namespace App\Http\Controllers;

use App\Models\Plane;
use App\Models\User;
use App\Models\Subscribe;
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
        $date = date("Y-m-d");
        $plane->user_id = $request->user_id;
        $sub_id = Subscribe::where('user_id', $request->user_id)->get()->last();
        $plane->cost = app('App\Http\Controllers\SubscribeController')->getCostOfSub($sub_id['name']);
        $plane->subscribes_id = $sub_id['id'];
        $plane->subscribed_at = date("D j M Y");
        $plane->expired_at = date('D j M Y', strtotime($date . ' + 29 days'));
        $plane->save();
        return response()->json(['msg' => 'success']);
    }

    public function expiredSubscribe()
    {
        $sub = Plane::all();
        foreach ($sub as $job) {
            if (($job['expired_at']) == (date("D j M Y"))) {
                $expiredSub = Plane::findOrFail($job['subscribes_id']);
                $expiredSub->expired = "Yes";
                $expiredSub->update();
            }
        }
    }

    public function restoreCharge()
    {
        $sub = Plane::all();
        foreach ($sub as $job) {
            if (($job['expired_at']) == (date("D j M Y"))) {
                $charge = Subscribe::findOrFail($job['subscribes_id']);
                $charge->leftCharge = $charge->charge;
                $charge->update();
            }
        }
    }


    public function show($id)
    {
        return User::with(['plane', 'subscribsion'])->where('id', $id)->first();
    }



    public function update(Request $request, $id)
    {
        $plane = Plane::findOrFail($id);
        $plane->subscribes_id = $request->subscribes_id;
        $plane->start_date = $request->start_date;
        $plane->end_date = $request->end_date;
        $plane->update();
        return response()->json(['msg' => 'updated']);
    }


    public function destroy($id)
    {
        // return Plane::destroy($id);
        return (Subscribe::where('user_id', $id)->get());
    }


}
