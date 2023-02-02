<?php
    class Conexao{

        public function __construct(){

        }

        public function Conectar(){
            try{
                $conn = mysqli_connect('localhost','root','','phpCrud');
                if($conn){
                    echo "<br><br>Conectado com sucesso!";
                    return $conn;
                }
            }catch(Except $erro)
            {
                echo $erro;
            }
        }//fim do conectar

        public function Insert(string $nomeDaTabela, string $nome, string $celular){
            //Inserir
            try{
                $conn = $this->Conectar();
                $sql = "insert into $nomeDaTabela(codigo, nome, telefone) values ('','$nome','$celular')";
                $result = mysqli_query($conn,$sql);
                
                if($result){
                    return "<br><br>Inserido com sucesso!";
                }else{
                    return "<br><br>Não inserido!";
                }   

                mysqli_close($conn);
            }catch(Exception $erro){
                echo $erro;
            }
        }//fim do inserir

        public function Atualizar(string $nomeDaTabela, int $codigo, string $campo, string $valor){
            //Atualizar
            try{
                $conn = $this->Conectar();
                $sql = "update $nomeDaTabela set $campo = '$valor' where codigo = $codigo";
                $result = mysqli_query($conn,$sql);

                if($result){
                    return "<br><br>Atualizado com Sucesso!";
                }else{
                    return "<br><br>Não Atualizado!";
                }

                mysqli_close($conn);
            }catch(Except $erro){
                echo $erro;
            }
        }//fim do Atualizar

        public function Consultar(string $nomeDaTabela, int $codigo){
            //Consultar
            try{
                $conn = $this->Conectar();
                $sql = "select * from $nomeDaTabela where codigo = '$codigo'";
                $result = mysqli_query($conn, $sql);
                
                while($dados = mysqli_fetch_Array($result)){
                    if($dados["codigo"] == $codigo){
                        echo "<br><br>Código:  ".$dados["codigo"]."<br>Nome: ".$dados["nome"]."<br>Telefone: ".$dados["telefone"];
                    }
                }//fim do while

                mysqli_close($conn);
            }catch(Except $erro){
                echo $erro;
            }
        }//fim do Consultar

        public function ConsultarTudo(string $nomeDaTabela){
            //Consultar
            try{
                $conn = $this->Conectar();
                $sql = "select * from $nomeDaTabela";
                $result = mysqli_query($conn, $sql);
                
                while($dados = mysqli_fetch_Array($result)){
                    echo "<br><br>Código:  ".$dados["codigo"]."<br>Nome: ".$dados["nome"]."<br>Telefone: ".$dados["telefone"];
                }//fim do while

                mysqli_close($conn);
            }catch(Except $erro){
                echo $erro;
            }
        }//fim do Consultar

        public function Excluir(string $nomeDaTabela, int $codigo){
            //Excluir
            try{
                $conn = $this->Conectar();
                $sql = "delete from $nomeDaTabela where codigo = $codigo";
                $result = mysqli_query($conn,$sql);

                if($result){
                    return "<br><br>Excluido com sucesso!";
                }else{
                    return "<br><br>Não consultado!";
                }

                mysqli_close($conn);
            }catch(Except $erro){
                echo $erro;
            }
        }//fim do Excluir
    }//fim da conexão



    $conectar = new Conexao();
    echo $conectar->Insert("pessoa","Gabriela","970881705");
    echo $conectar->Atualizar("pessoa", 11, "nome","Manoel");
    
    echo $conectar->Consultar("pessoa",10);
    echo $conectar->ConsultarTudo("pessoa");

    echo $conectar->Excluir("pessoa",2);
?>