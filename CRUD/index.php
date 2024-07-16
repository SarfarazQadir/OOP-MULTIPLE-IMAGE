<?php

include "../Config/connection.php";

if(isset($_POST['btninsert'])){
    $name = $_POST['name'];
    $totalimage = count($_FILES['image']['name']);
    $array = array();

    for($i = 0;$i < $totalimage; $i++){
        $image = $_FILES['image']['name'][$i];
        $imagetmp = $_FILES['image']['tmp_name'][$i];

        $imageextension = explode('.',$image);
        $imageextension = strtolower(end($imageextension));

        $unique = uniqid() . '.' .$imageextension;
        
        move_uploaded_file($imagetmp, '../Images/'.$image);
        $array[] = $unique; 

    }

    $array = json_encode($array);
    $res = $database->insert($name, $array);
    if($res){
        echo"<script>
        alert('Data Inserted');
        document.location.href = 'index.php';
        </script>"; 
    }else{
        echo"<script>alert('Data Not Inserted');</script>";
    }

    // $tmpimage = $_FILES['image']['tmp_name'];
    // $type = $_FILES['image']['type'];
    // $size = $_FILES['image']['size'];
    // $folder = "../Images/".$imagename;
    // move_uploaded_file($tmpimage, $folder);

    // $res = $database->insert($name, $folder);
    // if($res){
    //     echo"<script>
    //     alert('Data Inserted');
    //     document.location.href = 'index.php';
    //     </script>"; 
    // }else{
    //     echo"<script>alert('Data Not Inserted');</script>";
    // }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD MULTIPLE IMAGE</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
<h1>CRUD MULTIPLE IMAGE</h1>

<div class="container">
    <div class="row">
        <form enctype="multipart/form-data" class="form" method="post">
            <input type="text" placeholder="Image Name" name="name" ><br><br>
            <input type="file"  name="image[]" multiple ><br><br>
            <input type="submit" name="btninsert" class="btn btn-success" value="Upload">
        </form>
    </div>
</div>

</body>
</html>