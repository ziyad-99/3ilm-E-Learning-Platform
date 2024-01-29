<?php

namespace App\Models;

use Database\Factories\NotificationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Notification extends Model
{
    /*** The table associated with the model.
     ** @var string
     */
    protected $table = 'notifications';

    /*** The attributes that are mass assignable.
     ** @var array
     */
    protected $fillable = ['type', 'notifiable_id', 'notifiable_type', 'data', 'read_at', 'created_at', 'updated_at',];

    public function setDataAttribute($data)
    {
        $this->attributes['data'] = json_encode($data);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    protected static function newFactory()
    {
        return new NotificationFactory();
    }
}
