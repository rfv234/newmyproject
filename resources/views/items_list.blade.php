<style>
    #object {
        margin: 20px;
        border: solid 2px;
    }

    #name {
        text-align: center;
    }
</style>
@foreach($items as $item)
    <div id="object">
        <h3 id="name">{{$item->name}}</h3>
        <span>{{$item->description}}</span><br>
        <p>{{$item->category}}</p><br>
        <p>{{$item->seoTitle}}</p><br>
        <p>{{$item->seoDescription}}</p><br>
        <p>{{$item->techs}}</p><br>
        <p>{{$item->documents}}</p>
        <hr>
        <p>{{$item->certificates}}</p><br>
        <p>{{$item->garanties}}</p><br>
    </div>
@endforeach
