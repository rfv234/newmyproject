@foreach($days as $numberOfDay=>$day)
    <h3>{{$day}}</h3>
    <ul>
        @foreach($lessons->where('day', $numberOfDay) as $lesson)
            <li>{{$lesson->name}}</li>
        @endforeach
    </ul>
@endforeach