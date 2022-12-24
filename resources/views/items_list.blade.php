<head>
    <title>Товары Eltex</title>
    <style>
        .object {
            margin: 20px;
            border: solid 2px;
            padding: 20px;
        }

        .name {
            text-align: center;
        }
    </style>
</head>
<body>
@foreach($items as $item)
    <div class="object">
        <h3 class="name">
            <a href="/product_card/{{$item->id}}">{{$item->name}}</a>
        </h3>
        {{strip_tags($item->description)}}<br>
        <p><h4>Категория товара</h4> {{$item->category}}</p><br>
    </div>
@endforeach
</body>

