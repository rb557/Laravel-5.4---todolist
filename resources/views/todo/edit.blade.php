@extends('layout.app')
@section('body')
    <br>
    <a href="/todo" class="btn btn-info">Back</a>
    <!-- for margin-->
    <div class="col-lg-4 col-lg-offset-4">
        <h1>{{substr(Route::currentRouteName(),5)}} Item</h1>


        {!! Form::model($item,['route'=>['todo.update',$item->id],'method'=>'PUT']) !!}
        {{Form::label('title','Title:')}}
        {{Form::text('title',null,['class'=>'form-control input-lg'])}}

        {{Form::label('body','Body:',['class'=>'form-spacing-top'])}}
        {{Form::textarea('body',null,['class'=>'form-control'])}}
        <br>
        {{Form::submit('Save',['class'=>'btn btn-success'])}}
        {{Form::close()}}



        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
    </div>
@endsection
