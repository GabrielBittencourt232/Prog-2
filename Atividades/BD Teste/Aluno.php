<?php
class Aluno extends Modelo implements Repositorio {
private $nome;
private $idade;
private $email;
private $curso;
// Implementação do método abstrato
public function validar() {
if (empty($this->nome) || empty($this->email)) {
throw new Exception("Nome e email são obrigatórios");
}
if ($this->idade < 16 || $this->idade > 100) {
throw new Exception("Idade deve estar entre 16 e 100 anos");
}
if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
throw new Exception("Email inválido");
}
return true;
}
// Implementação dos métodos da interface Repositorio
public function salvar($obj) { /* código do slide 10 */ }
public function listar() { /* código do slide 11 */ }
public function buscarPorId($id) { /* implementar */ }
public function atualizar($obj) { /* implementar */ }
public function deletar($id) { /* implementar */ }
// Getters e Setters...
}

?>
