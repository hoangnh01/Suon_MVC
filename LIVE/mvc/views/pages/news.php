<h2>
    <?php 
        echo $data["Number"];
        echo $data["SoThich"][1];
    ?>
</h2>

<?php
while($row = mysqli_fetch_array($data["SV"])) {
    echo $row["hoten"] . "<br>";
}
?>
