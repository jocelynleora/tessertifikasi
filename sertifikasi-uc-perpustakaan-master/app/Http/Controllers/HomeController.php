<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoansModel;

class HomeController extends Controller
{
    /**
     * Display the home page with borrowing data.
     */
    public function index()
    {
        // Mengambil data peminjaman dengan hubungan ke member dan book
        $loans = LoansModel::with('member', 'book')->get();

        return view('home', compact('loans'));
    }
}
