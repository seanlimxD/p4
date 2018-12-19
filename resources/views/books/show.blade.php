@extends('layouts.master')

@section('title')
{{$book->title}}
@stop

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1 id = "heading">{{$book->title}}</h1>
        @if (Auth::user() && Auth::user()->id == $book->user->id)
        <p>
            <a class="btn btn-primary btn-lg" href="/books/{{$book->id}}/edit" role="button">Edit this book</a>
            <a class="btn btn-primary btn-lg" href="/books/{{$book->id}}/delete" role="button">Delete this book</a>
            <a class="btn btn-primary btn-lg" href="/books/{{$book->id}}/chapters/create" role="button">Add a chapter</a>
        </p>
        @endif

    </div>
</div>

<div class="container">
    <!-- Column of book summaries -->
    <div class="row">
        <div class="col-md-4">
            <p><img id = "cover" alt = "Cover image" src = "{{$book->cover_url}}" class = 'img-responsive'/></p>
        </div>
        <div class = 'col-md-8'>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Synopsis</h3>
                </div>
                <div class="panel-body">
                    {{$book->synopsis}}
                </div>
            </div>
            <div class="panel panel-default chapter-panel" ng-init="chapters = {{$chapters}}">
                <!-- Default panel contents -->
                <div class="panel-heading">Chapters</div>
                <!-- List group -->
                <ul class="list-group">
                @foreach ($chapters as $chapter)
                    <li class="list-group-item">
                        Chapter {{$chapter->order}}
                        <a href = '/books/{{$book->id}}/chapters/{{$chapter->id}}'>{{$chapter->name}}</a>
                        @if (Auth::user() && Auth::user()->id == $book->user->id)
                            <a href="/books/{{$book->id}}/chapters/{{$chapter->id}}/delete"><span class='pull-right'>Delete</span></a>
                            <a href='/books/{{$book->id}}/chapters/{{$chapter->id}}/edit'><span class='pull-right'>Edit &nbsp;</span></a>
                        @endif
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<hr>
@stop