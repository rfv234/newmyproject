<ul>
    @foreach($lessons as $lesson)
        <li>{{$lesson->name}}</li>
    @endforeach
</ul>