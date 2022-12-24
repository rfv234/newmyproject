<head>
    <title>{{$item->seoTitle}}</title>
    <meta name="description" content="{{$item->seoDescription}}">
    <style>
        .object {
            margin: 20px;
            border: solid 2px;
            padding: 20px;
        }

        .name {
            text-align: center;
        }

        .text-block {
            line-height: 1.4;
        }

        .accordion__header::after {
            flex-shrink: 0;
            width: 1.25rem;
            height: 1.25rem;
            content: "";
        }

        .accordion__item_show .accordion__header::after {
            transform: rotate(-180deg);
        }
        .accordion__item {
            margin-bottom: 0.5rem;
            border-radius: 0.25rem;
            box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 15%);
        }

        .accordion__header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 1rem;
            color: #fff;
            font-weight: 500;
            background-color: #0d6efd;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.2s ease-out;
        }

        .accordion__header::after {
            flex-shrink: 0;
            width: 1.25rem;
            height: 1.25rem;
            margin-left: auto;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-size: 1.25rem;
            content: "";
        }

        .accordion__item_show .accordion__header::after {
            transform: rotate(-180deg);
        }

        .accordion__header:hover {
            background-color: #0b5ed7;
        }

        .accordion__item_hidden .accordion__header {
            border-bottom-right-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
        }

        .accordion__body {
            padding: 0.75rem 1rem;
            overflow: hidden;
            background: #fff;
            border-bottom-right-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
        }

        .accordion__item:not(.accordion__item_show) .accordion__header {
            border-bottom-right-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
        }

        .accordion__item:not(.accordion__item_show) .accordion__body {
            display: none;
        }
    </style>
</head>
<body>
<div class="object">
    <h1 class="name">{{$item->name}}</h1>
    <span class="text-block">{{strip_tags($item->description)}}</span><br>
    <p><h4>Категория товара</h4> {{$item->category}}</p><br>
    <p>
    <h4>Технические характеристики</h4>
    <span class="text-block">{{strip_tags($item->techs)}}</span>
    </p><br>
    <p>
        <div class="accordion" id="documents">
            <div class="accordion__item accordion__item_show">
                <div class="accordion__header">
                    <h4>Документы</h4>
                </div>
                <div class="accordion__body">
    @foreach(json_decode($item->documents) as $document)
        @foreach($document as $name => $link)
            <p>
                <a href="{{$link}}">{{$name}}</a>
            </p>
        @endforeach
    @endforeach
</div>
</div>
</div>
</p><br>
<h4>Сертификаты</h4>
@foreach(json_decode($item->certificates) as $certificate)
    @foreach($certificate as $name => $link)
        <p>
            <a href="{{$link}}">{{$name}}</a>
        </p>
    @endforeach
@endforeach
<p><h4>Гарантия</h4> {{$item->garanties}}</p><br>

</div>
</body>
<script>
    this._el.addEventListener('click', (e) => {
        // получим элемент .accordion__header
        const elHeader = e.target.closest('.accordion__header');
        // если такой элемент не найден, то прекращаем выполнение функции
        if (!elHeader) {
            return;
        }
        // если необходимо, чтобы всегда был открыт один элемент
        if (!this._config.alwaysOpen) {
            // получим элемент с классом accordion__item_show и сохраним его в переменную elOpenItem
            const elOpenItem = this._el.querySelector('.accordion__item_show');
            // если такой элемент есть
            if (elOpenItem) {
                // и он не равен текущему, то переключим ему класс accordion__item_show
                elOpenItem !== elHeader.parentElement ? elOpenItem.classList.toggle('accordion__item_show') : null;
            }
        }
        // переключим класс accordionitem_show элемента .accordionheader
        elHeader.parentElement.classList.toggle('accordion__item_show');
    });
    new ItcAccordion('#documents', {
        alwaysOpen: false
    });
</script>
