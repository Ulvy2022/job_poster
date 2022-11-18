<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LucasDotVin\Soulbscription\Models\FeatureTicket;
use LucasDotVin\Soulbscription\Models\Feature;
use Carbon\Carbon;

class FeatureTicketController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function store($charges, $feature_id, $subscriber_id, $subscriber_type)
    {
        $featurePlan  = new FeatureTicket();
        $featurePlan->charges = $charges;
        $featurePlan->feature_id = $feature_id;
        $featurePlan->expired_at = Carbon::now()->addMonth();
        $featurePlan->subscriber_type = $subscriber_type;
        $featurePlan->subscriber_id = $subscriber_id;
        $featurePlan->expired_at = date('m/d/Y H:i:s', time());
        $featurePlan->save();
        return response()->json(['id'=>$featurePlan['id']]);

    }

    
    public function show($id)
    {
        
    }

   
    public function update( $id)
    {
        $featurePlan  =  FeatureTicket::findorFail($id);
        if($featurePlan['charges'] > 0){
            $featurePlan->charges -= 1 ;
            $featurePlan->update();
            return response()->json(['msg'=>'Job posted']);
        }
        return response()->json(['msg'=>"You have used all your charges"]);
    }

   
    public function destroy($id)
    {
        //
    }
}
