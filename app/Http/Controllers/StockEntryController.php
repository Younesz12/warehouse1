<?php
namespace App\Http\Controllers;

use App\Models\StockEntry;
use Illuminate\Http\Request;

class StockEntryController extends Controller
{
    /**
     * Display a listing of stock entries with filters.
     */
    public function index(Request $request)
    {
        $query = StockEntry::query()->with('source');

        // Filter by type (in/out)
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by source model type (e.g., RawProduct, FinishedProduct, PurchaseOrder, ProductionLog)
        if ($request->filled('source_type')) {
            $query->where('source_type', $request->source_type);
        }

        // Filter by specific source id
        if ($request->filled('source_id')) {
            $query->where('source_id', $request->source_id);
        }

        return $query->orderByDesc('created_at')->paginate(20);
    }

    /**
     * Display a specific stock entry.
     */
    public function show(StockEntry $stockEntry)
    {
        return $stockEntry->load('source');
    }
}
