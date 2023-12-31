<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    public $table="barang";
    protected $primaryKey="id_barang";
    public $incrementing=false;
    protected $guarded = [];
}
