<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings 
    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    // Show single listing 
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    // Show create page
    public function create() {
        return view('listings.create');
    }
    // Store Listing data
    public function store(Request $request) {
        $formFields =  $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => ['required'],
            'description' => ['required']
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'local');
        }

        Listing::create($formFields);


        return redirect('/')->with('message', 'Listing created successfully!');
    }
    
    
    
    // display edit form 
    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }
    // update Listing data
    public function update(Request $request, Listing $listing) {
        $formFields =  $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => ['required'],
            'description' => ['required']
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'local');
        };


        $listing->create($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }

    // Delete Listing 
    public function delete(Listing $listing) {
        $listing->delete();
        return redirect('/')->with('meesage', 'listing deleted!');
    }

   

}
