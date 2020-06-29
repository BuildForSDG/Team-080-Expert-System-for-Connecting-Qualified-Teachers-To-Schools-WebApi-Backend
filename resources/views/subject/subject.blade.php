@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update Subjects </h1>

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
        <form method="post" action="{{ route('subjects.update') }}" enctype="multipart/form-data">
        
            @csrf
            <div class="form-group">

<label for="name">Subject Name:</label>
<input type="text" class="form-control" name="name" value={{ $subject->name }}/>
</div>




      

<div class="form-group row mt-4">

<label for="home_content" class="col-md-2 col-form-label">Level</label>
<div class="col-md-10">

<select class="form-control" name="level_name" id="level_name" required>
<option selected>Select A Level</option>
@foreach($levels as $level)
<option value="{{$level->id}}">{{$level->name}}</option>
@endforeach
</select>
</div>
</div>

            <input type="hidden" name="id" value = "{{$subject->id}}">

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection