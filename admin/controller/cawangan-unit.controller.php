<?php

require '../../includes/db.inc.php';

$sql = "SELECT * from cawangan";
$result = mysqli_query($db, $sql);
$resultCheck =  mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        
        // $cawangan = $row['cawangan'];
        // $unit = $row['unit'];
        
        echo $row['nama_cawangan'];
        // echo "<td>".$row['cawangan']."</td>";
        // echo "<td>".$row['unit']."</td>";
        // echo 'edit';

    }
}