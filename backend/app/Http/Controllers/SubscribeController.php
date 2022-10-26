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
        $subscribsion = new Subscribe();
        $feature = Features::find($request->features_id);
        $subscribsion->user_id = $request->user_id;
        $subscribsion->features_id = $request->features_id;
        $subscribsion->charge = $request->charge;
        $subscribsion->name = $feature['name'];
        $subscribsion->feature = $feature['features'];
        $subscribsion->subscribed_at = $request->subscribed_at;
        $subscribsion->expired_at = $request->expired_at;
        $subscribsion->save();
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


    public function destroy(Subscribe $subscribsion)
    {
        //
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
        return User::with(['subscribsion'])->where('id', $id)->first();
    }
}
