<?php
//Este arquivo : arquivo de controle -> tipo de serviços
  include 'produto.php';
  class ProdutoService{
      //Um método (serviço) para consulta de dados
      public function get($id = null){
        if ($id){//se existe id, chama a operação: select($id)
            return produto::select($id);
        }
        else{// se não existe id, chame a operação: selectAll()
            return produto::selectAll();
        }
      }
      //Um método (serviço) para inserção de dados: post -> protocolo para enviar 
      public function post()
      {  
         // transformar os dados formato json para texto normal
         $dados = json_decode(file_get_contents('php://input'),true,512);         
         if ($dados == null){
            throw new Exception("Faltou as informações para incluir !");
         }
         return produto::insert($dados);
      }
      //Um método (serviço) para exclusão de dados: 
      public function delete($id = null)
      {               
         if ($id == null){
            throw new Exception("Faltou o código !");
         }
         return produto::delete($id);
      }
      //Um método (serviço) para alteração de dados: put -> protocolo para alterar 
      public function put($id = null)
      {  
         if ($id == null){
             throw new Exception("Faltou o código!");
         }
         else {
            //Dados recebidos em formato JSON:
            //Transformar os dados em formato json para texto normal (para BD)
            $dados = json_decode(file_get_contents('php://input'),true,512);         
            if ($dados == null){
               throw new Exception("Faltou as informações para alterar !");
            }
            else {
               return produto::alterar($id,$dados);
            }
         }
  }
}

?>