@extends('layouts.master')

@section('title')
{{$chapter->name}}
@stop

@section('content')
<!-- Main jumbotron for info on site -->
<div class="jumbotron">
    <div class="container">
        <h1 id = "heading">{{$chapter->name}}</h1>
        <p><a class="btn btn-primary btn-lg" href="/books/{{$chapter->book_id}}" role="button">Back to book index &raquo;</a></p>
    </div>
</div>

<div class="container">
    <!-- Column of book summaries -->
    <div class="row">
        <div class='col-md-12'>
            <p>{{$chapter->content}}</p>
            @if (Auth::user() && Auth::user()->id == $book->author->id)
                <p>
                    <a class="btn btn-primary btn-lg" href="/book/{{$chapter->book_id}}/chapters/{{$chapter->id}}/edit" role="button"> Edit this chapter </a>
                </p>
            @endif
        </div>
    </div>
</div>

<hr>
@stop