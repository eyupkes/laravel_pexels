<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

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

       public function index($value='')
     {
          
       $res= $this->pexels->get('curated?'.http_build_query([
            'page' => 1,
            'per_page' =>20 
          ]))
         ->getBody()
         ->getContents();

         $res=json_decode($res);
         $data['photos']=$res; 

        return view('photos')->with($data); 
     }


 
 

 
}
