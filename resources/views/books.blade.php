@foreach ($books as $b)
    <div class="white-color item-card content-shadow">
        <a href="{{ route('book') }}?id={{ $b->id }}">
            <img src="./content/{{ $b->preview1 }}">
        </a>
        <span class="text-size-20">
            <a class="a-disable-highlight" href="{{ route('book') }}?id={{ $b->id }}">
                {{ $b->name }}
            </a>
        </span>
        <span class="hover-preview cursor-default" data-image="./content/{{ $b->author->image }}" data-name="{{ $b->author->name }}" data-start="{{ $b->author->year_born }}" data-end="{{ $b->author->year_died }}">
            {{ $b->author->name }}
        </span>
        <div class="rating-and-price">
            <div class="rating-div">
                <div name="rating" class="rating green-color">
                    <span class="cursor-default">
                        {{ $b->rate }}%
                    </span>
                </div>
            </div>
            <div class="price-div">
                @if ($b->discount == 0)
                    <div name="price" class="price green-color">
                        <span class="cursor-default">
                            {{ $b->price }} ₽
                        </span>
                    </div>
                @else
                    <div name="price" class="price green-color">
                        <span class="cursor-default">
                            {{ $b->actual }} ₽
                        </span>
                    </div>
                    <div name="old-price" class="price-crossed">
                        <span class="cursor-default">
                            {{ $b->price }} ₽
                        </span>
                    </div>
                @endif
            </div>
        </div>
        <div class="tags">
            @foreach ($b->categories as $c)
                <div class="item-tag">
                    <span class="cursor-default">
                        {{ $c->category }}
                    </span>
                </div>
            @endforeach
        </div>
        <div class="content-shadow white-color item-buttons">
            <div name="to-cart" class="blue-button left-border-radius-medium">
                <form action="{{ url('/basket') }}?id={{ $b->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="redirect_url" value="{{ route('home') }}">
                </form>
                <span>
                    В корзину
                </span>
            </div>
            <div name="to-favorite" class="white-button right-border-radius-medium">
                <form action="{{ url('/favorite') }}?id={{ $b->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="redirect_url" value="{{ route('home') }}">
                </form>
                <span>
                    В избранное
                </span>
            </div>
        </div>
    </div>
@endforeach
