@extends('layouts.master')

@section('title') 
    {{Auth::user()->name}}'s Followed Books
@stop

@section('content')
<!-- Main jumbotron for info on site -->
<div class="jumbotron">
    <div class="container">
        <h1 id = "heading">{{Auth::user()->name}}'s Followed Books</h1>
    </div>
</div>

<div class="container">
    <!-- Column of book summaries -->
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Followed book list</h3></div>
                    <div class="panel-body" ng-init="books = {{$books}}">
                    @foreach($books as $book)
                        <div class="col-md-4 col-sm-12">
                            <img src="{{$book->cover_url}}" class="img-responsive" alt="Cover Image for {{$book->title}}" id="cover"/>
                            <h2>{{$book->title}}</h2><span>by {{$book->author->name}}</span>
                            <p>{{$book->synopsis}}</p>
                            <p><a class="btn btn-default" href="/books/{{$book->id}}" role="button">View details &raquo;</a></p>
                        </div>
                    @endforeach
                    @if (sizeOf($books) == 0)
                        <p ng-hide="filteredbooks.length"> Nothing found for what you are looking for! <a href="/index">Click here</a> find books you'd like to read! </p>
                    @endif
                    </div>
            </div>
        </div>
    </div>
</div> <!--container-->

<hr>
@stop