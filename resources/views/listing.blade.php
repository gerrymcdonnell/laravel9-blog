@extends('layout')

@section('content')

    <h3>{{$listing['id']}}</h3>    
    <h2>
       
        {{$listing['title']}}
        
    </h2>
    
    <p>
        {{$listing['description']}}
    </p>

@endsection

