<?php 
require_once 'connection.php';
$sql=mysqli_query($connection,"SELECT * from partite WHERE risultatoCasa IS NOT null and risultatoTrasferta IS not null ORDER BY giornoP DESC limit 10");
$result=mysqli_fetch_all($sql,MYSQLI_ASSOC);

exit(json_encode($result));

?>