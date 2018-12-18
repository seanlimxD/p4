@extends('layouts.master')

@section('title')
Confirm Deletion: {{$book->title}}
@stop

@section('content')

<h1>Confirm deletion</h1>
<form method='POST' action='/books/{{$book->id}}'>

        {{ csrf_field() }}

        <input type='hidden' name='id' value='{{$book->id}}'?>
        <input name="_method" type="hidden" value="DELETE">

        <h2>Are you sure you want to delete <em>{{ $book->title }}</em>?</h2>

        <input type='submit' value='Yes, delete this book.' class='btn btn-danger'>

</form>
<hr>
@endsection