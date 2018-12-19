@extends('layouts.master')

@section('title') 
    Index
@stop

@section('content')
<!-- Main jumbotron for info on site -->
<div class="jumbotron">
    <div class="container">
        @if(Auth::user())
        <h1 id = "heading"> {{Auth::user()->name}}'s Stuff</h1>
        @endif
        <p><a class="btn btn-primary btn-lg" href="/about" role="button">About this site &raquo;</a></p>
    </div>
</div>

<div class="container">
    <!-- Column of book summaries -->
    @if ($mybooks)
    <div class="row">
        <div class="col-md-3 col-sm-12">      
            <div class="panel panel-default">
                <div class="panel-heading"><h3>My Books</h3></div>
                <div class="panel-body">
                @foreach ($mybooks as $book)
                    <div class="col-md-12 col-sm-12">
                        <img src="{{$book->cover_url}}" class="img-responsive cover" alt="Cover Image for {{$book->title}}"/>
                        <h2>{{$book->title}}</h2><span>by {{$book->author->name}}</span>
                        <p>{{$book->synopsis}}</p>
                        <p>
                            <a class="btn btn-default" href="/books/{{$book->id}}" role="button">View details &raquo;</a>
                        </p>
                    </div>
                @endforeach
                    @if (sizeOf($mybooks) == 0)
                        <p> It seems like you don't have any books at the moment. <a href="/books/create">Click here</a> to create one! </p>
                    @endif
                </div>
            </div>
        </div>
    @endif
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Book list</h3></div>
                    <div class="panel-body">
                    @foreach($books as $book)
                        <div class="col-md-4 col-sm-12">
                            <img src="{{$book->cover_url}}" class="img-responsive cover" alt="Cover Image for {{$book->title}}"/>
                            <h2>{{$book->title}}</h2><span>by {{$book->author->name}}</span>
                            <p>{{$book->synopsis}}</p>
                            <p><a class="btn btn-default" href="/books/{{$book->id}}" role="button">View details &raquo;</a></p>
                        </div>
                    @endforeach
                    @if (sizeOf($books) == 0)
                        <p> Nothing found for what you are looking for! <a href="/books/create">Click here</a> to create a similar one! </p>
                    @endif
                    </div>
            </div>
        </div>
    </div>

<hr>
@stop