<?php
require_once "Coneccion.php";

$objetConeccion = new Coneccion();
$con = $objetConeccion->getConeccio(); 

$sql = "SELECT * FROM cliente";
$result = $con->query($sql); 

if ($result->num_rows != 0) {
    while ($row = $result->fetch_assoc()) {
        print"id: " . $row["id"]. " ";
        print "nombre:". $row["Nombre"] ."<br>";

    }
} else {
    echo "No hay resultados.";
}


// INSERTAR nuevo cliente
echo "<h3>➕ Insertar nuevo cliente</h3>";
$sqlInsert = "INSERT INTO cliente (`Nombre`, `Aoellidos`, `DNI`, `Telefono`, `Direccion`, `Correo`) 
VALUES ('Fran', 'Arevalo', '87654321', '980679884', 'abc', 'xxx@gmail.com')";

if ($con->query($sqlInsert) === TRUE) {
    $ultimo_id = $con->insert_id;
    echo "✅ Cliente insertado con ID: $ultimo_id<br>";
} else {
    echo "❌ Error al insertar: " . $con->error . "<br>";
}

// ACTUALIZAR cliente
echo "<h3>✏️ Actualizar cliente con ID 1</h3>";
$sqlUpdate = "UPDATE cliente SET Nombre='Francisco', Telefono='999999999' WHERE id=1";

if ($con->query($sqlUpdate) === TRUE) {
    echo "✅ Cliente actualizado.<br>";
} else {
    echo "❌ Error al actualizar: " . $con->error . "<br>";
}

// ELIMINAR cliente
echo "<h3>🗑️ Eliminar cliente con ID 2</h3>";
$sqlDelete = "DELETE FROM cliente WHERE id=2";

if ($con->query($sqlDelete) === TRUE) {
    echo "✅ Cliente eliminado.<br>";
} else {
    echo "❌ Error al eliminar: " . $con->error . "<br>";
}

$sql = "SELECT * FROM cliente";
$result = $con->query($sql); 

if ($result->num_rows != 0) {
    while ($row = $result->fetch_assoc()) {
        print"id: " . $row["id"]. " ";
        print "nombre:". $row["Nombre"] ."<br>";

    }
} else {
    echo "No hay resultados.";
}
?>
