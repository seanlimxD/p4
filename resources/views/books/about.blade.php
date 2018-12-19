@extends('layouts.master')

@section('title')
    About
@stop

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 id = "heading">About me</h1>
            <p><a class="btn btn-primary btn-lg" href="/" role="button">Back to index &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-8">
                <h2>Sean Lim</h2>
                <p>I'm Sean, a former child prodigy and current mediocre adult. I somehow convinced the people around me that I was smart for nearly eighteen years.</p>
            </div>
            <div class="col-md-4">
                <p><img id = "avatar" alt = "Photo of Sean Lim" src = "/images/me.png" class="img-responsive"/></p>
            </div>
        </div>
    </div>
@stop