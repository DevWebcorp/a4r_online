<?php 

namespace App\Controllers\Mattes\Api\Arrendador_api;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
//use CodeIgniter\Files\File;
helper('Acceso');


class Propiedad_archivos extends ResourceController
{
    use ResponseTrait;

    public function index(){
       $acceso = Acceso();
        if($acceso){
            $request = \Config\Services::request();
          /*   $domicilio = $this->request->getFile('domicilio');
            $recibo = $this->request->getFile('recibo'); */
            $id_propiedad = $request->getPost('id_propiedad');
            $path = 'uploads/Mattes/Arrendador';

           /*  if($domicilio->isValid()){
                $newName = $domicilio->getRandomName();
                $domicilio->move(WRITEPATH.$path, $newName);
                $domicilio = $domicilio->getName(); 
            }  */


          /*   if($recibo->isValid()){
                $newName2 = $recibo->getRandomName();
                $recibo->move(WRITEPATH.$path, $newName2);
                $recibo = $recibo->getName(); 
            }    */
 
            $files = $this->request->getFiles();
            $model = model('App\Models\Mattes\Arrendador_models/Files');
            $model_prop = model('App\Models\Mattes\Back_office_models/Model_property_admin');
            $model_propiedad = model('App\Models\Mattes\Arrendador_models/Propiedad');

            $longitud = count($files['files']);

           /*  $data = [
                'id_propety' => $id_propiedad,
                'file_address' =>  $domicilio,
                'file_receipt' => $recibo,
            ];

           $model->insert($data);  */


            for ($i = 0; $i <= $longitud-1; $i++) {
                if($i ==0){
                    if ($files['files'][$i]->isValid() && !$files['files'][$i]->hasMoved()) {
                        $newName = $files['files'][$i]->getRandomName();
                         $files['files'][$i]->move(WRITEPATH .$path, $newName);
                         $name_save = $files['files'][$i]->getName(); 
                         $data = [
                             'id_propety' => $id_propiedad,
                             'pickture' => $name_save,
                             //'file_address' =>  $domicilio,
                             //'file_receipt' => $recibo,
                         ];
                        $model->insert($data); 
                    }

                }else{
                    if ($files['files'][$i]->isValid() && !$files['files'][$i]->hasMoved()) {
                        $newName = $files['files'][$i]->getRandomName();
                         $files['files'][$i]->move(WRITEPATH .$path, $newName);
                         $name_save = $files['files'][$i]->getName(); 
 
                         $data = [
                            'id_propety' => $id_propiedad,
                            'pickture' => $name_save,
                         ];
                        $model->insert($data); 
                    }

                }

            } 
            
            $status = [
                'id_property' => $id_propiedad ,
                'id_status' => 200
            ];
            $model_prop->insert($status);

            $status_propiedad = [
                'status' => 200
            ];
            $model_propiedad->update($id_propiedad, $status_propiedad);

            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'DATOS GUARDADOS CON EXITO'
                ]
              ];
            return $this->respondCreated($response);   
        }
    } 


    public function status_prop($id_propiedad){
        $model_propiedad = model('App\Models\Mattes\Arrendador_models/Propiedad');
        $status_propiedad = [
            'status' => 200
        ];
        $model_propiedad->update($id_propiedad, $status_propiedad);
    }
}