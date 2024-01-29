<?php

namespace App\Models;

use Database\Factories\MessageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Message extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['content'];

    protected $fillable = [
        'content',
        'date',
        'student_id',
        'discussion_id',
        'message_id',
    ];

    protected static function newFactory()
    {
        return new MessageFactory();
    }
}
