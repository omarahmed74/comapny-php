<?php 
// Connect
include '../App/config.php';
include '../App/function.php';

// UI
include '../shared/head.php';
include '../shared/nav.php';  

if(isset($_GET['edit'])){
      
    $id = $_GET['edit'];  

    $select = "SELECT * FROM department where id=$id";
    $s = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($s);

    if(isset($_POST['send'])){
        $name = $_POST['name'];
     
        $update = "UPDATE `department` SET name='$name' where id = $id";
        $i = mysqli_query($conn,$update);

     }
}

auth();
?>




    <h1 class="text-center display-1 text-info mt-2 pt-2">Edit Department Page</h1>


    <div class="container col-md-6">
<div class="card">
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name"  class="form-control" value="<?= $row['name']?>">
            </div>
            <button  name="send" class="btn btn-info m-3">Update Data</button>
        </form>
    </div>
</div>


<?php 
include '../shared/script.php';  
?>