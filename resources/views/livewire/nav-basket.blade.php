<div>
    @if (!empty($basket))
        Basket ({{ $basket->recipes->count() }})
    @else
        Your basket is empty
    @endif
</div>
