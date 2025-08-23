<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold">Finished Products</h2>
                        @can('admin')
                            <a href="{{ route('finished-products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add Product
                            </a>
                        @endcan
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">SKU</th>
                                    <th class="px-4 py-2">Unit</th>
                                    <th class="px-4 py-2">Stock</th>
                                    @can('admin')<th class="px-4 py-2">Actions</th>@endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($finishedProducts as $product)
                                <tr>
                                    <td class="border px-4 py-2">{{ $product->id }}</td>
                                    <td class="border px-4 py-2">{{ $product->name }}</td>
                                    <td class="border px-4 py-2">{{ $product->sku }}</td>
                                    <td class="border px-4 py-2">{{ $product->unit }}</td>
                                    <td class="border px-4 py-2">{{ $product->stock_quantity }}</td>
                                    @can('admin')
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('finished-products.edit', $product) }}" class="text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('finished-products.destroy', $product) }}" method="POST" class="inline ml-2">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Delete?')">Delete</button>
                                        </form>
                                    </td>
                                    @endcan
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>