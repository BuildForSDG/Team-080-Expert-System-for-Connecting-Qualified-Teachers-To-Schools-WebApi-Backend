@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update Questions </h1>

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
        <form method="post" action="{{ route('questions.update') }}" enctype="multipart/form-data">
        
            @csrf
            <div class="form-group">

                <label for="name">Question:</label>
                <input type="text" class="form-control" name="name" value={{ $level->name }}/>
            </div>
           
            <div class="form-group">
                <label for="level_group">Level Group:</label>
                <input type="text" class="form-control" name="level_group" value={{ $level->level_group }}/>
            </div>




            <input type="hidden" name="id" value = "{{$level->id}}">

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection