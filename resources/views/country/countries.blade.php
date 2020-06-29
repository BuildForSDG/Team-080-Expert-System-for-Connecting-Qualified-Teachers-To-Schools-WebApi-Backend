@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Countries</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('countries.create') }}"> Create Countries</a>
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
          <td>Country Name</td>
         
        

          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($countries as $country)
        <tr>
            <td>{{$country->long_name}}</td>
            
            <td>
            
   
   <a class="btn btn-info" href="{{ route('countries.show',$country->id) }}">Edit</a>

   

   
            </td>
            <td><a class="btn btn-danger" href = 'delete/{{ $country->id }}'>Delete</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>

  {{$countries->links()}}
<div>
@endsection