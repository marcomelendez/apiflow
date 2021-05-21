<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h2>Formulario de Suscripcion</h2>
    <form action="suscription.php" method="post">
        <table>
            <tr>
                <td>
                    <input type="text" name="planId" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">* Nombre</label>
                    <input type="text" name="name">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">* Identificacion</label>
                    <input type="text" name="externalId" id="externalId" minlength="7" maxlength="10">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">* Email</label>
                    <input type="text" name="email">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">* Direccion</label>
                    <input type="text" name="direccion">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Comuna</label>
                    <input type="text" name="comuna">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Region</label>
                    <input type="text" name="region">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Telefono</label>
                    <input type="text" name="telefono">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Aceptar">
                </td>
            </tr>
        </table>
    </form>
</body>


</html>