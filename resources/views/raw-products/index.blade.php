<x-app-layout>
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 card-title">Raw Products</h2>
                    @can('admin')
                        <a href="{{ route('raw-products.create') }}" class="btn btn-primary">
                            Add Raw Product
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
                                    <th>Actions</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rawProducts as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->sku }}</td>
                                <td>{{ $product->unit }}</td>
                                <td>{{ $product->stock_quantity }}</td>
                                @can('admin')
                                    <td>
                                        <a href="{{ route('raw-products.edit', $product) }}" class="btn btn-sm btn-secondary me-2">Edit</a>
                                        <form action="{{ route('raw-products.destroy', $product) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
</x-app-layout>