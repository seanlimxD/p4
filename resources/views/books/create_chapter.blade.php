@extends('layouts.master')

@section('title')
Add New Chapter
@stop

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1 id = "heading">Adding chapter to {{$book->title}}</h1>
    </div>
</div>

<div class="container">
    <!-- Column of book summaries -->
    <div class="row">
        <div class="col-md-12">
            @include('errors')
            <div class = "col-md-6">
                <form method='POST' action='/books/{{$book->id}}/chapters'>
                        <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                        <div class='form-group'>
                                    <label for='name'>Chapter Title</label>
                                    <input name='name' class = 'form-control' type='text' value='{{old('name')}}'>
                        </div>
                        <div class='form-group'>
                                    <label for='order'>Chapter Number</label>
                                    <input name='order' class = 'form-control' type='text' value='{{old('order')}}'>
                        </div>
                        <div class='form-group'>
                                    <label for='content'>Content</label>
                                    <textarea class="form-control" rows="5" name='content'> {{old('content')}}</textarea>
                        </div>
                        <input type='submit' value='Add new chapter'>
                </form>
            </div>        
        </div>
    </div>
</div>

<hr>
@stop