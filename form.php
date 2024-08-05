<?php
include "conn.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="text-center mb-4 mt-4">
            <h2>form</h2>
        </div>
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">

                <label class="form-label" for="exampleCheck1">degree</label>

                <select class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="fun(this.value)">
                    <?php
                    $sqlDegree = "SELECT * FROM `degree`";
                    $resultDegree = mysqli_query($conn, $sqlDegree);
                    while ($degree = mysqli_fetch_array($resultDegree)) {
                    ?>

                        <option value="<?= $degree["degree_id"]; ?>"><?= $degree["degree_name"]; ?></option>
                    <?php

                    }
                    ?>

                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">classes</label>
                <select id="class" class="form-controle form-select form-select-sm" aria-label=".for-select-sm example">

                    <option selected>choose year...</option>

                </select>





            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
<script>
    function fun(datavalue) {
        $.ajax({
            url: "class.php",
            type: "POST",
            data: {
                degree_id: datavalue //1
            },
            success: function(result) {
                $("#class").html(result); //replace contents of #class with returned html
            }
        })
    }
</script>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- $.ajax{
url:"class.php",
type:"POST",
data:{
degree_id:datavalue //1
},
success: function(result){
$("#class").html(result); //replace contents of #class with returned html
}
} -->