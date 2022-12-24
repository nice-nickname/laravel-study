@extends('layout.main')

@section('content')
    <div class="user-about">
        <div class="user-name">
            <span class="text-size-36">
                {{ Auth::user()->name }}
            </span>
        </div>
        <div class="user-inf">
            <div>
                <img src="./img/user-picture.png" class="user-picture">
            </div>
            <div class="user-inf-grid">
                <div class="user-information user-information-reverse white-color content-shadow">
                    <div id="user-email">
                        <span class="span-label">
                            Электронная почта
                        </span>
                        <br>
                        <span class="span-label-data">
                            {{ Auth::user()->email }}
                            <img class="svg-primary" src="./img/icons/check-decagram.svg">
                        </span>
                    </div>
                    <div id="user-phone">
                        <span class="span-label">
                            Аккаунт создан
                        </span>
                        <br>
                        <span class="span-label-data">
                            {{ Auth::user()->created_at }}
                        </span>
                    </div>
                </div>
                <div class="user-orders white-color content-shadow">
                    <span class="span-label-data">
                        Ваши заказы
                    </span>
                    <div class="user-orders-list">
                        @if (count($basket) == 0)
                            <span>Вы не добавили книги в заказ</span>
                        @endif
                        @foreach ($basket as $b)
                            <div class="user-order white-color content-shadow">
                                <div class="order-information">
                                    <span class="span-label-data">
                                        {{ $b->book->name }}
                                    </span>
                                    <span class="span-label-data order-delivery-date">
                                        {{ $b->book->author->name_short }}
                                    </span>
                                </div>
                                <div class="content-shadow green-color delivery-status">
                                    <span>
                                        {{ $b->book->actual }} ₽
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="user-favorite white-color content-shadow">
                    <span class="span-label-data">
                        Избранное
                    </span>
                    <div class="user-orders-list">
                        @if (count($favorites) == 0)
                            <span>Вы не добавили книги в избранное</span>
                        @endif
                        @foreach ($favorites as $f)
                            <div class="user-order white-color content-shadow">
                                <div class="order-information">
                                    <span class="span-label-data">
                                        {{ $f->book->name }}
                                    </span>
                                    <span class="span-label-data order-delivery-date">
                                        {{ $f->book->author->name_short }}
                                    </span>
                                </div>
                                <div class="content-shadow green-color delivery-status">
                                    <span>
                                        {{ $f->book->actual }} ₽
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="user-payment white-color content-shadow">
                    <span class="span-label-data">
                        Привязанные способы оплаты
                    </span>
                    <div class="user-payment-list">
                        <div id="user-payment-0" class="user-payment-container content-shadow white-color">
                            <div class="card">
                                <span class="span-label-data">
                                    <img src="./img/icons/credit-card-outline.svg">
                                    Сбербанк
                                </span>
                            </div>
                            <div class="card-about">
                                <span class="span-label-data">
                                    Заканчивается<br>на 0000
                                </span>
                            </div>
                        </div>
                        <div id="user-payment-1" class="user-payment-container content-shadow white-color">
                            <div class="card">
                                <span class="span-label-data">
                                    <img src="./img/icons/credit-card-outline.svg">
                                    Сбербанк
                                </span>
                            </div>
                            <div class="card-about">
                                <span class="span-label-data">
                                    Заканчивается<br>на 9999
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection