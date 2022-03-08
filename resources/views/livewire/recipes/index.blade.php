<div>
    <h1 class="text-2xl">{{ __('app.recipes') }}</h1>
    <div wire:loading.class="opacity-0" wire:loading.class.remove="opacity-100" class="transition-all">
        @foreach($recipes as $recipe)
            <h2 class="text-xl inline-flex">{{ $recipe->name }}</h2> <span class="text-sm text-gray-400"> #{{ $recipe->id }}</span>
            <p>{{ $recipe->description }}</p>
        @endforeach
    </div>
    {{ $recipes->links() }}
</div>
