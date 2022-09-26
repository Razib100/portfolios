<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class footerInfo extends Model
{
    use HasFactory;

    protected $fillable = ['summary','description','address','email','phone','social_media_link','social_media_image'];
}
