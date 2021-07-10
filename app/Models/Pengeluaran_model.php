<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran_model extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
