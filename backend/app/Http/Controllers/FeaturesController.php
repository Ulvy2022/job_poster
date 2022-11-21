<?php

namespace App\Http\Controllers;

use LucasDotVin\Soulbscription\Models\Feature;

use Illuminate\Http\Request;

class FeaturesController extends Controller
{

    public function index()
    {
        return Feature::all();
    }


    public function store(Request $request)
    {
        //
    }


    public function show($name)
    {

    }


    public function update(Request $request, Feature $Feature)
    {
        //
    }


    public function destroy(Feature $Feature)
    {
        //
    }

    public function getChargeByName($name)
    {
        $feature = Feature::where("name", $name)->get();
        if ($feature[0]['name'] == 'trail') {
            return 1;
        } else if ($feature[0]['name'] == 'silver') {
            return 3;
        } else if ($feature[0]['name'] == 'gold') {
            return 5;
        } else if ($feature[0]['name'] == 'silver') {
            return 7;
        } else if ($feature[0]['name'] == 'diamond') {
            return 7;
        }
    }

    public function getFeatureId($name)
    {
        $feature = Feature::where("name", $name)->get();
        return $feature[0]['id'];
    }
}
