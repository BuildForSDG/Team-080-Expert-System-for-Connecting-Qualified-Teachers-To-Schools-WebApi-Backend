@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Create Answers </h1>

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
        <form method="post" action="{{ route('answers.store') }}" enctype="multipart/form-data">
        
            @csrf
            <div class="form-group">

                <label for="answer">Answer:</label>
                <input type="text" class="form-control" name="answer"/>
            </div>
           
            <div class="form-group">
                <label for="is_active">Is Active?:</label>
                <input type="checkbox" class="form-control" name="is_active" />
            </div>

            <div class="form-group">
        <label for="images"></label>
        <div class="custom-file">
        <input type="file" class="custom-file-input" id="images" name="image_name">
            <label class="custom-file-label" for="images">Answer Image</label>
        </div>
    </div>
   

            
   

            
            <div class="form-group">
                <label for="is_correct">Is Correct?:</label>
                <input type="checkbox" class="form-control" name="is_correct"/>
            </div>
           

          
           
          
           
           

<div class="form-group row mt-4">

<label for="home_content" class="col-md-2 col-form-label">Question</label>
<div class="col-md-10">

<select class="form-control" name="question_name" id="question_name" required>
<option selected>Select A Question</option>
@foreach($questions as $question)
<option value="{{$question->id}}">{{$question->question}}</option>
@endforeach
</select>
</div>
</div>



            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection