<?php $title = "Bem-vindo à Concessionária SimbiCar"; ?>

<div class="hero-section text-center"> <div class="container-fluid py-5">
        <h1 class="display-5">Catálogo de Veículos</h1>
        <p class="fs-4 mt-4">
            Este sistema foi desenvolvido usando PHP, o padrão MVC e os princípios de Orientação a Objetos (Encapsulamento, Composição, Traits e PDO).
        </p>
        <p>
            Explore nossa frota, gerencie o estoque e veja os detalhes de cada veículo.
        </p>
        <a href="/veiculo/index" class="btn btn-primary btn-lg mt-3" type="button">
            Ver Catálogo de Veículos →
        </a>
    </div>
</div>

<div class="row g-4"> <div class="col-md-4">
        <div class="feature-card"> <h2>Estrutura MVC</h2>
            <p>Separamos o projeto em Model, View e Controller para manter a organização e a manutenibilidade do código.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="feature-card">
            <h2>POO Aplicada</h2>
            <p>Utilizamos Encapsulamento, Traits e Composição (Veículo & Placa) para modelar o sistema com fidelidade ao mundo real.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="feature-card">
            <h2>Persistência Segura</h2>
            <p>A gestão de dados é feita através de Prepared Statements via PDO, garantindo a segurança contra SQL Injection.</p>
        </div>
    </div>
</div>