<x-app-layout>
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <h2 class="h5 card-title mb-4">Edit Raw Product</h2>
                
                <form method="POST" action="{{ route('raw-products.update', $rawProduct) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" type="text" value="{{ $rawProduct->name }}" class="form-control" id="name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="sku" class="form-label">SKU</label>
                        <input name="sku" type="text" value="{{ $rawProduct->sku }}" class="form-control" id="sku" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="unit" class="form-label">Unit</label>
                        <input name="unit" type="text" value="{{ $rawProduct->unit }}" class="form-control" id="unit" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="stock_quantity" class="form-label">Stock Quantity</label>
                        <input name="stock_quantity" type="number" step="0.001" min="0" value="{{ $rawProduct->stock_quantity }}" class="form-control" id="stock_quantity">
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary">
                            Update Raw Product
                        </button>
                        <a href="{{ route('raw-products.index') }}" class="text-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>