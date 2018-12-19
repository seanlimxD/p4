@extends('layouts.master')

@section('title')
Confirm Deletion: {{$book->title}}
@stop

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1 id = "heading">Delete {{$book->title}}?</h1>
        <p>
        	<form method='POST' action='/books/{{$book->id}}'>
	        {{ csrf_field() }}
		        <input type='hidden' name='id' value='{{$book->id}}'?>
		        <input name="_method" type="hidden" value="DELETE">
	            <input type='submit' value='Yes, delete it.' class="btn btn-primary btn-lg" role="button">
            	<a class="btn btn-primary btn-lg" href="/books/{{$book->id}}" role="button">No, go back.</a>
	        </form>
        </p>
    </div>
</div>

<hr>
@endsection