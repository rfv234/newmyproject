<ul>
    @foreach($kinds as $kind)
        <li>
            {{$kind->name}}
            <ul>
                @foreach($kind->animals as $animal)
                    <li>{{$animal->name}}</li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
