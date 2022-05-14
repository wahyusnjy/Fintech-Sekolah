<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pengajuans = Transaksi::where("type", 1)
                               ->where("status", 2)
                               ->get();

        $pengajuan_jajans = Transaksi::where("type", 2)->get();

        $jajan_by_invoices = Transaksi::where('type', 2)->groupBy('invoice_id')->get();
        return view('home', [
            "pengajuans" => $pengajuans,
            "jajan_by_invoices"=>$jajan_by_invoices,
            "pengajuan_jajans"=> $pengajuan_jajans,
        ]);
    }
}
