<?php

// conexao
$servidor = 'localhost';
$banco = 'biblioteca';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$titulo = $_GET['titulo'];
$idioma = $_GET['idioma'];
$editora = $_GET['editora'];
$paginas = $_GET['qtd_pag'];
$data = $_GET['data_pub'];
$isbn = $_GET['isbn'];


echo "Conectado!<br>";

echo "Recebido: <br>";
echo $_GET['titulo'];
echo "<br>";
echo $_GET['editora'];

$codigoSQL = "INSERT INTO `livros` (`id`, `titulo`, `idioma`, `editora`, `paginas`, `publicacao`, `isbn`) VALUES (NULL, :tit, :id, :ed, :pag, :pub, :isbn)";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('tit' => $titulo, 'id' => $idioma, 'ed' => $editora, 'pag' => $paginas, 'pub' => $data, 'isbn' => $isbn));
 
    if($resultado) {
	echo "Comando executado!";
    } else {
	echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;

?>