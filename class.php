<?php
require "conn.php";

if (isset($_POST['degree_id'])) {
    $degree_id = $_POST['degree_id'];

    $sqlClass = "SELECT * FROM class WHERE degree_id = '$degree_id'";
    $resultClass = mysqli_query($conn, $sqlClass);
    $numofrows = mysqli_num_rows($resultClass);

    if ($numofrows > 0) {
        while ($class = mysqli_fetch_array($resultClass)) {

?>
            <option value="<?= $class[0] ?>"><?= $class["year"] ?></option>
<?php
        }
    }
}


?>