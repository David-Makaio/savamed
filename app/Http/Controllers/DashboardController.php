<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class DashboardController extends Controller
{
    public function index()
    {
        $logs = \DB::table('historis')
        ->join('barangs', 'historis.barang_id', '=', 'barangs.id')
        ->select(
            'historis.*', 
            'barangs.nama_barang'
        )
        
        ->orderBy('historis.created_at', 'desc')
        ->take(8)
        ->get();

    return view('dashboard', compact('logs'));
    }
}