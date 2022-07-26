<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //
    public function index(){
        return view('listings.index',[
            'heading'=>'Latest listings',
            'listings'=>Listing::latest()->filter(request(['tag']))->get()
        ]);

    }
    //1 listing
    public function show(Listing $listing){
        
        return view('listings.show',[
            'listing'=>$listing
        ]);

    }

}
