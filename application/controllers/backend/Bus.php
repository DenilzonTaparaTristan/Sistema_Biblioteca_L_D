<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libros extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('getkod_model');
        date_default_timezone_set("America/Lima");
    }

    // Página principal de gestión de libros
    public function index(){
        // Validar que las variables existen o establecer datos ficticios
        $data['title'] = "Gestión de Libros";
        $data['libros'] = $this->db->query("SELECT * FROM tbl_libros ORDER BY titulo_libro ASC")->result_array();
        
        // Si no hay datos, agregar un placeholder para la vista
        if (empty($data['libros'])) {
            $data['libros'] = [
                [
                    'id_libro' => '001',
                    'titulo_libro' => 'Libro Ejemplo 1',
                    'autor_libro' => 'Autor Ejemplo',
                    'categoria_libro' => 'Categoría General',
                    'estado_libro' => 'Disponible'
                ],
                [
                    'id_libro' => '002',
                    'titulo_libro' => 'Libro Ejemplo 2',
                    'autor_libro' => 'Autor Ejemplo 2',
                    'categoria_libro' => 'Categoría Infantil',
                    'estado_libro' => 'No Disponible'
                ]
            ];
        }

        $this->load->view('backend/libros', $data);
    }

    // Ver detalles de un libro específico
    public function verLibro($id=''){
        $data['title'] = "Ver Libro";

        // Validar si el libro existe o usar datos ficticios
        $data['libro'] = $this->db->query("SELECT * FROM tbl_libros WHERE id_libro = '".$id."'")->row_array();
        if (empty($data['libro'])) {
            $data['libro'] = [
                'id_libro' => '001',
                'titulo_libro' => 'Libro Ejemplo',
                'autor_libro' => 'Autor Ejemplo',
                'categoria_libro' => 'Categoría General',
                'estado_libro' => 'Disponible'
            ];
        }

        $this->load->view('backend/ver_libro', $data);
    }

    // Añadir un nuevo libro
    public function agregarLibro(){
        // Mantener la funcionalidad de agregar libro sin cambios
        $codigo = $this->getkod_model->get_kodlibro(); // Generar un código único para el libro
        $data = array(
            'id_libro' => $codigo,
            'titulo_libro' => $this->input->post('titulo_libro'),
            'autor_libro'  => $this->input->post('autor_libro'),
            'categoria_libro' => $this->input->post('categoria_libro'),
            'estado_libro' => '1' // 1 = disponible
        );
        $this->db->insert('tbl_libros', $data); // Insertar datos en la tabla tbl_libros
        $this->session->set_flashdata('message', 'swal("Éxito", "Libro agregado correctamente", "success");');
        redirect('backend/libros');
    }
}
