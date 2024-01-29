<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class StudyDay extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['day'];

    protected $fillable = [
        'group_id',
        'day',
        'startTime',
        'endTime',
    ];
}
