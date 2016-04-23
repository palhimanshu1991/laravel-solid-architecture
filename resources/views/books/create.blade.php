@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form class="col-md-4" action="{{url('books')}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <!--display form errors-->
            @include('commons.errors_request')            
            
            <div class="form-group">
                <label for="title">Book Title</label>
                <input required="yes" type="text" class="form-control" id="title" name="title" placeholder="Title of the book">
            </div>
            <div class="form-group">
                <label for="author">Select Author</label>
                <select required="yes" class="form-control" id="author_id" name="author_id">
                    <option value="0">Select</option>
                    <option value="1">Himanhsu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Book Cover</label>
                <input required="yes" type="file" id="cover_url" name="cover_url">
                <p class="help-block">Choose an image for book cover</p>
            </div>
            <button type="submit" class="btn btn-success">Create New Book</button>
        </form>       
    </div>
</div>
@endsection
