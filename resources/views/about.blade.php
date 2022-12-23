@extends('layout.main')

@section('content')
<div class="page-content-about">
    <div class="about">

        <div class="image-slider-buttons"></div>
        <div class="image-slider">
            <div class="image-slider__item">
                <img src="{{ asset("img/city-1.png") }}" alt="Театр Чехова">
            </div>
            <div class="image-slider__item">
                <img src="{{ asset("img/city-2.png") }}" alt="Библиотека Чехова">
            </div>
            <div class="image-slider__item">
                <img src="{{ asset("img/city-3.png") }}" alt="Дворец Алфераки">
            </div>
        </div>

        <span class="text-size-36 center">
            О нас
        </span>
        
        <div class="about-href-header">
            <span>Краткое содержание</span>
            <ul class="about-ul">
                <li><a href="#part1"><span>1. О родном городе</span></a></li>
                <li><a href="#part2"><span>2. Создание магазина</span></a></li>
                <li><a href="#part3"><span>3. Наши дни</span></a></li>
            </ul>
        </div>

        <div>
            <div id="part1">
                <h1 class="text-size-32">О родном городе</h1>
                <span class="text-size-20">
                    Магазин берет свое начало из далекого Таганрога. Для юных и не столь таковых читателей стоит пояснить - здания в классическом, выдержанном стиле русского классицизма, широкие улицы и обилие зелени. Добрые люди с доброй душой, обилие кофеен, уютные улочки - малый Питер! 
                    Культура чтения тут, конечно же, развита - посмотрите только на библиотеку чехова, невозоможно не приобщиться к чтению, лицезрея сие с самого детства.
                </span>
                <br>
                
            </div>
            <div id="part2">
                <h1 class="text-size-32">Создание магазина</h1>
                <span class="text-size-20">
                    Первый магазин был открыт по адресу ул. Петровская 91, тогда это была маленькая книжная лавка. В октябре 2001 года был открыт второй магазин на пер. Красном 21.
                    Магазин приобрел свою популярность с помощью большого ассортимента иностранной литературы, которая не так популярна, как Русская Проза.   
                </span>
                <br>
            </div>
            <div id="part3">
                <h1 class="text-size-32">Наши дни</h1>
                <span class="text-size-20">
                    В наши дни филиалы магазина открыты почти во всех городах Необъятной. Более 1000 магазинов по всей России работают для вас на протяжении более 20-ти лет!
                    В магазинах нашей сети представлена самая большая в России коллекция отечственной прозы, а так же произоведений иностранных классиков, таких как Набоков, Филипп К. Дик, 
                    Гомер, Герадот, Кант, Луи-Фердиан Селин, Зеленский и другие.
                </span>
                <br>
            </div>
        </div>
        <div class="about-video">
            <video controls width="1280" height="720">
                <source src="{{ asset("video/taganrog.mp4") }}" type="video/mp4">
            </video>
        </div>
    </div>
</div>

<script>
    slider()
</script>

@endsection