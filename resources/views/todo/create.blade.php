@extends('layout.app')
@section('body')
    <br>
    <a href="/todo" class="btn btn-info">Back</a>
    <!-- for margin-->
    <div class="col-lg-4 col-lg-offset-4">
    <h1>{{substr(Route::currentRouteName(),5)}} Item</h1>
        <form class="form-horizontal" action="{{route('todo.store')}}" method="post">
            {{csrf_field()}}
            @section('editMethod')
                @show
            <fieldset>
                <div class="form-group">
                <div class="col-lg-10">
                    <input type="text" name="title" class="form-control" placeholder="Title" value="@yield('editTitle')">
                        <br>
                    </div>
                    <div class="col-lg-10">

                        <textarea class="form-control" placeholder="Body" name="body" rows="5" id="textArea">
                        @yield('editBody')</textarea>
                        <br>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </fieldset>
        </form>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
    </div>
    @endsection
