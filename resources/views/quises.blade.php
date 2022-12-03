<style>
    .edit {
        position: absolute;
        left: 350px;
        width: 200px;
    }

    .create {
        background-color: gold;
        height: 25px;
        width: 150px;
    }

    .newThigs{
        left: 600px;
        position: absolute;
    }

    .margin {
        margin-top: 25px;
    }
</style>
<h1 style="margin-left: 50%">Тест</h1>
<ul>
    @foreach($quises as $quis)
        <ul>
            <li class="margin">
                <a href="/quis/{{$quis->id}}">{{$quis->name}}</a>
                <a href="/edit_quis/{{$quis->id}}">
                    <button class="edit" style="background-color: aqua">
                        Редактировать квиз
                    </button>
                </a>
                <a href="/create_quest/{{$quis->id}}">
                    <button class="create newThigs">
                        Создать вопрос
                    </button>
                </a>
                <ul>
                    @foreach($quis->questions as $question)
                        <li class="margin">
                            {{$question->text}} <a href="/edit_questions/{{$question->id}}">
                                <button class="edit" style="background-color: lightgreen">
                                    Редактировать вопрос
                                </button>
                            </a>
                            <a href="/create_answer/{{$question->id}}">
                                <button class="create newThigs">
                                    Создать ответ
                                </button>
                            </a>
                            <ul>
                                @foreach($question->answers as $answer)
                                    <li class="margin">
                                        {{$answer->text}} <a href="/edit_answers/{{$answer->id}}">
                                            <button class="edit" style="background-color: darksalmon">
                                                Редактировать ответ
                                            </button>
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
        <button class="create margin">
            Создать новый квиз
        </button>
    </a>
</ul>

