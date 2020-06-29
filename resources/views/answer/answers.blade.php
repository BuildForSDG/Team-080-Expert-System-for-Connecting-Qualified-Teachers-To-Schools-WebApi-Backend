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
          <td>Answer</td>
          <td>Is Active</td>
        <td>Is Correct</td>
        

          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($answers as $answer)
        <tr>
            <td>{{$answer->answer}}</td>
            <td>{{$answer->is_active}}</td>
            <td>{{$answer->is_correct}}</td>
            
            <td>
            
   
            <a class="btn btn-info" href="{{ route('answers.show',$answer->id) }}">Edit</a>
         
            
         
            
                     </td>
                     <td><a class="btn btn-danger" href = 'delete/{{ $answer->id }}'>Delete</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>

  {{$answers->links()}}
<div>
@endsection