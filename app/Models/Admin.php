<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table    = 'tb_admin';

    protected $fillable = ['nama_admin', 'telepon', 'email', 'username', 'password', 'status', 'keterangan'];

    public $timestamps  = false;
}
