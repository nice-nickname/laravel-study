@extends('layout.main')

@section('content')
<div class="pic-and-rating">
    <img class="image-gallery-main" src="./content/{{ $book->preview1 }}">
    <div class="image-gallery">
        <div class="image-gallery__item">
            <img src="./content/{{ $book->preview1 }}" alt="Image-preview-1">
        </div>
        <div class="image-gallery__item">
            <img src="./content/{{ $book->preview2 }}" alt="Image-preview-2">
        </div>
        <div class="image-gallery__item">
            <img src="./content/{{ $book->preview3 }}" alt="Image-preview-3">
        </div>
    </div>
    <div class="rating">
        <span class="text-size-28">
            Читательский рейтинг&nbsp;
        </span>
        <div class="green-color item-rating">
            <span>
                {{ $book->rate }} %
            </span>
        </div>
    </div>
    </div>
    <div class="name-description">
        <span class="text-size-36">
            {{ $book->name }}
        </span>
        <span class="text-size-24">
            Автор: {{ $book->author->name }}
        </span>
        <span class="text-size-24 book-about">
            О книге
        </span>
        <span class="text-size-20">
            {{ $book->description }}
        </span>
        <div class="book-price-div">
            @if ($book->discount != 0)
                <span class="text-size-20">
                    Действует скидка!
                </span>
                <div class="book-price">
                    <span class="price-crossed text-size-36">
                        {{ $book->price }} ₽
                    </span>
                    <div class="green-color book-current-price">
                        <span class="text-size-36">
                            {{ $book->actual }} ₽
                        </span>
                    </div>
                </div>
            @else
                <div class="book-price">
                    <span class="text-size-36">
                        {{ $book->price }} ₽
                    </span>
                </div>
            @endif
        </div>
        <div class="book-buttons">
            <form action="{{ url('/basket') }}?id={{ $book->id }}" method="POST">
                @csrf
                <input type="hidden" name="redirect_url" value="{{ Request::url() }}?id={{$book->id}}">
                <div class="blue-button content-shadow basket-button">
                    @if ($isInBasket)
                        <span>Убрать из корзины</span>
                    @else
                        <span>Добавить в корзину</span>
                    @endif
                </div>
            </form>
            <form action="{{ url('/favorite') }}?id={{ $book->id }}" method="POST">
                @csrf
                <input type="hidden" name="redirect_url" value="{{ Request::url() }}?id={{$book->id}}">
                <div class="white-button content-shadow favorite-button">
                    @if ($isInFavorite)
                        <span>Удалить из избранного</span>
                    @else
                        <span>Отложить в избранное</span>
                    @endif
                </div>
            </form>
        </div>
        <div class="comments">
            <span class="text-size-28">
                Отзывы читателей
            </span>
           
            <form action="{{ route('post_comment') }}" method="POST">
                @csrf
                <input type="hidden" name="redirect_url" value="{{ Request::url() }}?id={{$book->id}}">
                <input type="hidden" name="recommend" value="0">
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <div class="comment-new content-shadow white-color">
                    <textarea class="content-shadow" name="text" placeholder="Ваше мнение"></textarea>
                    <div class="comment-new-footer">
                        <div class="user-rate">
                            <span>Вам можете порекомендовать эту книгу?</span>
                            <div class="white-button content-shadow say-yes">
                                <span>
                                    Да
                                </span>
                            </div>
                            <div class="white-button content-shadow say-no">
                                <span>
                                    Нет
                                </span>
                            </div>
                            @error('text')
                                <span class="danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="white-button content-shadow" id="button-submit-commentary">
                            <span>
                                Поделиться
                            </span>
                        </div>
                    </div>
                </div>
            </form>
            <div class="comments-list">
                @foreach ($book->comments as $c)
                    <div id="comment-0" class="comment white-color content-shadow">
                        <div class="comment-header">
                            <div class="content-shadow white-color">
                                @if ($c->recommend == 1)
                                    <img src="./img/icons/thumb-up-outline.svg">
                                    <span>
                                        Рекомендую
                                    </span>
                                @else
                                    <img src="./img/icons/thumb-down-outline.svg">
                                    <span>
                                        Не рекомендую
                                    </span>
                                @endif
                            </div>
                            <div class="content-shadow white-color">
                                <span>
                                    Читатель: {{ $c->user->name }}
                                </span>
                            </div>
                        </div>
                        <span class="comment-text">
                            {{ $c->comment }}
                        </span>
                        <div class="comment-footer">
                            <span>
                                Отзыв был полезен?
                            </span>
                            <div class="white-button content-shadow">
                                <span>
                                    Да
                                </span> 
                            </div>
                            <div class="white-button content-shadow">
                                <span>
                                    Нет
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
<script>
    gallery()
    $('.say-yes').click(ev => {
        $('[name=recommend]').val('1')
        $('.say-no').removeClass('white-button-active')
        $('.say-yes').addClass('white-button-active')
    })

    $('.say-no').click(ev => {
        $('[name=recommend]').val('0')
        $('.say-yes').removeClass('white-button-active')
        $('.say-no').addClass('white-button-active')
    })

    $('#button-submit-commentary').click(ev => {
        $('form').submit()
    })

    $('.favorite-button').click(ev => {
        $('.favorite-button').closest('form').submit()
    })

    $('.basket-button').click(ev => {
        $('.basket-button').closest('form').submit()
    })

</script>
@endsection