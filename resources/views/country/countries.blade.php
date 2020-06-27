@extends('layouts.cp')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Countries</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('countries.create') }}"> Create New Countries</a>
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
            <td>{{$country->name}}</td>
            
            <td>
            <form action="{{ route('countries.destroy',$country->id) }}" method="POST">
   
   <a class="btn btn-info" href="{{ route('countries.show',$country->id) }}">Edit</a>

   

   @csrf
   

   <button type="submit" class="btn btn-danger">Delete</button>
</form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

  {{$countries->links()}}
<div>
@endsection