<!DOCTYPE html>
<html>
<head>
    <title>Warehouse Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Warehouse</a>
            <a class="nav-link text-white" href="{{ route('raw-products.index') }}">Raw Products</a>
            <a class="nav-link text-white" href="{{ route('finished-products.index') }}">Finished Products</a>
            <a class="nav-link text-white" href="{{ route('purchase-orders.index') }}">Purchase Orders</a>
            <a class="nav-link text-white" href="{{ route('production-logs.index') }}">Production Logs</a>
            <a class="nav-link text-white" href="{{ url('stock-entries') }}">Stock Entries</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
