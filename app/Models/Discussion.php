<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
    ];

//############################## get the session of discussion #################################################

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }
}
