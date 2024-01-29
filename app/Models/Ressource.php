<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'filename',
        'date',
    ];

//############################### get the session of the resource ############################################################
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
