<?php

namespace App\Http\Controllers;


use LucasDotVin\Soulbscription\Models\Subscription;
use LucasDotVin\Soulbscription\Models\Feature;
use LucasDotVin\Soulbscription\Models\FeaturePlan;

use LucasDotVin\Soulbscription\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{

    public function index()
    {
        return Subscription::get();
    }


    public function store(Request $request)
    {
        $student = User::find($request->subscriber_id);
        $plan = Plan::find($request->plan_id);
        $student->subscribeTo($plan, expiration: today()->addMonth());

        $feature_id = app('App\Http\Controllers\FeaturesController')->getFeatureId($plan['name']);

        $plan_id = app('App\Http\Controllers\PlaneController')->getPlanId($plan['name']);

        $charge = app('App\Http\Controllers\FeaturesController')->getChargeByName($plan['name']);

        app('App\Http\Controllers\FeaturePlanController')->store($feature_id,$plan_id,$charge                                                   );
        $subscriber_id = Subscription::where("subscriber_id",$request->subscriber_id)
        ->where('was_switched', 0)->first();
        $featurePlan = FeaturePlan::findOrFail($student['id']);
        $charges = Plan::findOrFail($featurePlan['plan_id']);
        app('App\Http\Controllers\FeatureTicketController')
        ->store(
            $charges['periodicity'],
            $featurePlan['id'],
            $subscriber_id['subscriber_id'],
            $charges['name'],
        );

        return response()->json(['msg'=>'subscribe successful']);
    }

    public function show($id)
    {
        return Subscription::where('id', $id)->get();
    }


    public function switchTo(Request $request)
    {
        $student = User::find($request->subscriber_id);
        // $oldPlan =  Plan::where('subscriber_id',$request->subscriber_id)
        // ->where('was_switched',0)->get();
        $plan = Plan::find($request->plan_id);
        $oldSub = Subscription::where('subscriber_id',$request->subscriber_id)
        ->where('was_switched',0)->get();
        $newSub = Subscription::findOrFail($oldSub[0]['id']);
        $newSub->was_switched = true;
        $newSub->update();
        $this->store( $request);

        return response()->json(['msg'=>'subscribe successful']);
    }


    public function destroy($id)
    {
        $subscriber = Subscription::findOrFail($id);
        $subscriber->canceled_at = Carbon::now()->toDayDateTimeString();
        $subscriber->save();
      
    }


    public function getUserPlane($id)
    {
        return User::with(['Subscribsion'])->where('id', $id)->first();
    }

    public function  userTrail(Request $request)
    {
        $subscribsion = new Subscription();
        $feature = Feature::find(1);
        $subscribsion->user_id = $request->user_id;
        $subscribsion->features_id = $request->features_id;
        $subscribsion->charge = $this->setChargeBySubName($feature['name']);
        $subscribsion->leftCharge = $this->setChargeBySubName($feature['name']);
        $subscribsion->save();
        $user = User::find($request->user_id);
        $user->subscription = $subscribsion->name;
        $user->update();
        $subscribes_id = Subscription::where('user_id', $request->user_id)->get()->last();
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

    public function addDays($sub_id)
    {
        $sub = Subscription::findOrFail($sub_id);
        $sub->expired_at = $sub->expired_at->addDays(30+$sub->expired_at->format('d') );
        $sub->update();
        return response()->json(['mg'=>'renewal successfully']);
    }



}
