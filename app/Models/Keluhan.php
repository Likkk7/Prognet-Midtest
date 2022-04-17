<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;
    protected $fillable = array('judul_keluhan', 'keluhan_user', 'balasan_admin', 'user_id', 'waktu_keluhan', 'is_delete');

    public function admins()
    {
        return $this->belongsTo(Administrator::class, 'admin_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
