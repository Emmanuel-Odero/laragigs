<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PhpParser\Node\Expr\List_;

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
    //Display Edit Form
    public function edit(Listing $listing)
    {
        // dd($listing);
        return view('listings.edit', ['listing'=> $listing]);
    }
    // Update Data in Listing Form
    public function update(Request $request, Listing $listing){
        // dd($request->file('logo'));
        $formFields = $request->validate([
            'title'=>'required',
            'company'=>['required'],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
            'description'=>'required'
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $listing->update($formFields);
        return back()->with('message','Listing Successfuly Updated');
    }
    public function delete(Listing $listing){
        $listing->delete();
        return redirect('/')->with('message','Listing Successfuly Deleted');
    }
}
