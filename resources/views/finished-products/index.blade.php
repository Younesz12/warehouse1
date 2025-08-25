<x-app-layout>
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 card-title">Finished Products</h2>
                    @can('admin')
                        <a href="{{ route('finished-products.create') }}" class="btn btn-primary">
                            Add Product
                        </a>
                    @endcan
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Unit</th>
                                <th>Stock</th>
                                @can('admin')
                                    <th class="text-end">Actions</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($finishedProducts as $product)
                                <tr id="product-{{ $product->id }}">
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->unit }}</td>
                                    <td data-stock="{{ $product->stock_quantity }}">{{ $product->stock_quantity }}</td>
                                    @can('admin')
                                        <td class="text-end">
                                            <button type="button" class="btn btn-sm btn-success me-2" data-bs-toggle="modal" data-bs-target="#sellModal" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-stock="{{ $product->stock_quantity }}">
                                                Sell
                                            </button>
                                            <a href="{{ route('finished-products.edit', $product) }}" class="btn btn-sm btn-info me-2">Edit</a>
                                            <form action="{{ route('finished-products.destroy', $product) }}" method="POST" class="d-inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
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

    <div class="modal fade" id="sellModal" tabindex="-1" aria-labelledby="sellModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="sellForm" method="POST" action="">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="sellModalLabel">Record a Sale</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Selling <span id="product-name" class="fw-bold"></span></p>
                        <p>Available Stock: <span id="available-stock" class="fw-bold"></span></p>

                        <input type="hidden" name="finished_product_id" id="product-id">

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity to Sell</label>
                            <input type="number" step="0.001" min="0.001" name="quantity" id="quantity" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Record Sale</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    var sellModal = document.getElementById('sellModal')
    sellModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var productId = button.getAttribute('data-id')
        var productName = button.getAttribute('data-name')
        var productStock = button.getAttribute('data-stock')

        var modalProductName = sellModal.querySelector('#product-name')
        var modalAvailableStock = sellModal.querySelector('#available-stock')
        var modalProductIdInput = sellModal.querySelector('#product-id')
        var modalQuantityInput = sellModal.querySelector('#quantity')
        var sellForm = sellModal.querySelector('#sellForm');

        modalProductName.textContent = productName
        modalAvailableStock.textContent = productStock
        modalProductIdInput.value = productId
        modalQuantityInput.value = ''
        modalQuantityInput.max = productStock;
        
        // This is the new line to fix the route issue
        sellForm.action = `/finished-products/${productId}/sell`;
    })
</script>