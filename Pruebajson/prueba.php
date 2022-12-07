<?php
function mostrardatos(){
    $url = "https://images-api.nasa.gov/search?q=apollo%2011";
    $datos = getSslPage($url);
    $datos = json_decode($datos);
     $rs= $datos->collection;
    foreach($rs as $notas){
        echo "<tr>
            <td><img src='{$notas->links->href}'></td>
            <td>{$notas->items->data->title}</td>
            <td>{$notas->items->data->keywords->decription}</td>



        </tr>";
    }

}
            
?>
<?php
function getSslPage($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $RESULT = CURL_EXEC($ch);
    curl_close($ch);
    return $RESULT;

   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pruebajson</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="./CSS/bootstrap.min (1).css"/>
</head>
<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <td>Imagen</td>
                    <td>Titulo</td>
                    <td>Descripción</td>
                </tr>
            </thead>
        </table>
        <tbody>
            <?php
            mostrardatos();
            
            ?>

        </tbody>

    </div>
    <script src="funciones.js"></script>
</body>
</html>
