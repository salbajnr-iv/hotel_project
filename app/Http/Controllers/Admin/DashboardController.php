<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController
{
    public function index(Request $request)
    {
        $stats = [
            'bookings_count' => DB::table('bookings')->count(),
        ];

        return view('admin.dashboard', $stats);
    }
}

