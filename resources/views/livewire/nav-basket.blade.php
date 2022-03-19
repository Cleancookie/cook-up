<a href="{{ route('baskets.index') }}">
    @if (!empty($basket))
        Basket ({{ $basket->recipes->count() }})
    @endif
</a>
