<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-bold mb-4">New Production</h2>

                    <form method="POST" action="{{ route('production-logs.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Finished Product</label>
                            <select name="finished_product_id" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                                <option value="">Select Product</option>
                                @foreach($finishedProducts as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Quantity to Produce</label>
                            <input name="quantity_produced" type="number" step="0.001" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>

                        <h3 class="text-lg font-bold mb-3">Raw Materials Used</h3>
                        @foreach($rawProducts as $raw)
                        <div class="mb-3">
                            <label class="block text-gray-600 text-sm mb-1">{{ $raw->name }} (Available: {{ $raw->stock_quantity }} {{ $raw->unit }})</label>
                            <input name="raw_products[{{ $raw->id }}]" type="number" step="0.001" min="0" 
                                   class="shadow border rounded w-full py-2 px-3 text-gray-700" 
                                   placeholder="Quantity used">
                        </div>
                        @endforeach
                        
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Production Log
                            </button>
                            <a href="{{ route('production-logs.index') }}" class="text-gray-600 hover:underline">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>