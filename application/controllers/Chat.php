<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
    public function index() {
        $this->load->view('chat_view'); // Carga la vista del chat
    }
}
