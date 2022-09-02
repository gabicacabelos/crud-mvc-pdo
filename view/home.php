<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Resources/css/materialize.css">
    <link rel="stylesheet"  href="Resources/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col m12">
                <div class="card black z-depth-3 white-text center-align">
                    <h2>Lista de Zapatos</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col m12">
                <table class="table-responsive z-depth-3  ">
                    
                        <tr class="black">
                            <th class="white-text center-align">Id</th>
                            <th class="white-text center-align">Precio</th>
                            <th class="white-text center-align">Color</th>
                            <th class="white-text center-align">Estilo</th>
                            <th class="white-text center-align">Talla</th>
                            <th class="white-text center-align">Genero</th>
                            <th class="white-text center-align">Cantidad</th>
                            <th class="white-text center-align">⚠️</th>
                            <th class="white-text center-align">🖥️</th>
                        </tr>
                        <?php foreach($this->MODEL->listar() as $k) : ?>

                        <tr class="td">
                            <td class="center-align"><?php echo $k->id_zapato; ?></td>
                            <td class="center-align">$<?php echo $k->precio; ?></td>
                            <td class="center-align"><?php echo $k->color; ?></td>
                            <td class="center-align"><?php echo $k->estilo; ?></td>
                            <td class="center-align"><?php echo $k->talla; ?></td>
                            <td class="center-align"><?php echo $k->genero; ?></td>
                            <td class="center-align"><?php echo $k->cantidad; ?></td>
                            <td class="center-align"><a href="?c=eliminar&id=<?php echo $k->id_zapato; ?>" class="btn red">Eliminar</a></td>
                            <td class="center-align"><a href="?c=nuevo&id=<?php echo $k->id_zapato; ?>" class="btn blue">Actualizar</a></td>
                        </tr>
                        <?php endforeach; ?>
                </table>
                <a href="?c=nuevo" class="btn btn-block">☑️Nuevo</a>

            </div>

    </div>

    </div>

    
</body>
</html>