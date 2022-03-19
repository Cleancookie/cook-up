<x-app-layout>
    <div class="min-h-screen">
        <h1 class="text-3xl mb-4">Shopping List</h1>

        <ul class="list-disc">
            @foreach($basket?->recipes ?? [] as $recipe)
            <li>
                {{ $recipe->name }}:
                <ul class="list-decimal ml-8">
                    @foreach($recipe->ingredients as $ingredient)
                        <li>{{ $ingredient->name }}</li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
