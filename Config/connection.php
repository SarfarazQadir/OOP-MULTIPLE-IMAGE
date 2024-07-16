<?php

class Database{

    private $conn ;

    public function connection(){
        $this->conn = mysqli_connect("localhost","root","","crud_db");
    }
    public function insert($name, $array){
        $query = "INSERT INTO `tbl_images`( `name`, `image`) VALUES ('$name','$array')";
        $result = mysqli_query($this->conn,$query);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function fetch(){
        $query ="SELECT * FROM `tbl_images`";
        $result = mysqli_query($this->conn, $query);
        if($result){
            return $result;
            }else{
                return false;
            }
    }
    public function delete($id){
        $query = "DELETE FROM `tbl_images` WHERE id = $id";
        $result = mysqli_query($this->conn, $query);
        if($result){
            echo"<script>alert('Deleted Successfull !');</script>";
        }else{
            echo"<script>alert('Data Not Deleted');</script>";
        }
    }
    public function edit($id){
        $query = "SELECT * FROM `tbl_images` WHERE id = $id";
        $result = mysqli_query($this->conn, $query);
        if($result){
            return $result;
            }else{
                return false;
            }
        }
    public function update($id, $name, $image){
        $query = "UPDATE `tbl_images` SET `name`='$name',`image`='$image' WHERE id = $id";
        $result = mysqli_query($this->conn, $query);
        if($result){
            echo"<script>alert('Updated Successfull !');</script>";
            }else{
                echo"<script>alert('Data Not Updated');</script>";
                }
    }    
}

$database = new Database();
$database->connection();
?>