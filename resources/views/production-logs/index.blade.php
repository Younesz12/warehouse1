<x-app-layout>
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 card-title">Production Logs</h2>
                    @can('admin')
                        <a href="{{ route('production-logs.create') }}" class="btn btn-primary">
                            New Production
                        </a>
                    @endcan
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Finished Product</th>
                                <th>Quantity Produced</th>
                                <th>Date</th>
                                @can('admin')
                                    <th>Actions</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logs as $log)
                                <tr>
                                    <td>{{ $log->id }}</td>
                                    <td>{{ $log->finishedProduct->name }}</td>
                                    <td>{{ $log->quantity_produced }}</td>
                                    <td>{{ $log->created_at->format('Y-m-d') }}</td>
                                    @can('admin')
                                        <td>
                                            <form action="{{ route('production-logs.destroy', $log) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
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
</x-app-layout>