@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Levels</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('levels.create') }}"> Create New Questions</a>
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
          <td>Levels</td>
          <td>Level group</td>
        
        

          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($levels as $level)
        <tr>
            <td>{{$level->name}}</td>
            <td>{{$level->level_group}}</td>
            
            
            <td>
            
   
            <a class="btn btn-info" href="{{ route('levels.show',$level->id) }}">Edit</a>
         
            
         
            
                     </td>
                     <td><a class="btn btn-danger" href = 'delete/{{ $level->id }}'>Delete</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>

  {{$levels->links()}}
<div>
@endsection