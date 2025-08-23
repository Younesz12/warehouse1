<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title mb-0">Warehouse Management Dashboard</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('raw-products.index') }}" class="btn btn-primary w-100 py-3 text-decoration-none">
                                <h5 class="mb-1">Raw Products</h5>
                                <small>Manage raw materials</small>
                            </a>
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('finished-products.index') }}" class="btn btn-success w-100 py-3 text-decoration-none">
                                <h5 class="mb-1">Finished Products</h5>
                                <small>Track final products</small>
                            </a>
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('purchase-orders.index') }}" class="btn btn-warning w-100 py-3 text-decoration-none">
                                <h5 class="mb-1">Purchase Orders</h5>
                                <small>Order materials</small>
                            </a>
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('production-logs.index') }}" class="btn btn-info w-100 py-3 text-decoration-none">
                                <h5 class="mb-1">Production Logs</h5>
                                <small>Track production</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>