<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use App\Models\User;
use App\Models\Features;
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
        $subscribsion->subscribed_at = date("D j M Y");
        if ($feature['name'] == 'Trailer') {
            $subscribsion->charge = 1;
            $subscribsion->leftCharge = 1;
        } else if ($feature['name'] == 'Silver') {
            $subscribsion->charge = 3;
            $subscribsion->leftCharge = 3;
        } else if ($feature['name'] == 'Gold') {
            $subscribsion->charge = 10;
            $subscribsion->leftCharge = 10;
        } else if ($feature['name'] == 'Diamond') {
            $subscribsion->charge = 1000000000;
            $subscribsion->leftCharge = 1000000000;
        }
        $subscribsion->expired_at = date('D j M Y', strtotime($date . ' + 29 days'));
        $subscribsion->save();
        $user = User::find($request->user_id);
        $user->subscription = $subscribsion->name;
        $user->update();
        return response()->json(['msg' => 'success']);

    }


    public function show(Subscribe $subscribsion)
    {
        //
    }


    public function update(Request $request, Subscribe $subscribsion)
    {
        //
    }


    public function destroy(Subscribe $id)
    {
        return Subscribe::destroy($id);
    }

    public function minusCharge($id)
    {
        $sub = Subscribe::find($id);
        if ($sub) {
            if ($sub->charge > 1) {
                $sub->charge -= 1;
                $sub->update();
            }
            return response()->json(['msg' => $sub->charge]);
        }
    }

    public function getUserPlane($id)
    {
        return User::with(['Subscribsion'])->where('id', $id)->first();
    }

    public function restoreCharge()
    {
        $notExpireJob = Subscribe::all();
        foreach ($notExpireJob as $job) {
            if (strtotime($job['expired_at']) == strtotime(date("D j M Y"))) {
                $expiredJob = Subscribe::findOrFail($job['id']);
                $expiredJob->leftCharge = $expiredJob->charge;
                // return $expiredJob;
                $expiredJob->update();
            }
        }
    }
}
