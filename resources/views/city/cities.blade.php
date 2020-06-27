@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Answers</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('answers.create') }}"> Create New Answers</a>
            </div>
        </div>
    </div>
   

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>City Name</td>
         
        

          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($cities as $city)
        <tr>
            <td>{{$city->name}}</td>
            
            <td>
            <form action="{{ route('cities.destroy',$city->id) }}" method="POST">
   
   <a class="btn btn-info" href="{{ route('cities.show',$city->id) }}">Edit</a>

   

   @csrf
   

   <button type="submit" class="btn btn-danger">Delete</button>
</form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

  {{$cities->links()}}
<div>
@endsection