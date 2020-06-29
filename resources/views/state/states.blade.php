@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> States</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('states.create') }}"> Create New States</a>
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
          <td>State Name</td>
         
        

          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($states as $state)
        <tr>
            <td>{{$state->name}}</td>
            
            <td>
            
   
            <a class="btn btn-info" href="{{ route('states.show',$state->id) }}">Edit</a>
         
            
         
            
                     </td>
                     <td><a class="btn btn-danger" href = 'delete/{{ $state->id }}'>Delete</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>

  {{$states->links()}}
<div>
@endsection