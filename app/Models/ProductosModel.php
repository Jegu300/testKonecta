<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model{
  
  	protected $table      = 'productos';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['referencia', 
                                'nombreProducto',
                                'precio',
                                'peso',
                                'categoria',
                                'stock',
                                'estado'];
    protected $useTimestamps = true;
    protected $createdField  = 'fechaCreacion';
    protected $updatedField  = 'fechaEdicion';
    protected $deletedField  = 'fechaEliminacion';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function ListarProductos(){
        $activo = 1;
        $this->where('estado',$activo)->findAll();
    }

 }