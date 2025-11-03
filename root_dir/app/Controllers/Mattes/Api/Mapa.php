<?php 

namespace App\Controllers\Mattes\Api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
helper('Acceso');

class Mapa extends ResourceController
{

    public function data_mapa(){
        $json = $this->request->getJSON();
        $direct = $json->direccion;
        $address = urlencode($direct); 

        $googleMapUrl = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyCwD3Bk71LnFRTi329E7GRyqPQDTpDGXgk";
        $geocodeResponseData = file_get_contents($googleMapUrl);
        $responseData = json_decode($geocodeResponseData, true);

        if($responseData['status']=='OK') {
            $latitude = isset($responseData['results'][0]['geometry']['location']['lat']) ? $responseData['results'][0]['geometry']['location']['lat'] : "";
            $longitude = isset($responseData['results'][0]['geometry']['location']['lng']) ? $responseData['results'][0]['geometry']['location']['lng'] : "";
            $formattedAddress = isset($responseData['results'][0]['formatted_address']) ? $responseData['results'][0]['formatted_address'] : "";         
            if($latitude && $longitude && $formattedAddress) {   

                $data = [
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'formattedAddress' => $formattedAddress
                   
                    
                ];

                return $this->respond($data, 200);
                         
            } else {
                return $this->respond(400);
            }         
        } else {
            
            return $this->failNotFound('BUSQUEDA NO ENCONTRADO');
        }
    }

}