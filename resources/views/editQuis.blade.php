<form method="get" action="/save_quis">
    <input type="hidden" value="{{$quis->id}}" name="id">
    <input type="text" name="newName">
    <input type="submit">
</form>