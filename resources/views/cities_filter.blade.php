<ul>
    @foreach($cities as $city)
        <li>{{$city->name}}({{$city->country->name}})</li>
    @endforeach
</ul>
<form action="/filter">
    <select name="country">
        <option value="0">Все</option>
        @foreach($allCountries as $country)
            <option value="{{$country->id}}" {{request()->country==$country->id ? 'selected':''}}>
                {{$country->name}}
            </option>
        @endforeach
    </select>
    <select name="sort">
        <option value="asc" {{request()->sort=='asc' ? 'selected':''}}>Abc</option>
        <option value="desc" {{request()->sort=='desc' ? 'selected':''}}>Cba</option>
    </select>
    <select name="sortType">
        <option value="id" {{request()->sortType=='id' ? 'selected':''}}>По id</option>
        <option value="name" {{request()->sortType=='name' ? 'selected':''}}>По названию</option>
        <option value="country_id" {{request()->sortType=='country_id' ? 'selected':''}}>По стране</option>
    </select>
    <input type="submit">
</form>