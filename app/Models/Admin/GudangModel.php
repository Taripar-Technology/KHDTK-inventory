<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GudangModel extends Model
{
    use HasFactory;
    protected $table = "tbl_gudang";
    protected $primaryKey = 'gudang_id';
    protected $fillable = [
        'gudang_nama',
        'gudang_slug',
        'gudang_keterangan'
    ]; 
}
