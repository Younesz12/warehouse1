<x-app-layout>
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <h2 class="h5 card-title mb-4">Add Finished Product</h2>
                
                <form method="POST" action="{{ route('finished-products.store') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="sku" class="form-label">SKU</label>
                        <input name="sku" type="text" class="form-control" id="sku" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="unit" class="form-label">Unit</label>
                        <input name="unit" type="text" class="form-control" id="unit" placeholder="e.g., pcs, units" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="stock_quantity" class="form-label">Initial Stock (Optional)</label>
                        <input name="stock_quantity" type="number" step="0.001" min="0" class="form-control" id="stock_quantity" value="0">
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary">
                            Save Finished Product
                        </button>
                        <a href="{{ route('finished-products.index') }}" class="text-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>