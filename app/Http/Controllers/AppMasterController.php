<?php

namespace control_visitantes\Http\Controllers;

use Illuminate\Http\Request;
use control_visitantes\UsuarioAppMaster;
use control_visitantes\Rol;
use control_visitantes\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;


class AppMasterController extends Controller
{

    public function appmaster()
    {
        try {
            // dd('dsfds');

            //recibimos el crm y el id user
            if (!isset($_GET['crm']) || !isset($_GET['idusuario'])) {


                return abort('404');
            } else {

                // creamos las variables con los datos
                $crm = "8";
                $user_id = $_GET['idusuario'];
                $status_user = 'Habilitado';

                //Hacemos la consulta a la tabla rol de master_connection
                $rol = Rol::where('id_usuario', '=', $user_id)
                    ->where('id_modulo', '=', $crm)
                    ->first();


                // Si existe o la consulta devuleve valor entra al if
                if (isset($rol)) {

                    // Hacemos la consulta en la tabla usuarios de master_connection
                    $userAppMaster = UsuarioAppMaster::where('id_usuario', '=', $user_id)
                        ->where('estado', '=', $status_user)
                        ->first();

                    // Si existe o la consulta devuleve valor entra al if
                    if (isset($userAppMaster)) {

                        $user = User::where('codigo_usercrm',  $rol->id_usuario)
                            ->first();

                        if (!isset($user)) {
                            $user = User::where('rol_usercrm', '<=>', $rol->numero_rol)
                                ->update([
                                    'rol_usercrm' => $rol->numero_rol,
                                ]);
                        }
                    } else {
                        return abort('404');
                    }
                } else {
                    return abort('404');
                }

                // Si no existe el usuario en la tabla user de control de visitas lo creamos
                if (!isset($user)) {

                    $newUser = new User();
                    $newUser->nombre = $userAppMaster->nombre_usuario . ' ' . $userAppMaster->apellido_usuario;
                    $newUser->numero_documento = $userAppMaster->cedula_usuario;
                    $newUser->codigo_usercrm = $userAppMaster->id_usuario;
                    $newUser->rol_usercrm = $rol->numero_rol;
                    $newUser->save();
                }

                // Obtemos el rol 
                $rolUser = $rol->numero_rol;

                // Creamos un switch para devolver la vista que corresponda al rol 
                switch ($rolUser) {
                    case '1':
                        return view('reportes', compact('idusuario', 'crm'));
                        break;

                    case '2':
                        return view('welcome', compact('idusuario', 'crm'));
                        break;

                    default:
                        return abort('404');
                        break;
                }
            }
        } catch (DecryptException $e) {

            abort('404');
        }
    }
}
