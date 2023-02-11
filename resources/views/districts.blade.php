<ul>
    @foreach($countries as $country)
        <li>{{$country->name}}</li>
        <ul>
            @foreach($country->cities as $city)
                <li>{{$city->name}}</li>
                <ul>
                    @foreach($city->districts as $district)
                        <li>{{$district->name}}</li>
                    @endforeach
                </ul>
            @endforeach
        </ul>
    @endforeach
</ul>
