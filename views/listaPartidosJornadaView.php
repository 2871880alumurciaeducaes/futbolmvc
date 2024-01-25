<?php include_once("common/cabecera.php"); ?>

<body>
    <?php include_once("common/menu.php"); ?>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Local</th>
                <th scope="col">Goles Local</th>
                <th scope="col">Goles Visitante</th>
                <th scope="col">Visitante</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <?php

        // $partidos es una variable asignada desde el controlador partidoController.
        foreach ($partidos as $partido) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $partido->getLocalId() ?></td>
                    <td><?php echo $partido->getMarcadorLocal() ?></td>
                    <td><?php echo $partido->getMarcadorVisitante() ?></td>
                    <td><?php echo $partido->getVisitanteId() ?></td>
                    <td><?php echo $partido->getEstado() ?></td>
                    <td><a href="index.php?controlador=Partido&accion=Editar&partido_id=<?php echo $partido->getPartidoId() ?>">Editar</a>
                    </td>
                    <td><a href="index.php?controlador=Partido&accion=Borrar&partido_id=<?php echo $partido->getPartidoId() ?>">Borrar</a>
                    </td>
                </tr>
            <?php
        }
            ?>
            </tbody>
    </table>
    <a href="index.php?controlador=partido&accion=Nuevo">Nuevo</a>

    <?php include_once("common/pie.php"); ?>

</body>

</html>