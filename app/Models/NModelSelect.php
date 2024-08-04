<?php

namespace App\Models;

use CodeIgniter\Model;

class NModelSelect extends Model
{
    public function Select_Modelo_Invetario()
    {
        $variable = $this->db->query('CALL SP_SELECT_INVENTARIO()');
        return $variable->getResult();
    }

    public function Select_Modelo_Usuario()
    {
        $variable = $this->db->query('CALL SP_SELECT_USUARIO()');
        return $variable->getResult();
    }

    public function Insert_TblUsuarios($datosainsertar)
    {
        try {
            $table = $this->db->table('tbl_usuario');
            $table->insert($datosainsertar);
     
            $this->db->insertID();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function Insert_TblInventario($datosainsertar)
    {
        try {
            $table = $this->db->table('tbl_inventario');
            $table->insert($datosainsertar);
     
            $this->db->insertID();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function Insert_SPTblInventario($datosainsertar)
    {
        try {
          $titulo = $datosainsertar['inv_titulo'];
          $descripcion = $datosainsertar['inv_descripcion'];

          $variable = $this->db->
          query('CALL SP_INSERTAR_INVENTARIO(?, ?)', 
          array($titulo, $descripcion));
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function Insert_SPTblUsuario($datosainsertar)
    {
        try {
          $nombre = $datosainsertar['usu_nombre'];
          $apellido = $datosainsertar['usu_apellido'];

          $variable = $this->db->
          query('CALL SP_INSERTAR_USUARIO(?, ?)', 
          array($nombre, $apellido));
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


    public function Obtener_Usuario_Por_Id($id)
    {
        return $this->db->table('tbl_usuario')->where('usu_id', $id)->get()->getRow();
    }

    public function Actualizar_TblUsuario($usuario_id, $datosactualizar)
    {
        try {
            $table = $this->db->table('tbl_usuario');
            $table->where('usu_id', $usuario_id);
            $table->update($datosactualizar);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function Eliminar_TblUsuario($usuario_id)
    {
        try {
            $table = $this->db->table('tbl_usuario');
            $table->where('usu_id', $usuario_id);
            $table->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


    public function Obtener_Inventario_Por_Id($id)
    {
        return $this->db->table('tbl_inventario')->where('inv_id', $id)->get()->getRow();
    }
    public function Actualizar_TblInventario($inv_id, $datosactualizar)
    {
        try {
            $table = $this->db->table('tbl_inventario');
            $table->where('inv_id', $inv_id);
            $table->update($datosactualizar);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function Eliminar_TblInventario($inv_id)
    {
        try {
            $table = $this->db->table('tbl_inventario');
            $table->where('inv_id', $inv_id);
            $table->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}

// Hay que agregar al controlador el use App\Models\Nombre de la clase modelo;