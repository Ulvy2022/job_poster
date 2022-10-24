<?php

namespace App\Http\Controllers;

use App\Models\Subscribsion;
use App\Models\User;
use Illuminate\Http\Request;

class SubscribsionController extends Controller
{
    public function index()
    {
        return Subscribsion::all();
    }
    public function store(Request $request)
    {
        // $validated = $request->validateWithBag('Subscribsion',[
        //     'user_id'=>'required',
        //     'price'=>'required',
        //     'feature'=>'required',
        //     'description'=>'required',
        //     'plane_type'=>'required'
        // ]);

        $subscribsion = new Subscribsion();
        $subscribsion->user_id = $request->user_id;
        $subscribsion->price = $request->price;
        $feature = $subscribsion->features;
        $feature['f1'] = 'Post 1 job for 15 days';
        $feature['f2'] = 'Post 3 jobs for 15 days';
        $feature['f3'] = 'Post 10 jobs for 15 days';
        $feature['f4'] = 'Unlimited post for 30 days';
        $subscribsion->features = $feature;
        $subscribsion->description = $request->description;
        $subscribsion->plane_type = $request->plane_type;
        $subscribsion->save();
        return response()->json(['msg' => 'success']);
    }

    public function show(Subscribsion $subscribsion)
    {
        //
    }

    public function update(Request $request, Subscribsion $subscribsion)
    {
        //
    }

    public function destroy(Subscribsion $subscribsion)
    {
        //
    }
}
