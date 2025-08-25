<x-app-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Purchase Orders</h4>
                        <a href="{{ route('purchase-orders.create') }}" class="btn btn-primary float-end">Add New Purchase Order</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Raw Product</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purchaseOrders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->rawProduct->name ?? 'N/A' }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($order->status == 'completed') bg-success 
                                            @elseif($order->status == 'cancelled') bg-danger 
                                            @else bg-warning @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($order->status !== 'completed' && $order->status !== 'cancelled')
                                            <form action="{{ route('purchase-orders.update-status', $order) }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="status" value="completed">
                                                <button type="submit" class="btn btn-sm btn-success">Mark Completed</button>
                                            </form>
                                            <form action="{{ route('purchase-orders.update-status', $order) }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="status" value="cancelled">
                                                <button type="submit" class="btn btn-sm btn-danger">Cancel Order</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>