<div>
    <div wire:loading.class="opacity-0" wire:loading.class.remove="opacity-100" class="transition-all grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3">
        @foreach($recipes as $recipe)
            <a href="{{ route('recipes.show', $recipe) }}" class="hover:shadow-md transition">
                <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                    <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="w-full h-full object-center object-cover group-hover:opacity-75">
                </div>
                <div class="bg-white rounded-b p-4">
                    <h2 class="text-xl text-gray-700 inline-flex">{{ $recipe->name }}</h2> <span class="text-sm text-gray-300"> #{{ $recipe->id }}</span>
                    <ul class="flex flex-wrap">
                        <li class="text-sm bg-green-200 rounded-full px-2 mr-2">Some tag 🥕</li>
                        <li class="text-sm bg-green-200 rounded-full px-2 mr-2">Another tag 🍰</li>
                    </ul>
                </div>
            </a>
        @endforeach
    </div>

    <div class="my-4">
        {{ $recipes->links() }}
    </div>
</div>
