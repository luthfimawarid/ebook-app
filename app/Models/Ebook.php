<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;

    // Menentukan kolom mana yang bisa diisi secara massal (mass assignable)
    protected $fillable = [
        'title',
        'file_path',
    ];

    // (Opsional) Jika kamu ingin relasi dengan user yang mengupload eBook:
    // protected $fillable = ['title', 'file_path', 'user_id'];
    // public function user() {
    //     return $this->belongsTo(User::class);
    // }
}
