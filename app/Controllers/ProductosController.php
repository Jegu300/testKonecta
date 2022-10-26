<?php

namespace App\Controllers;
use App\Models\ProductosModel;


class ProductosController extends BaseController {

    protected $reglas;

    function __construct(){
        $this->productos = new ProductosModel();
        helper(['form']);


        $this->reglas=[
            'referencia'=>[
                'rules'=>'required|is_unique[productos.referencia,id,{id_act}]',
                'errors'=>[
                    'required'=> 'El campo Referencia es obligatorio.',
                    'is_unique'=> 'El campo Referencia debe ser unico.'
                ]
            ],
            'nombre'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'El campo nombre es obligatorio.'
                ]
            ],
            'precio'=>[
                'rules'=>'required|integer',
                'errors'=>[
                    'required'=> 'El campo Precio es obligatorio.',
                    'integer'=> 'El campo Precio debe ser un número entero.'
                ]
            ],

            'peso'=>[
                'rules'=>'required|integer',
                'errors'=>[
                    'required'=> 'El campo Peso es obligatorio.',
                    'integer'=> 'El campo Peso debe ser un número entero.'
                ]
            ],

            'categoria'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'El campo Categoria es obligatorio.'
                ]
            ],

            'stock'=>[
                'rules'=>'required|integer',
                'errors'=>[
                    'required'=> 'El campo Stock es obligatorio.',
                    'integer'=> 'El campo Stock debe ser un númreo entero.'
                ]
            ]   
        ];
    
    }


    public function index($validar=null) {

        $data = [ 
            'validation' => $validar,
            'listarProductos' =>  $this->productos->where('estado',1)->findAll()
        ];


        echo view('head');
        echo view('nav');
        echo view('inicio', $data);
        echo view('script');
        echo view('footer');
    }

    public function agregar() {

        if ($this->request->getMethod() == 'post' && $this->validate($this->reglas)) {
         
            $data = [
                'referencia'    => $this->request->getPost('referencia'),
                'nombreProducto'=> $this->request->getPost('nombre'),
                'precio'        => $this->request->getPost('precio'),
                'categoria'     => $this->request->getPost('categoria'),
                'peso'     => $this->request->getPost('peso'),
                'stock'         => $this->request->getPost('stock'),
                'estado'        => 1
            ];
            $this->productos->insert($data);
            $this->index();
        
        }else{
            $this->index($this->validator);
        }

    }


    public function obtenerDatosId($id=null,$valid=null){
        
        if ($id) {
           
            
            if ($valid != null) {   
                $data = ['datos'=>$sqlEdi,'validation'=>$valid];
            }else{
                $data = ['datos'=>$sqlEdi];
            }
            echo view('./header');       
            echo view('productos/editar', $data);        
            echo view('./footer');
        }else{
            echo view('error/error_parametrosGet'); 
            exit();
        }   
    }


    public function actualizar($id=null){
        if ($this->request->getMethod() === 'get' ) {

            $data = ['datosEditar'=> $this->productos->where('id',$id)->first()];
            echo view('head');
            echo view('nav');
            echo view('editar', $data);
            echo view('script');
            echo view('footer'); 
        }else{

            if ($this->request->getMethod() === 'post' && $this->validate($this->reglas)) {
                $id= $this->request->getPost('id_act'); 
                $data = [
                    'referencia'    => $this->request->getPost('referencia'),
                    'nombreProducto'=> $this->request->getPost('nombre'),
                    'precio'        => $this->request->getPost('precio'),
                    'categoria'     => $this->request->getPost('categoria'),
                    'peso'     => $this->request->getPost('peso'),
                    'stock'         => $this->request->getPost('stock'),
                    'estado'        => 1
                ];

                $this->productos->set($data);
                $this->productos->where('id', $id);
                $this->productos->update();
                $this->index();
            }else{
                $this->index($this->validator);
            }
        }
    }

    public function eliminar($id){

        if ($this->request->getMethod() == 'get' && isset($id)) {
            $this->productos->update($id, [ "estado" => 0  ]);
            $this->index(); 
        }
    }



}
