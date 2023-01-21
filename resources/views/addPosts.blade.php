<form action="/savePosts" method="get">
    <input type="text" name="addPosts">
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <input type="submit" value="Сохранить">
</form>
