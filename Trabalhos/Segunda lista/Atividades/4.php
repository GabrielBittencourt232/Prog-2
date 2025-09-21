<?php

// Classe base abstrata
abstract class Notificacao {
    abstract public function enviar();
}

// Subclasses concretas
class Email extends Notificacao {
    public function enviar() {
        echo "Enviando notificação por E-mail.\n";
    }
}

class SMS extends Notificacao {
    public function enviar() {
        echo "Enviando notificação por SMS.\n";
    }
}

class Push extends Notificacao {
    public function enviar() {
        echo "Enviando notificação Push.\n";
    }
}

// Demonstração
$notificacaoEmail = new Email();
$notificacaoSms = new SMS();
$notificacaoPush = new Push();

$notificacaoEmail->enviar();
$notificacaoSms->enviar();
$notificacaoPush->enviar();

?>