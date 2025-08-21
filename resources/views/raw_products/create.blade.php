@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Raw Product</h2>
    <form method="POST" action="{{ route('raw-products.store') }}">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label>SKU</label>
            <input name="sku" class="form-control">
        </div>
        <div class="mb-3">
            <label>Unit</label>
            <input name="unit" class="form-control">
        </div>
        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
