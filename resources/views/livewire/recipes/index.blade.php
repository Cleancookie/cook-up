<div>
    @foreach($recipes as $recipe)
        <h2 class="text-xl inline-flex">{{ $recipe->name }}</h2> <span class="text-sm text-gray-400"> #{{ $recipe->id }}</span>
        <p>{{ $recipe->description }}</p>
    @endforeach
</div>
