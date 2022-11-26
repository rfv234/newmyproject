<form method="get" action="/save_answers/{{$answers->id}}">
    <input type="hidden" value="{{$answers->id}}" name="id">
    <input type="text" name="editAnswers" value="{{$answers->text}}">
    <input type="submit">
</form>
