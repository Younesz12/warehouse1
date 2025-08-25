<x-app-layout>
    <div class="container-fluid py-0" style="background-color: #F9F6F3;">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header text-white text-center rounded-top-3" style="background-color: #4A9782;">
                        <h2 class="mb-0">Warehouse Dashboard</h2>
                    </div>
                    <div class="card-body" style="background-color: #F9F6F3;">
                        <div class="row text-center mb-0">
                            <!-- Metrics Cards -->
                            <div class="col-md-3 mb-3">
                                <div class="card border-primary h-100">
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        <div>
                                            <h5 class="card-title text-primary">Total Raw Products</h5>
                                            <h2 class="card-text fw-bold">{{ $totalRawProducts }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card border-success h-100">
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        <div>
                                            <h5 class="card-title text-success">Total Finished Products</h5>
                                            <h2 class="card-text fw-bold">{{ $totalFinishedProducts }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card border-warning h-100">
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        <div>
                                            <h5 class="card-title text-warning">Total Purchase Orders</h5>
                                            <h2 class="card-text fw-bold">{{ $totalPurchaseOrders }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card border-info h-100">
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        <div>
                                            <h5 class="card-title text-info">Total Production Logs</h5>
                                            <h2 class="card-text fw-bold">{{ $totalProductionLogs }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        
                        <div class="row text-center mt-0">
                            <!-- Action Buttons -->
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('raw-products.index') }}" 
                                   class="btn btn-outline-primary w-100 py-4 rounded-3">
                                    <i class="bi bi-box-seam" style="font-size:2rem;"></i><br>
                                    <strong>Raw Products</strong><br>
                                    <small>Manage materials</small>
                                </a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('finished-products.index') }}" 
                                   class="btn btn-outline-success w-100 py-4 rounded-3">
                                    <i class="bi bi-bag-check" style="font-size:2rem;"></i><br>
                                    <strong>Finished Products</strong><br>
                                    <small>Final stock</small>
                                </a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('purchase-orders.index') }}" 
                                   class="btn btn-outline-warning w-100 py-4 rounded-3">
                                    <i class="bi bi-cart-check" style="font-size:2rem;"></i><br>
                                    <strong>Purchase Orders</strong><br>
                                    <small>Order raw</small>
                                </a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('production-logs.index') }}" 
                                   class="btn btn-outline-info w-100 py-4 rounded-3">
                                    <i class="bi bi-gear-wide-connected" style="font-size:2rem;"></i><br>
                                    <strong>Production Logs</strong><br>
                                    <small>Track process</small>
                                </a>
                            </div>
                        </div>

                        <hr>
                        
                        <!-- Purchase Order Status Section -->
                        <div class="mt-4">
                            <h4 class="mb-3">Purchase Order Status</h4>
                            <div class="row text-center mb-4">
                                <!-- Pending Orders -->
                                <div class="col-md-4 mb-3">
                                    <div class="p-4 border border-warning rounded-3 h-100">
                                        <h5 class="text-warning">Pending</h5>
                                        <h2 class="fw-bold">{{ $pendingOrders }}</h2>
                                    </div>
                                </div>
                                <!-- Completed Orders -->
                                <div class="col-md-4 mb-3">
                                    <div class="p-4 border border-success rounded-3 h-100">
                                        <h5 class="text-success">Completed</h5>
                                        <h2 class="fw-bold">{{ $completedOrders }}</h2>
                                    </div>
                                </div>
                                <!-- Cancelled Orders -->
                                <div class="col-md-4 mb-3">
                                    <div class="p-4 border border-danger rounded-3 h-100">
                                        <h5 class="text-danger">Cancelled</h5>
                                        <h2 class="fw-bold">{{ $cancelledOrders }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
