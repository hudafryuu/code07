<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    public $table="pesanan";
    protected $primaryKey="id_pesanan";
    public $incrementing=false;
    protected $guarded = [];
}
