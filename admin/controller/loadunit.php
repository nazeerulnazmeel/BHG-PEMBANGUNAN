<?php

require '../../includes/db.inc.php';

if (isset($_POST['uid'])) {
    $cawangan = $_POST['uid'];
    if ($cawangan == "Pilih cawangan") {
        exit();
    } else {
        $sql = "SELECT * FROM unit WHERE cawangan_id=$cawangan";
        $result = mysqli_query($db, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option>" . $row['nama_unit'] . "</option>";
                // echo json_encode($row);
            }
        }
    }
}
