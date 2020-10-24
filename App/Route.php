<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

  protected function initRoutes() {
    
    // Rotas pagina inicial
    $routes['home'] = array(
      'route' => '/',
      'controller' => 'indexController',
      'action' => 'index'
    );

    $routes['paginaInicial'] = array(
      'route' => '/home',
      'controller' => 'indexController',
      'action' => 'home'
    );

    $routes['autenticar'] = array(
      'route' => '/autenticar',
      'controller' => 'UsuariosController',
      'action' => 'autenticar'
    );
    

    // ROtas Mensagens
    $routes['MensagemInserido'] = array(
      'route' => '/MensagemInserido',
      'controller' => 'MensagemController',
      'action' => 'inserido'
    );

    $routes['MensagemAlterado'] = array(
      'route' => '/MensagemAlterado',
      'controller' => 'MensagemController',
      'action' => 'alterado'
    );

    $routes['MensagemExcluido'] = array(
      'route' => '/MensagemExcluido',
      'controller' => 'MensagemController',
      'action' => 'excluido'
    );


    // ROtas Funcionário
    $routes['cadastroFuncionarios'] = array(
      'route' => '/CadastroFuncionarios',
      'controller' => 'UsuariosController',
      'action' => 'CadastroFuncionario'
    );

    $routes['DadosFuncionario'] = array(
      'route' => '/DadosFuncionario',
      'controller' => 'UsuariosController',
      'action' => 'DadosFuncionario'
    );
    
    $routes['localizarFuncionarios'] = array(
      'route' => '/LocalizarFuncionarios',
      'controller' => 'UsuariosController',
      'action' => 'LocalizarFuncionario'
    );

    $routes['InserirFuncionario'] = array(
      'route' => '/inserirFuncionario',
      'controller' => 'UsuariosController',
      'action' => 'inserirFuncionario'
    );

    $routes['AlterarFuncionario'] = array(
      'route' => '/AlterarFuncionario',
      'controller' => 'UsuariosController',
      'action' => 'AlterarFuncionario'
    );

    $routes['ExcluirFuncionario'] = array(
      'route' => '/ExcluirFuncionario',
      'controller' => 'UsuariosController',
      'action' => 'excluirFuncionario'
    );

    
    // Rotas plano de saúde
    $routes['cadastroPlanos'] = array(
      'route' => '/CadastroPlanos',
      'controller' => 'PlanosController',
      'action' => 'CadastroPlanos'
    );

    $routes['DadosPlanos'] = array(
      'route' => '/DadosPlanos',
      'controller' => 'PlanosController',
      'action' => 'DadosPlanos'
    );
    
    $routes['localizarPlanos'] = array(
      'route' => '/LocalizarPlanos',
      'controller' => 'PlanosController',
      'action' => 'LocalizarPlanos'
    );

    $routes['InserirPlanos'] = array(
      'route' => '/inserirPlanos',
      'controller' => 'PlanosController',
      'action' => 'inserirPlanos'
    );

    $routes['AlterarPlanos'] = array(
      'route' => '/AlterarPlanos',
      'controller' => 'PlanosController',
      'action' => 'AlterarPlanos'
    );

    $routes['ExcluirPlanos'] = array(
      'route' => '/ExcluirPlanos',
      'controller' => 'PlanosController',
      'action' => 'excluirPlanos'
    );


    // Rotas de Especialidades
    $routes['cadastroEspecialidade'] = array(
      'route' => '/CadastroEspecialidade',
      'controller' => 'EspecialidadeController',
      'action' => 'CadastroEspecialidade'
    );

    $routes['DadosEspecialidade'] = array(
      'route' => '/DadosEspecialidade',
      'controller' => 'EspecialidadeController',
      'action' => 'DadosEspecialidade'
    );
    
    $routes['localizarEspecialidade'] = array(
      'route' => '/LocalizarEspecialidade',
      'controller' => 'EspecialidadeController',
      'action' => 'LocalizarEspecialidade'
    );

    $routes['InserirEspecialidade'] = array(
      'route' => '/inserirEspecialidade',
      'controller' => 'EspecialidadeController',
      'action' => 'inserirEspecialidade'
    );

    $routes['AlterarEspecialidade'] = array(
      'route' => '/AlterarEspecialidade',
      'controller' => 'EspecialidadeController',
      'action' => 'AlterarEspecialidade'
    );

    $routes['ExcluirEspecialidade'] = array(
      'route' => '/ExcluirEspecialidade',
      'controller' => 'EspecialidadeController',
      'action' => 'excluirEspecialidade'
    );    
    

    // Rotas Convenio
    $routes['cadastroConvenio'] = array(
      'route' => '/CadastroConvenio',
      'controller' => 'ConvenioController',
      'action' => 'CadastroConvenio'
    );

    $routes['DadosConvenio'] = array(
      'route' => '/DadosConvenio',
      'controller' => 'ConvenioController',
      'action' => 'DadosConvenio'
    );
    
    $routes['localizarConvenio'] = array(
      'route' => '/LocalizarConvenio',
      'controller' => 'ConvenioController',
      'action' => 'LocalizarConvenio'
    );

    $routes['InserirConvenio'] = array(
      'route' => '/inserirConvenio',
      'controller' => 'ConvenioController',
      'action' => 'inserirConvenio'
    );

    $routes['AlterarConvenio'] = array(
      'route' => '/AlterarConvenio',
      'controller' => 'ConvenioController',
      'action' => 'AlterarConvenio'
    );

    $routes['ExcluirConvenio'] = array(
      'route' => '/ExcluirConvenio',
      'controller' => 'ConvenioController',
      'action' => 'excluirConvenio'
    );    


    // Rotas Clinica
    $routes['cadastroClinica'] = array(
      'route' => '/CadastroClinica',
      'controller' => 'ClinicaController',
      'action' => 'CadastroClinica'
    );

    $routes['DadosClinica'] = array(
      'route' => '/DadosClinica',
      'controller' => 'ClinicaController',
      'action' => 'DadosClinica'
    );
    
    $routes['localizarClinica'] = array(
      'route' => '/LocalizarClinica',
      'controller' => 'ClinicaController',
      'action' => 'LocalizarClinica'
    );

    $routes['InserirClinica'] = array(
      'route' => '/inserirClinica',
      'controller' => 'ClinicaController',
      'action' => 'inserirClinica'
    );

    $routes['AlterarClinica'] = array(
      'route' => '/AlterarClinica',
      'controller' => 'ClinicaController',
      'action' => 'AlterarClinica'
    );

    $routes['ExcluirClinica'] = array(
      'route' => '/ExcluirClinica',
      'controller' => 'ClinicaController',
      'action' => 'excluirClinica'
    );


    // Rotas Pacientes
    $routes['cadastroPaciente'] = array(
      'route' => '/CadastroPaciente',
      'controller' => 'PacienteController',
      'action' => 'CadastroPaciente'
    );

    $routes['DadosPaciente'] = array(
      'route' => '/DadosPaciente',
      'controller' => 'PacienteController',
      'action' => 'DadosPaciente'
    );
    
    $routes['localizarPaciente'] = array(
      'route' => '/LocalizarPaciente',
      'controller' => 'PacienteController',
      'action' => 'LocalizarPaciente'
    );

    $routes['InserirPaciente'] = array(
      'route' => '/inserirPaciente',
      'controller' => 'PacienteController',
      'action' => 'inserirPaciente'
    );

    $routes['AlterarPaciente'] = array(
      'route' => '/AlterarPaciente',
      'controller' => 'PacienteController',
      'action' => 'AlterarPaciente'
    );

    $routes['ExcluirPaciente'] = array(
      'route' => '/ExcluirPaciente',
      'controller' => 'PacienteController',
      'action' => 'excluirPaciente'
    );


    // Rotas Prestadores
    $routes['cadastroPrestador'] = array(
      'route' => '/CadastroPrestador',
      'controller' => 'PrestadorController',
      'action' => 'CadastroPrestador'
    );

    $routes['DadosPrestador'] = array(
      'route' => '/DadosPrestador',
      'controller' => 'PrestadorController',
      'action' => 'DadosPrestador'
    );
    
    $routes['localizarPrestador'] = array(
      'route' => '/LocalizarPrestador',
      'controller' => 'PrestadorController',
      'action' => 'LocalizarPrestador'
    );

    $routes['InserirPrestador'] = array(
      'route' => '/inserirPrestador',
      'controller' => 'PrestadorController',
      'action' => 'inserirPrestador'
    );

    $routes['AlterarPrestador'] = array(
      'route' => '/AlterarPrestador',
      'controller' => 'PrestadorController',
      'action' => 'AlterarPrestador'
    );

    $routes['ExcluirPrestador'] = array(
      'route' => '/ExcluirPrestador',
      'controller' => 'PrestadorController',
      'action' => 'excluirPrestador'
    );


    // Rotas MatMed
    $routes['cadastroMatMed'] = array(
      'route' => '/cadastroMatMed',
      'controller' => 'MatMedController',
      'action' => 'CadastroMatMed'
    );

    $routes['DadosMatMed'] = array(
      'route' => '/DadosMatMed',
      'controller' => 'MatMedController',
      'action' => 'DadosMatMed'
    );
    
    $routes['localizarMatMed'] = array(
      'route' => '/LocalizarMatMed',
      'controller' => 'MatMedController',
      'action' => 'LocalizarMatMed'
    );

    $routes['InserirMatMed'] = array(
      'route' => '/inserirMatMed',
      'controller' => 'MatMedController',
      'action' => 'inserirMatMed'
    );

    $routes['AlterarMatMed'] = array(
      'route' => '/AlterarMatMed',
      'controller' => 'MatMedController',
      'action' => 'AlterarMatMed'
    );

    $routes['ExcluirMatMed'] = array(
      'route' => '/ExcluirMatMed',
      'controller' => 'MatMedController',
      'action' => 'excluirMatMed'
    );        


    $this->setRoutes($routes);
  }

}

?>