<form method="get" action="/save">
<ul>
    @foreach($quis->questions as $question)
        <li>
            {{$question->text}}
            <ul>
                @foreach($question->answers as $answer)
                    <p>
                        <input type="radio" value="{{$answer->text}}" required name="id_ans[{{$question->id}}]">{{$answer->text}}
                    </p>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
    <input type="submit">
</form>