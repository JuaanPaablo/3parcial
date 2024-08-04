<?php

namespace App\Controllers;

use App\Models\NModelSelect;

class Cbdd extends BaseController
{
    public function testbdd()
    {
        $db = \Config\Database::connect();
        if ($db->connect()) {
            print_r('Listo mijin conectado');
        } else {
            print_r('Cambiese a gastronomia');
        }
    }

    public function Select_Controlador_bdd()
    {
        $datosesion = session('SecInfo');
        $instancia = new NModelSelect();
        $datosbdd = $instancia->Select_Modelo_Invetario();
        $data = [
            "keyselectbdd" => $datosbdd,
            "MensajeSesion" => $datosesion
        ];
        return view('vistainventario', $data);
    }

    public function Select_Controlador_usuario()
    {
        $datosesion = session('SecInfo');
        $instancia = new NModelSelect();
        $datosbdd = $instancia->Select_Modelo_Usuario();
        $data = [
            "keyselectbdd" => $datosbdd,
            "MensajeSesion" => $datosesion
        ];
        return view('vistausuario', $data);
    }

    public function Insertar_TblUsuario()
    {
        $instancia = new NModelSelect();
        $datospost = [
            'usu_nombre' => $_POST['Inp_Nombre'],
            'usu_apellido' => $_POST['Inp_Apellido'],
        ];
        $Verificacion = $instancia->Insert_SPTblUsuario($datospost);
        if ($Verificacion) {
            return redirect()->to(base_url().'usu')->with('SecInfo', '1');
        } else {
            return redirect()->to(base_url().'usu')->with('SecInfo', '0');
        }
    }

    public function Insertar_TblInventario()
    {
        $instancia = new NModelSelect();
        $datospost = [
            'inv_titulo' => $_POST['Inp_Titulo'],
            'inv_descripcion' => $_POST['Inp_Descripcion'],
        ];
        $Verificacion = $instancia->Insert_TblInventario($datospost);
        if ($Verificacion) {
            return redirect()->to(base_url().'inv')->with('SecInfo', '1');
        } else {
            return redirect()->to(base_url().'inv')->with('SecInfo', '0');
        }
    }


    public function EditarUsu($id)
    {
        $instancia = new NModelSelect();
        $usuario = $instancia->Obtener_Usuario_Por_Id($id);

        if (!$usuario) {
            return redirect()->to(base_url().'usu')->with('error', 'Usuario no encontrado');
        }

        $data = [
            'usuario' => $usuario
        ];

        return view('editarusu', $data);
    }
    
    public function Editar_Usuario()
    {
    $nombre = $this->request->getPost('Inp_Nombre');
    $apellido = $this->request->getPost('Inp_Apellido');
    $usuario_id = $this->request->getPost('usu_id');

    if (empty($nombre) || empty($apellido) || empty($usuario_id)) {
        return redirect()->back()->with('error', 'Todos los campos son obligatorios');
    }

    $instancia = new NModelSelect();
    $datospost = [
        'usu_nombre' => $nombre,
        'usu_apellido' => $apellido,
    ];

    $resultado = $instancia->Actualizar_TblUsuario($usuario_id, $datospost);

    if ($resultado) {
        return redirect()->to(base_url().'usu')->with('success', 'Usuario actualizado exitosamente');
    } else {
        return redirect()->to(base_url().'usu')->with('error', 'Error al actualizar el usuario');
    }
    }


    public function Eliminar_Usuario($id)
    {
        $instancia = new NModelSelect();
        $resultado = $instancia->Eliminar_TblUsuario($id);

        if ($resultado) {
            return redirect()->to(base_url('usu'))->with('success', 'Usuario eliminado exitosamente');
        } else {
            return redirect()->to(base_url('usu'))->with('error', 'Error al eliminar el usuario');
        }
    }
    
    public function EditarInv($id)
    {
        $instancia = new NModelSelect();
        $inventario = $instancia->Obtener_Inventario_Por_Id($id); // Asegúrate de definir este método en el modelo

        if (!$inventario) {
            return redirect()->to(base_url().'inv')->with('error', 'Ítem no encontrado');
        }

        $data = [
            'inventario' => $inventario
        ];

        return view('editarinv', $data);
    }
    
    public function Editar_Inventario()
    {
        $titulo = $this->request->getPost('Inp_Titulo');
        $descripcion = $this->request->getPost('Inp_Descripcion');
        $inv_id = $this->request->getPost('inv_id');

        if (empty($titulo) || empty($descripcion) || empty($inv_id)) {
            return redirect()->back()->with('error', 'Todos los campos son obligatorios');
        }

        $instancia = new NModelSelect();
        $datospost = [
            'inv_titulo' => $titulo,
            'inv_descripcion' => $descripcion,
        ];

        $resultado = $instancia->Actualizar_TblInventario($inv_id, $datospost);

        if ($resultado) {
            return redirect()->to(base_url().'inv')->with('success', 'Ítem actualizado exitosamente');
        } else {
            return redirect()->to(base_url().'inv')->with('error', 'Error al actualizar el ítem');
        }
    }

    public function Eliminar_Inventario($id)
    {
        $instancia = new NModelSelect();
        $resultado = $instancia->Eliminar_TblInventario($id); 

        if ($resultado) {
            return redirect()->to(base_url('inv'))->with('success', 'Ítem eliminado exitosamente');
        } else {
            return redirect()->to(base_url('inv'))->with('error', 'Error al eliminar el ítem');
        }
    }
}
