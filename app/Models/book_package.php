<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRequest extends Model
{

    use HasFactory;
    protected $table = 'package_booking';
    protected $primaryKey = 'id';
}
