<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdtienda";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT P.id_producto , marca ,descripcion , precio_i , precio_f ,  (U.nova+U.compu+U.rody2+U.rody+U.luz+U.almacen) AS conteo ,U.nova , U.compu , U.rody2 , U.rody , U.luz , U.almacen  FROM productos P  JOIN ubicacion U ON P.id_producto=U.id_producto;";
$result = mysqli_query($conn,$sql);


if ($result->num_rows > 0) {
 //output data of each row
 $arrays=[];
while($row = $result->fetch_assoc()) {
    $datos = array(
        'id' => $row["id_producto"],
        'marca' => $row["marca"],
        'descripcion' =>  $row["descripcion"],
        'precio_i' => $row["precio_i"],
        'precio_f' => $row["precio_f"],
        'conteo' => $row["conteo"],
        'nova' => $row["nova"],
        'compu' => $row["compu"],
        'rody' => $row["rody"],
        'rody2' => $row["rody2"],
        'luz' => $row["luz"],
        'almacen' => $row["almacen"]
    );

    array_push($arrays,$datos);

}
echo json_encode($arrays);
  } else {
   echo "0 results";
}


  $conn->close();

?>