<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StockReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentYear = date('Y');

        // Fetch monthly stock data including purchases, sales, and returns
        $stockData = DB::table('transactions')
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(CASE WHEN type = "purchase" THEN quantity ELSE 0 END) as purchases'),
                DB::raw('SUM(CASE WHEN type = "sell" THEN quantity ELSE 0 END) as sales'),
                DB::raw('SUM(CASE WHEN type = "sell_return" THEN quantity ELSE 0 END) as returns')
            )
            ->whereYear('created_at', $currentYear) 
            ->groupBy('month')
            ->orderBy('month')
            ->get();
    
        // Fetch monthly sales amounts, grouped by month for the current year
        $monthlySales = DB::table('transactions')
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(amount) as total_sales')
            )
            ->where('type', 'sell') 
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get();
    
        // Total stock: sum of open_stock, purchases, and adjustments
        $totalStock = Transaction::whereIn('type', ['open_stock', 'purchase', 'adjustment'])->sum('quantity');
    
        // Total sales: sum of all sales transaction amounts
        $totalSales = Transaction::where('type', 'sell')->sum('amount');
    
        // Total purchases: sum of all purchase transaction amounts
        $totalPurchases = Transaction::where('type', 'purchase')->sum('amount');
        
        $totalAdjustments = Transaction::where('type', 'adjustment')->sum('quantity');

        // Retrieve the latest 13 transactions along with associated product data
        $transactions = Transaction::with('product')->latest()->take(13)->get();
    
        // Fetch the top five selling products
        $topProducts = DB::table('transactions')
            ->select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->where('type', 'sell')
            ->groupBy('product_id')
            ->orderBy('total_quantity', 'desc')
            ->take(4)
            ->get()
            ->map(function($item) {
                return [
                    'product' => Product::find($item->product_id),
                    'total_quantity' => $item->total_quantity,
                ];
            });

        // Prepare data for the chart
        $chartData = [
            'labels' => $topProducts->pluck('product.name')->toArray(), 
            'data' => $topProducts->pluck('total_quantity')->toArray(), 
        ];

        return view('reports.stock-report', compact(
            'currentYear', 
            'totalStock', 
            'totalSales', 
            'totalPurchases', 
            'transactions', 
            'stockData', 
            'monthlySales',
            'totalAdjustments',
            'topProducts',
            'chartData' 
        ));
    }
}