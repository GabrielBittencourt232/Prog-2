<?php namespace Controllers;

class HomeController extends Controller {
    public function index(): void {
        // Carrega a view home/index.php
        $this->view('home/index', ['title' => 'Concessionária - Início']);
    }
}