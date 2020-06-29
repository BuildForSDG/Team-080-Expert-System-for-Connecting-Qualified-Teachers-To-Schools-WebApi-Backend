@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update States </h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('states.update') }}" enctype="multipart/form-data">
        
            @csrf
            <div class="form-group">

<label for="name">State Name:</label>
<input type="text" class="form-control" name="name" value={{ $state->name }}/>
</div>




      

<div class="form-group row mt-4">

<label for="home_content" class="col-md-2 col-form-label">Country</label>
<div class="col-md-10">

<select class="form-control" name="country_name" id="country_name" required>
<option selected>Select A Country</option>
@foreach($countries as $country)
<option value="{{$country->id}}">{{$country->long_name}}</option>
@endforeach
</select>
</div>
</div>



            <input type="hidden" name="id" value = "{{$state->id}}">

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection