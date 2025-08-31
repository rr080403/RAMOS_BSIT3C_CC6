<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-light">
            {{ __("Edit Product") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-l font-medium mb-4">Edit Product</h3>
                <form method="POST" action="{{ route('product.update', $product->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-gray-700">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label for="category" class="block text-gray-700">Category</label>
                            <input type="text" id="category" name="category" value="{{ old('category', $product->category) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label for="price" class="block text-gray-700">Price</label>
                            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label for="quantity" class="block text-gray-700">Stock Quantity</label>
                            <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label for="description" class="block text-gray-700">Description</label>
                            <textarea id="description" name="description" rows="5" cols="33" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $product->description) }}</textarea>
                        </div>
                        <div>
                            <label for="manufacturer" class="block text-gray-700">Manufacturer</label>
                            <input type="text" id="manufacturer" name="manufacturer" value="{{ old('manufacturer', $product->manufacturer) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>