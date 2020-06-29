@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update Cities </h1>

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
        <form method="post" action="{{ route('countries.update') }}" enctype="multipart/form-data">
        
            @csrf
            <div class="form-group">

                <label for="long_name">Country Name:</label>
                <input type="text" class="form-control" name="long_name" value={{ $country->long_name }}/>
            </div>
           
           
   

                      

            <input type="hidden" name="id" value = "{{$country->id}}">

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection