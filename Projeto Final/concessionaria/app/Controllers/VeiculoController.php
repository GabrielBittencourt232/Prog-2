<?php namespace Controllers;

use Models\Veiculo;
use Exception;

// [Conceito POO: Herança - VeiculoController herda funcionalidades da classe base Controller] [cite: 3477]
    class VeiculoController extends Controller {

    // Altere a injeção para o objeto ser de Repository, não de Entity (Veiculo)
    private \Core\Repositorio $model; 

    public function __construct() {
        $this->model = new Veiculo('Repo', 'Base', 2000, 1.00, 'Nenhuma', 0);
    }


    // Rota: /veiculo/index (Listar todos)
    public function index(): void {
        $veiculos = $this->model->listar();
        $this->view('veiculos/index', ['veiculos' => $veiculos]); // Carrega a View de listagem
    }

    // Rota: /veiculo/create (Exibir formulário de criação)
    public function create(): void {
        $this->view('veiculos/form');
    }

    // Rota: /veiculo/edit/{id} (Exibir formulário de edição)
    public function edit(int $id): void {
        $veiculo = $this->model->buscarPorId($id);
        if ($veiculo) {
            $this->view('veiculos/form', ['veiculo' => $veiculo]); // Passa o objeto Veiculo para o formulário
        } else {
            $this->view('404'); 
        }
    }

    // Rota: /veiculo/save (Processar CREATE ou UPDATE)
    public function save(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /veiculo/index');
            return;
        }

        try {
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $marca = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_STRING);
            $modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);
            $ano = filter_input(INPUT_POST, 'ano', FILTER_VALIDATE_INT);
            $preco = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);
            $cor = filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_STRING);
            $quilometragem = filter_input(INPUT_POST, 'quilometragem', FILTER_VALIDATE_INT);
            
            // Cria um novo objeto Veiculo com os dados validados
            $veiculo = new Veiculo($marca, $modelo, $ano, $preco, $cor, $quilometragem, $id);
            
            if ($this->model->salvar($veiculo)) {
                $this->model->registrarLog("Veículo ID: {$veiculo->getId()} salvo com sucesso.");
                header('Location: /veiculo/index?msg=sucesso');
            } else {
                header('Location: /veiculo/index?msg=erro_bd');
            }
        } catch (Exception $e) {
            $this->model->registrarLog("Erro de validação: " . $e->getMessage(), 'WARN');
            header('Location: /veiculo/index?msg=' . urlencode($e->getMessage()));
        }
    }

    // Rota: /veiculo/delete/{id}
    public function delete(int $id): void {
        if ($this->model->deletar($id)) {
            $this->model->registrarLog("Veículo ID: $id deletado com sucesso.");
            header('Location: /veiculo/index?msg=deletado');
        } else {
            header('Location: /veiculo/index?msg=erro_delete');
        }
    }
}