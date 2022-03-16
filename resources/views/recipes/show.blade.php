<x-app-layout>
    <h1 class="text-2xl">{{ $recipe->name }}</h1>
    <p>{{ $recipe->description }}</p>
    <p>Tags:</p>
    <ul>
        @foreach($recipe->tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ul>

    <p>Ingredients:</p>
    <ul>
        @foreach($recipe->ingredients as $ingredient)
            <li>{{ $ingredient->name }}</li>
        @endforeach
    </ul>
</x-app-layout>
