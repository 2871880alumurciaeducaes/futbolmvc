<?php include_once("common/cabecera.php"); ?>

<body>
    <?php include_once("common/menu.php"); ?>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">EQUIPO</th>
            </tr>
        </thead>
        <?php

        // $equipos es una variable asignada desde el controlador EquipoController.
        foreach ($equipos as $equipo) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $equipo->getEquipoId(); ?></td>
                    <td>
                        <?php echo $equipo->getEquipo(); ?>
                    </td>
                    <td><a href="index.php?controlador=Equipo&accion=Editar&equipo_id=<?php echo $equipo->getEquipoId() ?>">Editar</a>
                    </td>
                    <td><a href="index.php?controlador=Equipo&accion=Borrar&equipo_id=<?php echo $equipo->getEquipoId() ?>">Borrar</a>
                    </td>

                </tr>
            <?php
        }
            ?>
            </tbody>
    </table>
    <a href="index.php?controlador=Equipo&accion=Nuevo">Nuevo</a>

    <?php include_once("common/pie.php"); ?>

</body>

</html>