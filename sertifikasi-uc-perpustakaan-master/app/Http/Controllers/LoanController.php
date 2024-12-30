<?php

namespace App\Http\Controllers;

use App\Models\LoansModel;
use App\Models\MembersModel;
use App\Models\BooksModel;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    
    // Menampilkan form untuk membuat peminjaman baru
    public function create()
    {
        // Mengambil data anggota dan buku
        $members = MembersModel::all();
        $books = BooksModel::all();
        
        return view('loans.create', compact('members', 'books'));
    }

    // Menyimpan data peminjaman baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'loan_date' => 'required|date',
            'due_date' => 'required|date',  // Pastikan due_date sudah dihitung dan disertakan dalam request
        ]);

        // Simpan data peminjaman ke database
        LoansModel::create([
            'member_id' => $request->member_id,
            'book_id' => $request->book_id,
            'loan_date' => $request->loan_date,  // Gunakan loan_date yang dikirimkan
            'due_date' => $request->due_date,    // Gunakan due_date yang dikirimkan
        ]);

        // Redirect ke halaman home dengan pesan sukses
        return redirect()->route('home')->with('success', 'Book loaned successfully!');
    }
}
