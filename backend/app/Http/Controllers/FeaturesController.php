<?php

namespace App\Http\Controllers;

use App\Models\Features;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{

    public function index()
    {
        return Features::all();
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Features $features)
    {
        //
    }


    public function update(Request $request, Features $features)
    {
        //
    }

  
    public function destroy(Features $features)
    {
        //
    }
}
