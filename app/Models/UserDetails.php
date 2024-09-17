<?php

namespace App\Models;

use App\Models\UserDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hobbies',
        'phone',
        'gender',
        'company',
    ];

    public function user(){

        return $this->belongsTo(UserDetails::class);
    }
}