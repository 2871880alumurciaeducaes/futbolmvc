<?php include_once("common/cabecera.php"); ?>

<body>
    <?php include_once("common/menu.php"); ?>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Equipo</th>
                <th>Puntos</th>
            </tr>
        </thead>
        <?php
        // $listado es una variable asignada desde el controlador ItemsController.

        foreach ($clasificacion as $equipo => $puntos) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $equipo ?></td>
                    <td>
                        <?php echo $puntos ?>
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