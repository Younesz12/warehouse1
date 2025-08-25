<x-app-layout>
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <h2 class="h5 card-title mb-4">New Purchase Order</h2>

                <form method="POST" action="{{ route('purchase-orders.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="raw-product-id" class="form-label">Raw Product</label>
                        <select name="raw_product_id" id="raw-product-id" class="form-select" required>
                            <option value="">Select Raw Material</option>
                            @foreach($rawProducts as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} ({{ $product->unit }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input name="quantity" type="number" step="0.001" min="1" class="form-control" id="quantity" required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary">
                            Create Purchase Order
                        </button>
                        <a href="{{ route('purchase-orders.index') }}" class="text-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>