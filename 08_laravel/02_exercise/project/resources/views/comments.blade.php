
<!DOCTYPE html>
<html>
<body>

@foreach ($data as $d)
    <a class="comments" href="{{ url('/comments/' . $d->id) }}">{{$d->title}}</a>
@endforeach
</body>
</html>

