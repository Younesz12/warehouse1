@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Raw Products</h2>
    <a href="{{ route('raw-products.create') }}" class="btn btn-primary mb-3">+ Add Raw Product</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th><th>Name</th><th>SKU</th><th>Unit</th><th>Stock</th><th>Actions</th>
        </tr>
        @foreach($rawProducts as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->sku }}</td>
            <td>{{ $product->unit }}</td>
            <td>{{ $product->stock_quantity }}</td>
            <td>
                <a href="{{ route('raw-products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('raw-products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
