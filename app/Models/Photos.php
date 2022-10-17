<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Photos extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $table='photos'; 
    protected $fillable = ['photographer_id','description','likes','alt'];

    public function Image_links(){  
        return $this->hasMany(Image_links::class,'photos_id','id'); 
    }
 


}
