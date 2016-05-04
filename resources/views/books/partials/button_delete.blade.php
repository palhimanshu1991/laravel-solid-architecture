<form method="POST" action="books/{{$book->id}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" class="btn btn-primary" role="button" value="Delete">
</form>