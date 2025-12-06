<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class HeaderSetting extends Model
{
    protected $fillable = ['video_type', 'youtube_id', 'video_path'];
}
