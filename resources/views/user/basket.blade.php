@extends('layout.main')

@section('content-class')
    cart-page-content
@endsection

@section('content')
<span class="text-size-36">
    Ваша корзина
</span>
<div class="cart-area">
    <div class="cart-list" style="width: 70%;">
        @if (count($items) == 0)
            <span>Корзина пуста</span>
        @endif
        @foreach ($items as $i)
            <div class="item-card content-shadow white-color">
                <a href="{{ route('book') }}?id={{ $i->book->id }}">
                    <img src="./img/book.png">
                </a>
                <span class="text-size-20">
                    {{ $i->book->name }}
                </span>
                <span>
                    {{ $i->book->author->name_short }}
                </span>
                <div class="rating-and-price">
                    <div class="rating-div">
                        <div name="rating" class="rating green-color">
                            <span>
                                {{ $i->book->rate }} %
                            </span>
                        </div>
                    </div>
                    <div class="price-div">
                        <div name="price" class="price green-color">
                            <span>
                                {{ $i->book->actual }} ₽
                            </span>
                        </div>
                    </div>
                </div>
                <div class="red-button slide-menu-toggle">
                    <span class="text-size-20">
                        Выбрать действие
                    </span>
                    <div class="slide-menu hidden">
                        <div name="mark-basket" class="slide-menu__button slide-menu__button-reject">
                            <form action="{{ url('/basket') }}?id={{ $i->book->id }}" method="POST">
                                @csrf
                                <input type="hidden" name="redirect_url" value="{{ route('bucket') }}">

                            </form>
                            <span>Отказаться</span>
                        </div>
                        <div name="mark-favorite" class="slide-menu__button slide-menu__button-favorite">
                            <form action="{{ url('/favorite') }}?id={{ $i->book->id }}" method="POST">
                                @csrf
                                <input type="hidden" name="redirect_url" value="{{ route('bucket') }}">
                                <input type="hidden" name="delete" value="true">
                            </form>
                            <span>Отложить в избранное</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div id="total" class="cart-total content-shadow white-color">
        <span class="text-size-20">
            Все товары
        </span>
        <div class="total-list">
            @foreach ($items as $i)
                <div class="total-item white-color content-shadow">
                    <div class="total-item-desc">
                        <span class="text-size-20">
                            {{ $i->book->name }}
                        </span>
                        <span>
                            {{ $i->book->name_short }}
                        </span>
                    </div>
                    <div class="green-color content-shadow total-item-price">
                        <span class="text-size-36">
                            {{ $i->book->actual }} ₽
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
        <span class="span-total text-size-36">
            {{ $total }} ₽
        </span>
    </div>
</div>
<div class="cart-submit green-button" onclick="toggleModal()">
    <span>
        Оплатить
    </span>
</div>
<div class="modal-container hidden">
    <div class="modal">
        <div class="payment">
            <span class="text-size-20 modal-title">
                Способы оплаты
            </span>
            <div>
                <input type="radio" class="content-shadow radio-active" name="payment-method">
                <span>
                    Mastercard оконч. на **** 9999
                </span>
            </div>
            <div>
                <input type="radio" class="content-shadow radio-active" name="payment-method">
                <span>
                    Visa оконч. на **** 1111
                </span>
            </div>
            <div>
                <input type="radio" class="content-shadow radio-active" name="payment-method">
                <span>
                    Оплата при получении
                </span>
            </div>
        </div>
        <div class="white-button content-shadow" id="button-submit" onclick="toggleModal()">
            <span>
                Подтвердить
            </span>
        </div>
    </div>
</div>
<script>
    slideMenu()

    $('[name=mark-favorite]').click(ev => {
        $('[name=mark-favorite]').find('form').submit()
    })

    $('[name=mark-basket]').click(ev => {
        $('[name=mark-basket]').find('form').submit()
    })

</script>
@endsection