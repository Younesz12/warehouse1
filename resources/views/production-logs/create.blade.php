<x-app-layout>
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <h2 class="h5 card-title mb-4">New Production Log</h2>

                <form method="POST" action="{{ route('production-logs.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="finished_product_id" class="form-label">Finished Product</label>
                        <select name="finished_product_id" id="finished_product_id" class="form-select" required>
                            <option value="">Select Product</option>
                            @foreach($finishedProducts as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity_produced" class="form-label">Quantity to Produce</label>
                        <input name="quantity_produced" type="number" step="0.001" class="form-control" id="quantity_produced" required>
                    </div>

                    <h3 class="h6 mt-4 mb-3">Raw Materials Used</h3>
                    @foreach($rawProducts as $raw)
                        <div class="mb-3">
                            <label class="form-label text-muted">{{ $raw->name }} (Available: {{ $raw->stock_quantity }} {{ $raw->unit }})</label>
                            <input name="raw_products[{{ $raw->id }}]" type="number" step="0.001" min="0" class="form-control" placeholder="Quantity used">
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <button type="submit" class="btn btn-primary">
                            Create Production Log
                        </button>
                        <a href="{{ route('production-logs.index') }}" class="text-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>