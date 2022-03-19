@if (!empty($basket?->recipes))
    <ul class="list-disc">
        @foreach($basket->recipes ?? [] as $recipe)
            <li>
                {{ $recipe->name }}
                <span
                    wire:click="removeFromBasket({{ $recipe->pivot->id }})"
                    class="cursor-pointer rounded bg-red-300 text-sm px-2"
                >
                    Remove
                </span>
                <ul class="list-decimal ml-8">
                    @foreach($recipe->ingredients as $ingredient)
                        <li>{{ $ingredient->name }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@else
    <p>Your basket is empty!</p>
@endif
