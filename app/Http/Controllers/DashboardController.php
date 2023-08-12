<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $customerCount = [
            'labels' => [],
            'data' => []
        ];
        $customerCount['labels'][] = 'This Week';
        $customerCount['data'][] = Customer::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

        $customerCount['labels'][] = 'This Month';
        $customerCount['data'][] = Customer::whereMonth('created_at', Carbon::now()->month)->count();

        $customerCount['labels'][] = 'All Time';
        $customerCount['data'][] = Customer::count();
        return view('dashboard/index',compact('customerCount'));
    }
}