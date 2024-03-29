<?php 

/**
 * autoload - Responsável pelo carregamento automático das classes
 */

 //a função spl_autoload_register() registra qualquer número de autoloaders, permitindo que classes e interfaces sejam automaticamente carregadas
spl_autoload_register(function ($classe){
    //Lista de diretorios para buscar as classes
    $diretorios = [
        'Libraries',
        'Helpers'
    ];

    //Percorre os diretorios em busca das classes
    foreach($diretorios as $diretorio){
        //a constamte __DIR__ retorna o diretório do arquivo
        //DIRECTORY_SEPARATOR é o separador utilizado para percorrer diretórios
        $arquivo = (__DIR__ . DIRECTORY_SEPARATOR . $diretorio . DIRECTORY_SEPARATOR . $classe . '.php');
        //verifica se o arquivo de classe existe
        if (file_exists($arquivo)){
            //inclui o arquivo de classe
            require_once $arquivo;
        }

    }
});

?>