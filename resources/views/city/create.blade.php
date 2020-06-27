@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Create Cities </h1>

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
        <form method="post" action="{{ route('cities.store') }}" enctype="multipart/form-data">
        
            @csrf
            <div class="form-group">

                <label for="name">City Name:</label>
                <input type="text" class="form-control" name="name"/>
            </div>
           
           
   

                      

<div class="form-group row mt-4">

<label for="home_content" class="col-md-2 col-form-label">State</label>
<div class="col-md-10">

<select class="form-control" name="home_content" id="home_content" required>
<option selected>Select A State</option>
@foreach($states as $state)
<option value="{{$state->id}}">{{$state->name}}</option>
@endforeach
</select>
</div>
</div>



            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection