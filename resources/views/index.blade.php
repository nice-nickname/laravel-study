
@extends('layout.main')

@section('content')
<form id="item_form" action="{{ route("books") }}">
    @csrf
    <input type="hidden" name="current_page" value="0">
    <div class="div-sort-filter content-shadow">
        <div class="sort">
            <span class="text-size-28">
                Сортировка
            </span>
            <select name="order_type" class="content-shadow">
                <option value="price">по цене</option>
                <option value="page_amount">по количеству страниц</option>
                <option value="name">по алфавиту</option>
            </select>
            <select name="order_by" class="content-shadow">
                <option value="asc">по возрастанию</option>
                <option value="desc">по убыванию</option>
            </select>
        </div>
        <div name="categories" class="categories">
            <span class="text-size-28">
                Категории
            </span>
            @foreach ($categories as $c)
                <div>
                    <input type="checkbox" class="content-shadow" name="categories[]" value="{{ $c->id }}">
                    <span class="tooltip-target valign-super">
                        {{ $c->category }}
                        <div class="tooltip">{{ $c->description }}</div>
                    </span>
                </div>    
            @endforeach
        </div>
        <div class="authors">
            <span class="text-size-28">
                Автор
            </span>
            @foreach ($authors as $a)
                <div>
                    <input type="checkbox" class="content-shadow" name="authors[]" value="{{ $a->id }}">
                    <span class="valign-super">
                        {{ $a->name_short }}
                    </span>
                </div>    
            @endforeach
        </div>
        <div class="categories">
            <div class="switch-group">
                <span class="text-size-20">Высокий рейтинг</span>
                <label class="switch">
                    <input type="checkbox" name="with_high_rating" value="true">
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="switch-group">
                <span class="text-size-20">Со скидкой</span>
                <label class="switch">
                    <input type="checkbox" name="with_discount" value="true">
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="switch-group">
                <span class="text-size-20">С отзывами</span>
                <label class="switch">
                    <input type="checkbox" name="with_comments" value="true">
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="switch-group">
                <div name="apply-button" class="blue-button" style="width: 130px">
                    <span>Применить</span>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="items-alt main-container">
    <div class="page-list white-color content-shadow">
        <div name="prev-page" class="white-button left-border-radius-medium-gt">
            <img src="./img/icons/chevron-left.svg">
        </div>
        <div class="current-page">
            <span>
                1
            </span>
        </div>
        <div name="next-page" class="white-button right-border-radius-medium-gt">
            <img src="./img/icons/chevron-right.svg">
        </div>
    </div>

    <div id="placer" class="items ">
        
    </div>
    
    <div class="page-list white-color content-shadow">
        <div name="prev-page" class="white-button left-border-radius-medium-gt">
            <img src="./img/icons/chevron-left.svg">
        </div>
        <div class="current-page">
            <span>
                1
            </span>
        </div>
        <div name="next-page" class="white-button right-border-radius-medium-gt">
            <img src="./img/icons/chevron-right.svg">
        </div>
    </div>
</div>

<script>
    
    let reloadPage = true

    $('[name=apply-button]').click(function(ev) {
        $(this).closest('form').submit()
    })

    $('[name="next-page"]').click(ev => {
        let v = $('[name=current_page]').val()
        v++;
        $('[name=current_page]').val(v)
        $('.current-page > span').html(v + 1)
        reloadPage = false;
        $('#item_form').submit()
    })

    $('[name="prev-page"]').click(ev => {
        let v = $('[name=current_page]').val()
        if (v != 0) {
            v--;
            $('[name=current_page]').val(v)
            $('.current-page > span').html(v + 1)
            reloadPage = false;
            $('#item_form').submit()
        }
    })

    $("#item_form").submit(function(e) {
        e.preventDefault();

        let form = $(this);
        let actionUrl = form.attr('action');

        if (reloadPage) {
            $('[name=current_page]').val(0)
            $('.current-page > span').html(1)
        }
        reloadPage = true

        $.ajax({
            type: "GET",
            url: actionUrl,
            data: form.serialize(),
            success: function(data) {
                document.getElementById('placer').innerHTML = data
                $('[name=to-cart]').click(function(ev) {
                    let form = $(this).find('form');
                    $.ajax({
                        url: form.attr('action'),
                        type: 'POST',
                        data: form.serialize(),
                        success: function(data) {
                            alert('Добавлено')
                        } 
                    })
                })
                $('[name=to-favorite]').click(function(ev) {
                    let form = $(this).find('form');
                    $.ajax({
                        url: form.attr('action'),
                        type: 'POST',
                        data: form.serialize(),
                        success: function(data) {
                            alert('Добавлено')
                        } 
                    })
                })
                preview()
            }
        });
    });

    $('#item_form').submit()

</script>

@endsection