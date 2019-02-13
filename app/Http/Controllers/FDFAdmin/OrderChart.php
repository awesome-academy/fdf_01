<?php

namespace App\Http\Controllers\FDFAdmin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderChart extends Controller
{
    public function orderByYear()
    {
        $range = \Carbon\Carbon::now()->subYears(5);
        $orderYear = DB::table('orders')
                    ->select(DB::raw('year(date_order) as getYear'), DB::raw('COUNT(*) as value'))
                    ->where('date_order', '>=', $range)
                    ->groupBy('getYear')
                    ->orderBy('getYear', 'ASC')
                    ->get();

        return view('fdfadmin.chart.get_year', compact('orderYear'));
    }

    public function orderByDay()
    {
        $range = \Carbon\Carbon::now();
        $get_range = date_format($range,"Y/m/d");
        $date_range = date_format($range,"d/m/Y");
        $sumProductDay = DB::table('orders')
                    ->select(DB::raw('SUM(detail_orders.amount) as countProduct'))
                    ->join('detail_orders', 'orders.id', '=', 'detail_orders.order_id')
                    ->join('products', 'detail_orders.product_id', '=', 'products.id')
                    ->where('date_order', '=', $get_range)
                    ->groupBy('date_order')
                    ->first();
        if ($sumProductDay == null)
        {

            return redirect(route('chartYear'))->with('alert',trans('chart.no_order'));
        } else {

        $totalProduct = (INT)($sumProductDay->countProduct);
        $percentProduct = round((100 / $totalProduct), 3);

        $productBuy = DB::table('orders')
                    ->select('products.name as name', DB::raw("SUM(amount) * $percentProduct as y"))
                    ->join('detail_orders', 'orders.id', '=', 'detail_orders.order_id')
                    ->join('products', 'detail_orders.product_id', '=', 'products.id')
                    ->where('date_order', '=', $get_range)                    
                    ->groupBy('product_id')
                    ->get();

        return view('fdfadmin.chart.view_order', compact('productBuy', 'date_range'));

        }            
    }
}
