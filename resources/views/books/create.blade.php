@extends('layouts.master')

@section('title')
        Create new Book
@stop

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1 id = "heading">Submit New Book</h1>
    </div>
</div>

<div class="container">
    <!-- Column of book summaries -->
    <div class="row">
        <div class="col-md-12">
            @include('errors')
            <div class = "col-md-6">
                <form method='POST' action='/books'>
                        <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                        <div class = 'form-group'>
                                <label for='title'>Title*</label>
                                <input type='text' name='title' class = 'form-control'>
                        </div>
                        <div class='form-group'>
                                    <label for='cover_url'>Cover image link</label>
                                    <input type='text' name='cover_url' class = 'form-control'>
                        </div>
                        <div class='form-group'>
                                    <label for='synopsis'>Synopsis*</label>
                                    <textarea class="form-control" rows="5" name='synopsis'></textarea>
                        </div>
                        <input type='submit' value='Submit'>
                </form>
            </div>        
        </div>
    </div>
</div>
<hr>
@stop