<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'KategoriID';  
    protected $fillable = [
        'NamaKategori',
        'KategoriID'
    ];

    public $timestamps = false;  
}