<a href="{{ route('baskets.index') }}">
    @if (!empty($basket))
        BasketWire ({{ $basket->recipes->count() }})
    @endif
</a>
