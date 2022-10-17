<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photographers extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $table='photographers'; 
    protected $fillable = ['photographer_pexels_id','name','profile_url'];
    
 

    public function Photos(){ 

        return $this->hasMany(Photos::class,'photographer_id','id');

    }


   


   
}
