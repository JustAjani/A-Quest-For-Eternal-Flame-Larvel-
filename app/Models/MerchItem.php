<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchItem extends Model
{
    protected $fillable = ['type', 'title', 'image', 'price'];
}
