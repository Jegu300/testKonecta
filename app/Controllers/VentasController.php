<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductosModel;


class VentasController extends BaseController{

    protected $ventas, $temporalventas, $detalleVentas, $productos, $configuracion, $clientes, $tipoPago, $detallesPermisos; 
    protected $reglasVenta; 

    function __construct(){
        // $this->ventas = new VentasModel();
        // $this->detalleVentas = new DetalleVentasModel();
        $this->productos = new ProductosModel();

        helper(['form']);
        
    }

    function index(){
       
        $resultSql = $this->ventas->obtener(1);
    
        $data = ['titulo'=> 'VENTAS', 'datos' => $resultSql];
        echo view('header');         
        echo view('ventas/ventas', $data);       
        echo view('footer');         
        
    }


    public function ingresoCaja(){
   
        echo view('head');       
        echo view('nav');       
        echo view('facturacion');         
        echo view('script');  
    
    }



    public function autoCompletar(){

        $returnData = array();
        $valor= $this->request->getVar('term'); 
        // $valor = $this->request->getPost('term');
        $productos = $this->productos->like('id', $valor)->orLike('referencia', $valor )->where('activo', 1)->findAll();
        if (!empty($productos)) {
            foreach ($productos as  $value) {
                $data['id'] = $value['id']; 
                $data['value'] = $value['id']; 
                $data['label'] = $value['id'].'-'.$value['nombreProducto']; 
                array_push($returnData, $data);
            }
        }
        echo json_encode($returnData);
    }

}
