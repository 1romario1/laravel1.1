<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CountryControllers extends Controller
{
    public function store(Request $request){
        $request->validate([
            'country_code'=>'required|string|min:2|max:10|unique:countries,country_code',
            'country_name'=>'required|string|min:4|max:50'
        ]);

        country::create([
            'country_code'=>$request->country_code,
            'country_name'=>$request->country_name
        ]);
        return redirect()->back()
        ->with('success','Pais creado correctamente');
        
    }
    public function index(Request $request){
        $countries = Country::get();
        return view('country.index', ['country' => $countries]);
    }
}
