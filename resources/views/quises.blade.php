<ul>
    @foreach($quises as $quis)
        <ul>
            <li>
                <a href="/quis/{{$quis->id}}">{{$quis->name}}</a>
                <a href="/edit_quis/{{$quis->id}}">
                    <button>Редактировать</button>
                </a>
                <ul>
                    @foreach($quis->questions as $question)
                        <li>
                            {{$question->text}}
                            <ul>
                                @foreach($question->answers as $answer)
                                    <li>
                                        {{$answer->text}}
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    @endforeach
</ul>

