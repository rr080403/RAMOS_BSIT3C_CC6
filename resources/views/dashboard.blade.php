<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="mb-6">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <strong class="font-bold">{{ session('success') }}</strong>
                        </div>
                    @endif

                    @if (session('deleted'))
                        <div class="bg-red-100 border border-red-400 text-red-700 py-3 rounded relative mb-4">
                            <strong class="font-bold">{{ session('deleted') }}</strong>
                        </div>
                    @endif

                    <h3 class="text-lg font-medium mb-4">Add New Product</h3>
                    <form action="{{ route('product.store') }}" method="post">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-gray-700">Name</label>
                                <input type="text" id="name" name="name"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label for="category" class="block text-gray-700">Category</label>
                                <input type="text" id="category" name="category"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label for="price" class="block text-gray-700">Price</label>
                                <input type="number" id="price" name="price"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label for="quantity" class="block text-gray-700">Stock Quantity</label>
                                <input type="number" id="quantity" name="quantity"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label for="description" class="block text-gray-700">Description</label>
                                <textarea id="description" name="description" rows="5" cols="33"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                            </div>
                            <div>
                                <label for="manufacturer" class="block text-gray-700">Manufacturer</label>
                                <input type="text" id="manufacturer" name="manufacturer"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add
                                Product</button>
                        </div>
                    </form>
                </div>

                <div class="mt-8">
                    <h3 class="text-lg font-medium mb-4">Product List</h3>
                    <table class="min-m-full bg-white border" style="table-layout: fixed; width: 100%;">
                        <thead>
                            <tr>
                                <th class="py-2 border-b">#</th>
                                <th class="py-2 border-b">Product Name</th>
                                <th class="py-2 border-b">Category</th>
                                <th class="py-2 border-b">Price</th>
                                <th class="py-2 border-b">Stock Quantity</th>
                                <th class="py-2 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="product-table">
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td class="py-2 border-b px-4 text-center">{{ $key + 1 }}</td>
                                    <td class="py-2 border-b px-4 text-center">{{ $product->name }}</td>
                                    <td class="py-2 border-b px-4 text-center">{{ $product->category }}</td>
                                    <td class="py-2 border-b px-4 text-center">{{ $product->price }}</td>
                                    <td class="py-2 border-b px-4 text-center">{{ $product->quantity }}</td>
                                    <td class="py-2 border-b px-4 text-center">
                                        <a href="{{ route('product.edit', $product->id) }}"
                                            class="text-blue-500 hover:text-blue-700">Edit</a>
                                        <form method="POST" action="{{ route('product.destroy', $product->id) }}"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
