@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Cities</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('cities.create') }}"> Create New Cities</a>
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
            
   
   <a class="btn btn-info" href="{{ route('cities.show',$city->id) }}">Edit</a>

   

   
            </td>
            <td><a class="btn btn-danger" href = 'delete/{{ $city->id }}'>Delete</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>

  {{$cities->links()}}
<div>
@endsection