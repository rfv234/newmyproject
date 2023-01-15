<form action="/find">
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <button id="findButton">Найти</button>
</form>
<table>
    <tr>
        <td>id</td>
        <td>title</td>
    </tr>
    @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
        </tr>
    @endforeach
</table>