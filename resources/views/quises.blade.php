<ul>
    @foreach($quises as $quis)
        <ul>
            <li>
                {{$quis->name}}
                <ul>
                    <li>{{$quis->text}}</li>
                </ul>
            </li>
        </ul>
    @endforeach
</ul>

