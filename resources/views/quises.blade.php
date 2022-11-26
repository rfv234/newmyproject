<h1 style="margin-left: 50%">Тест</h1>
<ul>
    @foreach($quises as $quis)
        <ul>
            <li>
                <a href="/quis/{{$quis->id}}">{{$quis->name}}</a>
                <a href="/edit_quis/{{$quis->id}}">
                    <button style="position: absolute; left: 200px">Редактировать квиз</button>
                </a>
                <a href="/create_quest/{{$quis->id}}">
                    <button>
                        <h2>Создать вопрос</h2>
                    </button>
                </a>
                <ul>
                    @foreach($quis->questions as $question)
                        <li>
                            {{$question->text}} <a href="/edit_questions/{{$question->id}}">
                                <button style="position: absolute; left: 200px">Редактировать вопрос</button>
                            </a>
                            <ul>
                                @foreach($question->answers as $answer)
                                    <li>
                                        {{$answer->text}} <a href="/edit_answers/{{$answer->id}}">
                                            <button style="position: absolute; left: 200px">Редактировать ответ</button>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    @endforeach
    <a href="/create_quis">
        <button>
            <h3>Создать новый квиз</h3>
        </button>
    </a>
</ul>

