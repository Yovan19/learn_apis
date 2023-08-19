<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'students';
    protected $dateFormat = 'Y-m-d H:i';
    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'gender', 'address', 'phone_number', 'email'];
}
