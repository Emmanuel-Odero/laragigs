<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //Show all listings
    public function index(){
        // dd(request('tag'));
        return view('listings.index',[
        'listings'=>Listing::latest()->filter(request(['tag','search']))
            ->paginate(6)
        ]
    );
    }
    //show Single Listings
    public function show(Listing $listing){
        return view('listings.show', [
        'listing'=>$listing
    ]);
    }
    // Create Listing
    public function create(){
        return view('listings.create');
    }
    // Store Listing Data
    public function store(Request $request){
        // dd($request->file('logo'));
        $formFields = $request->validate([
            'title'=>'required',
            'company'=>['required',Rule::unique('listings', 'company')],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
            'description'=>'required'
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        Listing::create($formFields);
        return redirect('/')->with('message','Listing Successfuly Created');
    }
}
