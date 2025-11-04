<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    // Field yang boleh diisi melalui Mass Assignment
    protected $fillable = [
        'session_id',
        'ip_address',
        'url',
    ];
}