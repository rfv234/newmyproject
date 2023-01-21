<ul>
    @foreach($countries as $country)
        <li>
            {{$country->name}}
            <ul>
                @foreach($country->cities as $city)
                    <li style="color: {{$city->population>=$people ? 'green':'red'}}"
                        title="{{$city->population}}">{{$city->name}}</li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
<form action="/findCountries">
    <input type="number" value="{{$people}}" name="people">
    <input type="submit" value="Найти">
</form>