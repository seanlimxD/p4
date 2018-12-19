@extends('layouts.master')

@section('title')
Confirm Deletion: {{$chapter->name}}
@stop

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1 id = "heading">Delete Chapter {{$chapter->order}}: {{$chapter->name}}?</h1>
        <p>
        	<form method='POST' action='/books/{{$book->id}}/chapters/{{$chapter->id}}'>
	        {{ csrf_field() }}
		        <input type='hidden' name='id' value='{{$chapter->id}}'?>
		        <input name="_method" type="hidden" value="DELETE">
	            <input type='submit' value='Yes, delete it.' class="btn btn-primary btn-lg" role="button" id = "learn">
            	<a class="btn btn-primary btn-lg" href="/books/{{$book->id}}" role="button" id = "learn">No, go back.</a>
	        </form>
        </p>
    </div>
</div>

<hr>
@endsection