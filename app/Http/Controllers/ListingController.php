<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //Show all listing
    public function index(){
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }
    //Show One listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
    
        ]);
    }

    //Show create form
    public function create(){
        return view('listings.create');
    }
    //Store-Add Data
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'company'=> ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);
        
        Listing::create($formFields);
        
        return redirect('/')->with('message', 'Listing created successfully!');
    }

     // Show Edit Form
     public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }


    //Update Data
    public function update(Request $request, Listing $listing){
        $formFields = $request->validate([
            'title' => 'required',
            'company'=> 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);
        
        $listing->update($formFields);
        
        return redirect('/')->with('message', 'Listing updated successfully!');
    }

}
