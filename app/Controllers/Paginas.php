<?php 
class Paginas extends Controller {

    public function index(){

        if (Sessao::usuarioLogado()) {
            URL::redirecionar('produtos');
        }

        $dados = [
            'tituloPagina' => 'Página Inicial'
        ];
        // Chama a view e envia os dados para ela.
        $this->view('paginas/home', $dados);
    }

    public function sobre(){
        $dados = [
            'titulo' => 'Precificação'
        ];
        // Chama a view e envia os dados para ela.
        $this->view('paginas/sobre', $dados);
    }
}
