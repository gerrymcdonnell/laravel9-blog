<h1>{{$heading}}</h1>

@php
    $test="this is a test";
@endphp

im a test var
{{$test}}

dd of listings


<hr>

@unless(count($listings)==0)
<p>no listings</p>

@foreach ($listings as $listing)
    <h3>{{$listing['id']}}</h3>
    
    <h2>{{$listing['title']}}</h2>
    
    <p>
        {{$listing['description']}}
    </p>
@endforeach
    
@else
    <p>no listings found</p>
@endunless
