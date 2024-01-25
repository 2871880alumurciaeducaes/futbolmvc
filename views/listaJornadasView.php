<?php include_once("common/cabecera.php"); ?>

<body>
    <?php include_once("common/menu.php"); ?>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">FECHA</th>
            </tr>
        </thead>
        <?php

        // $jornadas es una variable asignada desde el controlador jornadaController.
        foreach ($jornadas as $jornada) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $jornada->getJornada_ID() ?></td>
                    <td>
                        <?php echo $jornada->getFecha() ?>
                    </td>
                    <td><a href="index.php?controlador=Jornada&accion=Listar&jornada_id=<?php echo $jornada->getJornada_ID() ?>">Ver partidos</a>
                    </td>
                </tr>
            <?php
        }
            ?>
            </tbody>
    </table>

    <?php include_once("common/pie.php"); ?>

</body>

</html>