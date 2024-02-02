<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengecekModel extends Model
{
    use HasFactory;
    protected $table = "tbl_pengecek";
    protected $primaryKey = 'pengecek_id';
    protected $fillable = [
        'pengecek_nama',
        'pengecek_slug',
        'pengecek_alamat',
        'pengecek_notelp',
    ]; 
}
