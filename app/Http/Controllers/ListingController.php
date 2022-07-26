<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //
    public function index(){
        return view('listings.index',[
            'heading'=>'Latest listings',
            'listings'=>Listing::latest()->filter(request(['tag','search']))->get()
        ]);

    }
    //1 listing
    public function show(Listing $listing){
        
        return view('listings.show',[
            'listing'=>$listing
        ]);

    }

    //show create form
    public function create(){        
        return view('listings.create');
    }

    //store
    public function store(Request $request){        
        $formFields=$request->validate([
            'title'=>'required',
            'tags'=>'nullable',            
            'description'=>'nullable',
            'email'=>'nullable',
            'tags'=>'nullable',
            'company'=>'nullable',
            'location'=>'nullable',
            'website'=>'nullable'
            /*'company'=>['required',Rule::unique('listings','company')]*/
            /*'email'=>['required','email']*/
        ]);

        Listing::create($formFields);

        return redirect('./')->with('message','created listing');
    }

}
