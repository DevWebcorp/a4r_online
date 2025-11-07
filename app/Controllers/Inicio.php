<?php

namespace App\Controllers;

use App\Models\Access;

class inicio extends BaseController
{
        public function __construct()
        {
                $session = session();
                if( $session->get('logged_in') != null){
                        return redirect()->to(base_url().'/inicio/index');
                }else{
                        //$data['title'] = "DASHBOAR PACIENTE";
                        //echo view('Login/Signin_view' ,  $data);
                        //echo view('Mattes/Principal',$data);
                        return redirect()->to(base_url().'/Mattes/Principal');
                }
        }

	public function index()
	{
               
                //helper('menu');
                $session = session();
                $user_id = $session->get('unique');
                
                //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
                $data_fotter['scripts'] = ["dashboard.js" ,"notificacion.js"];
                //Css Shets
                $data_header['styles'] = ["../lib/datatables-responsive/responsive.dataTables.scss" , "../lib/datatables/jquery.dataTables.css" , "starlight.css" , "paciente/paciente_identidad.css"];
                //Vars
                $data_header['title'] = "Inicio";
                $data_header['description'] = "Main Admin";
                $data_left['menu'] = get_menu();
                // MODELS 
                $model_identity_student = model('App\Models\Mattes\Arrendatario_Models\Model_identity');
                $model_studentdata = model('App\Models\Mattes\Arrendatario_Models\Model_studentdata');
                echo view('header' , $data_header);
                echo view('left_panel' , $data_left);
                echo view('head_panel');
                
                //echo "<script>alert(".$session->get('utype').")</script>";
                switch($session->get('utype')){
                        
                        case(1):
                                return redirect()->to(base_url().'/Mattes/Administrador/Inicio');
                        break;
                        case(2):
                                // $model_identity = model('App\Models\models_paciente\Identity');
                                // $user_model = model('App\Models\Model_user\User');
                                // $id_user = $user_model->getIdFromMail($_SESSION['email']);
                                // $data_paciente['identity_data'] = $model_identity->where('id_user' , $id_user[0]->id)->findAll();
                                // $data_paciente['identity'] = count( $data_paciente['identity_data'] ) > 0 ? true : false;
                                // $data_paciente['list_religion']=$model_identity->get_list_religion();
                                // //$data_paciente['identity'] = false;
                                // $data_paciente['email'] = $session->get('email');
                                return redirect()->to(base_url().'/back-office');
                        break;
                        case(3):
                                // $model_medico = model('App\Models\Models_hcv\Model_hcv_identity_operativo');
                                // $user_model = model('App\Models\Model_user\User');
                                // $id_user = $user_model->getIdFromMail($_SESSION['email']);
                                // $data_operativo['operativo_data'] = $model_medico->where('id_user' , $id_user[0]->id)->findAll();
                                // $data_operativo['identity'] = count( $data_operativo['operativo_data'] ) > 0 ? true : false;
                                // if($data_operativo['identity']){
                                //         return redirect()->to(base_url().'/Operativo/Hcv_operativo_principal');
                                // }else{
                                //         return redirect()->to(base_url().'/Operativo/Hcv_Ficha_Identificacion_operativo');
                                // }
                                return redirect()->to(base_url().'/Mattes/Arrendador/Primeravez');
                        break;

                        case(4):
                                $registro1 = count($model_identity_student->where('id_user',$session->get('unique'))->find());
                                $registro2 = count($model_studentdata->where('id_user',$session->get('unique'))->find());
                                if($registro1 > "0" AND  $registro2 > "0") {
                                        return redirect()->to(base_url().'/home-alumno');
                                }else if ($registro1 > "0") {
                                        return redirect()->to(base_url().'/registro-documentos');
                                } else {
                                        return redirect()->to(base_url().'/registro-alumno');
                                }

                                
                        break; 
                                
                        case(5):
                                return redirect()->to(base_url().'/home-propietario');
                        break;  

                        default:
                                return redirect()->to(base_url().'/Mattes/Principal');
                }
                // echo view('dashboard');
                echo view('right_panel');
                echo view('fotter_panel' , $data_fotter);
	}
}