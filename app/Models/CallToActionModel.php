<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallToActionModel extends Model
{
    protected $table = "call_to_action";
    public $timestamps = false;
    protected $fillable = [
        'TeljesNev',
        'Telefon',
        'Email',
        'Uzenet',
        'sentAt'
    ];
    use HasFactory;
}
