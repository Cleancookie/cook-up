<x-app-layout>
    <h1 class="text-2xl inline-flex">{{ $recipe->name }}</h1>
    <ul class="flex flex-wrap inline-flex">
        @foreach($recipe->tags as $tag)
            <li class="text-sm bg-green-200 rounded-full px-2 mr-2">{{ $tag->name }}</li>
        @endforeach
    </ul>

    <p>{{ $recipe->description }}</p>

    <livewire:add-to-basket :recipe="$recipe" />

    <hr>

    <p class="text-lg">Ingredients:</p>
    <ul>
        @foreach($recipe->ingredients as $ingredient)
            <li>{{ $ingredient->name }}</li>
        @endforeach
    </ul>
</x-app-layout>
