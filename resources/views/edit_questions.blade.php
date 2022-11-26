<form method="get" action="/save_questions">
    <input type="hidden" value="{{$quest->id}}" name="id">
    <input type="text" name="editQuest" value="{{$quest->text}}"> Текст вопроса
    <input type="submit">
</form>
