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
            'listings'=>Listing::latest()->filter(request(['tag','search']))->paginate(6)
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
            'company'=>'required',
            'location'=>'nullable',
            'website'=>'nullable'
            /*'company'=>['required',Rule::unique('listings','company')]*/
            /*'email'=>['required','email']*/
        ]);

        //if theres an image uploaded store path in db
        if($request->hasFile('logo')){
            $formFields['logo']=$request->file('logo')->store('logos','public');
        }

        //save the logged in users id
        $formFields['user_id']=auth()->id();


        Listing::create($formFields);

        return redirect('./')->with('message','created listing');
    }

    //edit controller
    public function edit(Listing $listing){
        return view('listings.edit',['listing'=>$listing]);
    }

    public function update(Request $request,Listing $listing){        
        
        //makesure loggedin user is owner
        if($listing->user_id!=auth()->id()){
           abort(403,'unauthorised action');
        }
        
        $formFields=$request->validate([
            'title'=>'required',
            'tags'=>'nullable',            
            'description'=>'nullable',
            'email'=>'nullable',
            'tags'=>'nullable',
            'company'=>'required',
            'location'=>'nullable',
            'website'=>'nullable'
            /*'company'=>['required',Rule::unique('listings','company')]*/
            /*'email'=>['required','email']*/
        ]);

        //if theres an image uploaded store path in db
        if($request->hasFile('logo')){
            $formFields['logo']=$request->file('logo')->store('logos','public');
        }

        $listing->update($formFields);

        return back()->with('message','updated listing');
    }


    public function destroy(Listing $listing){
        
        //makesure loggedin user is owner
        if($listing->user_id!=auth()->id()){
            abort(403,'unauthorised action');
        }
        
        $listing->delete();
        return redirect('/')->with('message','Deleted ok');
    }

    //manage
    public function manage(){
        return view('listings.manage',[
            'listings'=>auth()->user()->listings()->get()
        ]);
    }    

}
