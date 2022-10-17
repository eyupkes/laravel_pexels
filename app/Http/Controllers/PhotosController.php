<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Photographers;
use App\Models\Photos; 
use App\Models\Image_links;



class PhotosController extends Controller
{     private $token; 
      private $pexels; 

      public function __construct($token='sad')
      {
           $this->token = '563492ad6f9170000100000105ca3b74cb85411ea9e6d007dac401e3'; 
           $this->pexels = new Client([
              'base_uri' => 'https://api.pexels.com/v1/',
              'headers' => [
                'Authorization' => $this->token
              ],
              'curl' => array( CURLOPT_SSL_VERIFYPEER => false )

            ]); 


      }

       public function index()
     {     
           $this->getPexelsPhoto(); // örnek olaral her listelemede cekme  ve kayıt işlemi yapıldı 

           $data['photographers'] =Photographers::all();  
           return view('photographers')->with($data); 
     }

       public function PhotographerPhotoList($id)
     {
           $data['profile'] =Photographers::where('id',$id)->first(); 
           $data['photos']  =Photos::with('Image_links')->where('photographer_id',$id)->get(); 
         
           return view('photos')->with($data); 
     }


 

       private function getPexelsPhoto()
     {
          
 
         $res= $this->pexels->get('curated?'.http_build_query([
            'page' => 2,
            'per_page' =>80 
          ]))

         ->getBody()
         ->getContents();

          $res=json_decode($res); 
        
          foreach ($res->photos as $key => $value) {
             $is= Photographers::where("photographer_pexels_id",$value->photographer_id)->get()->first(); 
             if ($is === null) {
                  $Photographers_veri = array(
                 'photographer_pexels_id'=> $value->photographer_id,
                 'name'=> $value->photographer,
                 'profile_url'=> $value->photographer_url,  
               );
                  $create1=Photographers::create($Photographers_veri);
                   $Photographers_id=$create1->id;
            } else{
               $Photographers_id=$is->id;
            }
 
            $Photos_veri = array(
                 'photographer_id'=> $Photographers_id,
                 'description'=> $value->alt,
                 'alt'=> $value->alt,  
                 'likes'=>0//$value->liked,
                  
             );
            $create2=Photos::create($Photos_veri);

             $Photos_veri = array(
                 'photographer_id'=> $Photographers_id,
                 'photos_id'=> $create2->id,
                 'original'=> $value->src->original,
                 'large2x'=> $value->src->large2x,
                 'large'=> $value->src->large,
                 'medium'=> $value->src->medium,
                 'small'=> $value->src->small,
                 'portrait'=> $value->src->portrait,
                 'landscape'=> $value->src->landscape,
                 'tiny'=> $value->src->tiny,  
             );
            $create3=Image_links::create($Photos_veri);   

         } 

         return $data['photos']=$res;  
     }


 
 

 
}
