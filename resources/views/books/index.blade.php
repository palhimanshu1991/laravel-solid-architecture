@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h3>
            Popular Books
            <small>(30 new books this week)</small>
        </h3>
    </div>
    <div class="row">
        @include('books.partials.books_thumbnail_list',['books' => $books])
    </div>    
</div>
@endsection
