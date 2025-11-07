<?php

namespace App\Controllers\Mattes\General;

use App\Controllers\BaseController;

helper('Acceso');

class Registro extends BaseController
{

    public function index()
    {
        $data_header['title'] = "Registro propietario";
        $data_header['description'] = "Registro de los datos del propietario";
        $data_header['styles'] = ["starlight.css", "Mattes/Principal.css", "Mattes/Login.css", "Mattes/Menu_principal.css", "Mattes/Registro.css"];

        $data_fotter['scripts'] = [
            "dashboard.js",
            "../lib/jquery/jquery.js",
            "../lib/jquery-ui/jquery-ui.js",
            "Mattes/Principal.js"
        ];
        $data_header['description'] = "Login del usuario";

        echo view('header', $data_header);
        echo view('Mattes/Menu_principal');
        echo view('Mattes/General/Registro',  $data_header);
        echo view('Mattes/Footer');
        echo view('fotter_panel', $data_fotter);
    }
}
