<x-app-layout>
    <div class="min-h-screen">
        <h1 class="text-3xl mb-4">Shopping List</h1>

        <ul>
            @foreach($shoppingList->ingredients as $ingredient)
                <li>{{ $ingredient->name }}</li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
