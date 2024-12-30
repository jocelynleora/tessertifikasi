<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoansModel extends Model
{
    // Nama tabel di database
    protected $table = 'loans';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'member_id',
        'book_id',
        'loan_date',
        'due_date',
    ];

    // Relasi dengan model Member
    public function member()
    {
        return $this->belongsTo(MembersModel::class);
    }

    // Relasi dengan model Book
    public function book()
    {
        return $this->belongsTo(BooksModel::class);
    }
}
