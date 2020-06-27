@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Create Levels </h1>

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
        <form method="post" action="{{ route('levels.store') }}" enctype="multipart/form-data">
        
            @csrf
            <div class="form-group">

                <label for="name">Question:</label>
                <input type="text" class="form-control" name="name"/>
            </div>
           
            <div class="form-group">
                <label for="level_group">Level Group:</label>
                <input type="text" class="form-control" name="level_group" />
            </div>



            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection