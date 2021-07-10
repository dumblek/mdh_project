<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan_model extends Model
{
    use HasFactory;

    protected $table = 'pemasukan';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
