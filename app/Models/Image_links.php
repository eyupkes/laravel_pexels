<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_links extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $table='image_links';
    protected $fillable = ['photographer_id','photos_id','original','large2x','large','medium','small','portrait','landscape','tiny'];        


}
