<?php 

namespace App\Controllers\Mattes\Api\Back_office_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;



class Mapa_filtros extends ResourceController
{
    use ResponseTrait;

    public function index(){
       $model = model('App\Models\Mattes\Arrendador_models/Detalle_propiedad');
       $request = \Config\Services::request();
       $distancia =  $request->getPost("distancia");
       //$metros = $distancia / 1000;
       $latitud_inicial = $request->getPost("latitud");
       $longitud_inicial =  $request->getPost("longitud");
       $id_universidad = $request->getPost("id_univ");
       $fecha = $request->getPost("fecha_ingreso");
       $tipo = $request->getPost("tipo_alojamiento");
       $fecha = $request->getPost("fecha_ingreso");
       $precio_min = $request->getPost("precio_min");
       $precio_max = $request->getPost("precio_max");
       $rommie = $request->getPost("rommie");
       $n_bath = $request->getPost("numero_baños");
       $pet = $request->getPost("petfriendly");
       $disponible = $request->getPost("disponible");

       $especial = $request->getPost("capacidades");
       $wifi = $request->getPost("wifi");
       $limpieza = $request->getPost("limpieza");
       $seguridad = $request->getPost("seguridad");
       $estacionamiento = $request->getPost("estacionamiento");
       $lavadora = $request->getPost("lavadora");
       $cocina = $request->getPost("cocina");
       //var_dump($distancia);

        //  $data = $model->where('id_university',$id_universidad)->where("km <=" ,$distancia)->findAll();


       
      $query_result =  'SELECT property.id, id_user, name, description, visiting_hours, date_start, date_finish,
      stamp_mattes, verified, positioning, id_type_accommodation, property.created_at, property.updated_at, property.deleted_at,
      (SELECT pickture FROM propetyfiles WHERE property.id = propetyfiles.id_propety AND pickture != " " AND propetyfiles.deleted_at  = "0000-00-00 00:00:0" LIMIT 1) AS imagen, 
      (SELECT price FROM propertydetail WHERE property.id = propertydetail.id_propety AND propertydetail.deleted_at = "0000-00-00 00:00:0")  AS precio,
      (SELECT latitude FROM propertydetail WHERE property.id = propertydetail.id_propety AND propertydetail.deleted_at = "0000-00-00 00:00:0")  AS latitud,
      (SELECT longitude FROM propertydetail WHERE property.id = propertydetail.id_propety AND propertydetail.deleted_at = "0000-00-00 00:00:0")  AS longitud, 
      (SELECT km FROM propertydetail WHERE property.id = propertydetail.id_propety AND propertydetail.deleted_at = "0000-00-00 00:00:0" LIMIT 1)  AS distancia,
      (SELECT propertydetail.id_university FROM propertydetail WHERE property.id = propertydetail.id_propety AND propertydetail.deleted_at = "0000-00-00 00:00:0" )  AS university ,
      (SELECT propertydetail.inhabit FROM propertydetail WHERE property.id = propertydetail.id_propety AND propertydetail.deleted_at = "0000-00-00 00:00:0" )  AS habitada,
      (SELECT propertyservices.n_bathing FROM propertyservices WHERE property.id = propertyservices.id_propety limit 1)  AS banos,
      (SELECT propertyservices.petfrienly FROM propertyservices WHERE property.id = propertyservices.id_propety limit 1)  AS mascotas,
      (SELECT propertyservices.disability FROM propertyservices WHERE property.id = propertyservices.id_propety limit 1)  AS l_discapacidad,
      (SELECT propertyservices.wifi FROM propertyservices WHERE property.id = propertyservices.id_propety limit 1)  AS wifi,
      (SELECT propertyservices.cleaning FROM propertyservices WHERE property.id = propertyservices.id_propety limit 1)  AS limpieza,
      (SELECT propertyservices.parking FROM propertyservices WHERE property.id = propertyservices.id_propety limit 1)  AS estacionamiento,
      (SELECT propertyservices.`security` FROM propertyservices WHERE property.id = propertyservices.id_propety limit 1)  AS seguridad,
      (SELECT propertyservices.washer FROM propertyservices WHERE property.id = propertyservices.id_propety limit 1)  AS lavadora,
      (SELECT propertyservices.kitchen_room FROM propertyservices WHERE property.id = propertyservices.id_propety limit 1)  AS cocina,
      (SELECT propertyservices.available FROM propertyservices WHERE property.id = propertyservices.id_propety limit 1)  AS disponible,
      (SELECT propertyservices.n_roomies FROM propertyservices WHERE property.id = propertyservices.id_propety limit 1)  AS rommies,
      (SELECT propertyrating.property_count FROM propertyrating WHERE property.id = propertyrating.id_property limit 1) AS estrellas
       FROM property where property.verified = 0 AND property.deleted_at = "0000-00-00 00:00:00"';

        $condicion_uni = ' having university = "'.$id_universidad.'"';
        $condicion_precio = ' and precio between "'.$precio_min.'" and "'.$precio_max.'"';
        $condicion_distancia =  ' and distancia <= '.$distancia.'';

        //$query_result = $query_result.$condicion_uni.$condicion_distancia;

       // var_dump($query_result);



      // $data = $model->getBusqueda($query_result);
        //return $this->respond($data, 200);  

        /*    if($fecha != ""){
            $fecha = date("d-m-Y", strtotime($fecha));
            $condicion_fecha = ' and property.date_start = "'.$fecha.'"';    

        }else{
            $fecha = "";
            $condicion_fecha = ' and property.date_start != "'.$fecha.'"';
        } */
        if($tipo != ""){
            $condicion_tipo = ' and id_type_accommodation = "'.$tipo.'"';    

        }else{
            $tipo = "";
            $condicion_tipo = ' and id_type_accommodation != "'.$tipo.'"';
        }

        if($rommie != ""){
            $condicion_roomie = ' and rommies = "'.$rommie.'"';    

        }else{
            $rommie = "";
            $condicion_roomie = ' and rommies != "'.$rommie.'"';
        }

        if($n_bath != ""){
            $condicion_roomie = ' and banos = "'.$n_bath.'"';    

        }else{
            $n_bath = "";
            $condicion_roomie = ' and banos != "'.$n_bath.'"';
        }

        if($pet != ""){
            $condicion_pet = ' and mascotas = "'.$pet.'"';    

        }else{
            $pet = "";
            $condicion_pet = ' and mascotas != "'.$pet.'"';
        }

        if($disponible != ""){
            $condicion_disponible = ' and disponible = "'.$disponible.'"';    

        }else{
            $disponible = "";
            $condicion_disponible = ' and disponible != "'.$disponible.'"';
        }

        if(isset($especial)){
            $especial = 1;
            $condicion_especial = ' and l_discapacidad = "'.$especial.'"';    

        }else{
            $especial = 0;
            $condicion_especial = ' and l_discapacidad >= '.$especial.'';
        }

        if(isset($wifi)){
            $wifi = 1;
            $condicion_wifi = ' and wifi = '.$wifi.'';    

        }else{
            $wifi = 0;
            $condicion_wifi = ' and wifi >= '.$wifi.'';
        }
        if(isset($limpieza)){
            $limpieza = 1;
            $condicion_limpieza = ' and limpieza = '.$limpieza.'';    

        }else{
            $limpieza = 0;
            $condicion_limpieza = ' and limpieza >= '.$limpieza.'';
        }

        if(isset($seguridad)){
            $seguridad = 1;
            $condicion_seguridad = ' and seguridad = '.$seguridad.'';    

        }else{
            $seguridad = 0;
            $condicion_seguridad = ' and seguridad >= '.$seguridad.'';
        }


        if(isset($estacionamiento)){
            $estacionamiento = 1;
            $condicion_estacionamiento = ' and estacionamiento = '.$estacionamiento.'';    

        }else{
            $estacionamiento = 0;
            $condicion_estacionamiento = ' and estacionamiento >= '.$estacionamiento.'';
        }

        if(isset($lavadora)){
            $lavadora = 1;
            $condicion_lavadora = ' and lavadora = '.$lavadora.'';    

        }else{
            $lavadora = 0;
            $condicion_lavadora = ' and lavadora >= '.$lavadora.'';
        }

        if(isset($cocina)){
            $cocina = 1;
            $condicion_cocina = ' and cocina = '.$cocina.'';    

        }else{
            $cocina = 0;
            $condicion_cocina = ' and cocina >= '.$cocina.'';
        }
        $query_result = $query_result.$condicion_tipo.$condicion_uni. $condicion_distancia.$condicion_precio
        .$condicion_roomie.$condicion_pet.$condicion_disponible.$condicion_especial.$condicion_wifi
        .$condicion_limpieza.$condicion_seguridad.$condicion_lavadora.$condicion_cocina;

      
       $data = $model->getBusqueda($query_result);
        return $this->respond($data, 200);   
     
    }


}