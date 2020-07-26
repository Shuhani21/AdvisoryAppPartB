<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use Auth;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('listing.create');
    }

    public function listing()
    {
        $listings = auth()->user()->listings; //fetch list for current user only
        return view('listing', compact('listings'));
    }

    public function store()
    {
        $data = request()->validate([
            'list_name' => "required",
            'distance' => "required",

        ]);
        // $data['user_id'] = auth() -> user() ->id;

        // $listing = \App\Listing::create($data);

        $listing = auth()->user()->listings()->create($data);

        return redirect("/listing");
    }

    public function destroy(Listing $listing)
    {
        //$listing = auth()->user()->listings();
        // dd($listing);
        $listing->delete();

        return redirect("/listing");
    }

    

    
    

    // public function show(\App\Listing $listing)
    // {
    //     $listings = auth()->user()->listings; //fetch list for current user only
    //     return view('home', compact('listings'));
    //     // return view('listing.show', compact("listing"));
    // }
    
    
}
