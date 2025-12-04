<?php
// executa a conexao com o banco de dados 
include_once '../includes/conexao.php';
include_once '../includes/logado.php';

$sesUsuario = $_SESSION['Usuario'];

// criar o sql que captura as preferencias 
$sql = "SELECT 
            u.UsuarioID,
            u.Usuario,
            u.Imagem,
            u.Latitude,
            u.Longitude,
            u.Endereco,
            u.Distancia,
            GROUP_CONCAT(up.PreferenciaID ORDER BY up.Ordem ASC) AS Preferencias,
            (
                6371 * ACOS(
                    COS(RADIANS(".$sesUsuario['Latitude'].")) 
                    * COS(RADIANS(u.Latitude)) 
                    * COS(RADIANS(u.Longitude) - RADIANS(".$sesUsuario['Longitude']."))
                    + SIN(RADIANS(".$sesUsuario['Latitude'].")) 
                    * SIN(RADIANS(u.Latitude))
                )
            ) AS DistanciaUsuarioComPessoas,
            (
                SELECT COUNT(*) 
                FROM usuarios_preferencias up2
                WHERE up2.UsuarioID = u.UsuarioID
                AND up2.PreferenciaID IN (
                    SELECT PreferenciaID 
                    FROM usuarios_preferencias 
                    WHERE UsuarioID = ".$sesUsuario['UsuarioID']."
                )
            ) AS AfinidadePreferencias

        FROM usuarios AS u
        LEFT JOIN usuarios_preferencias AS up 
            ON up.UsuarioID = u.UsuarioID

        WHERE u.UsuarioID <> ".$sesUsuario['UsuarioID']."
        
        GROUP BY u.UsuarioID

        HAVING 
            DistanciaUsuarioComPessoas <= ".$sesUsuario['Distancia']."
            AND DistanciaUsuarioComPessoas <= u.Distancia

        ORDER BY 
            DistanciaUsuarioComPessoas ASC,
            AfinidadePreferencias DESC;";


// executa o comando e retorna as informacoes
$resultado = mysqli_query($conexao,$sql);

// cria um array
$colecao = array();

// laco que cria o novo array com os dados
while ($dados = mysqli_fetch_assoc($resultado)) {
    array_push($colecao,$dados);
}

// define como json
header('Content-Type: application/json');

// cria o json
exit(json_encode($colecao));
?>