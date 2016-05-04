@foreach($books as $book)
<div class="col-sm-6 col-md-3">
    <div class="thumbnail">
        <img src="https://d.gr-assets.com/books/1349067748l/9680328.jpg" alt="...">
        <div class="caption">
            <h3>{{$book->title}}</h3>
            <p>
                <a href="{{url('books/'.$book->id.'/edit')}}" class="btn btn-primary" role="button">Edit</a>

                @include('books.partials.button_delete')
            </p>
        </div>
    </div>
</div>
@endforeach