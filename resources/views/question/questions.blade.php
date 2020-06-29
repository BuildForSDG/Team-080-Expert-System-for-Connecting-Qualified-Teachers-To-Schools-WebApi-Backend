@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Questions</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('questions.create') }}"> Create New Questions</a>
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
          <td>Questions</td>
          <td>Is Active</td>
        <td>Is German</td>
        

          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($questions as $question)
        <tr>
            <td>{{$question->question}}</td>
            <td>{{$question->is_active}}</td>
            <td>{{$question->is_german}}</td>
            
            <td>
            
   
            <a class="btn btn-info" href="{{ route('questions.show',$question->id) }}">Edit</a>
         
            
         
            
                     </td>
                     <td><a class="btn btn-danger" href = 'delete/{{ $question->id }}'>Delete</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>

  {{$questions->links()}}
<div>
@endsection