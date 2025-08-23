<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold">Production Logs</h2>
                        @can('admin')
                            <a href="{{ route('production-logs.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                New Production
                            </a>
                        @endcan
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Finished Product</th>
                                    <th class="px-4 py-2">Quantity Produced</th>
                                    <th class="px-4 py-2">Date</th>
                                    @can('admin')<th class="px-4 py-2">Actions</th>@endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logs as $log)
                                <tr>
                                    <td class="border px-4 py-2">{{ $log->id }}</td>
                                    <td class="border px-4 py-2">{{ $log->finishedProduct->name }}</td>
                                    <td class="border px-4 py-2">{{ $log->quantity_produced }}</td>
                                    <td class="border px-4 py-2">{{ $log->created_at->format('Y-m-d') }}</td>
                                    @can('admin')
                                    <td class="border px-4 py-2">
                                        <form action="{{ route('production-logs.destroy', $log) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Delete?')">Delete</button>
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
    </div>
</x-app-layout>