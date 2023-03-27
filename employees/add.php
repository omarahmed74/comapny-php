<?php 

// Connect
include '../App/config.php';
include '../App/function.php';

// UI
include '../shared/head.php';
include '../shared/nav.php';  
$select = "SELECT * FROM department";
$departments = mysqli_query($conn,$select);

if(isset($_POST['send'])){
   $name = $_POST['name'];
   $salary = $_POST['salary'];
    
    // Image Code
   $image_name = rand(0 ,9000000) .  $_FILES  ['image']['name'];
   $tmp_name =  $_FILES['image']['tmp_name'];
   $location = "upload/" . $image_name ;
   move_uploaded_file($tmp_name , $location);

   $depId = $_POST['depId'];


   $insert = "INSERT INTO `employees` values(null,'$name',$salary,'$image_name',$depId, Default)";
   $i = mysqli_query($conn,$insert);
   testMessage($i,"Insert");
}

auth();
?>

    <h1 class="text-center display-1 text-info mt-2 pt-2">Add Eployees Page</h1>


<div class="container col-md-6">
 <div class="card">
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Salary</label>
                <input type="text" name="salary" class="form-control">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label>Department ID</label>
                <select name="depId" class="form-control">
                    <?php foreach($departments as $data ) : ?>
                    <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                    <?php endforeach;  ?>
                </select>
            </div>
            <button  name="send" class="btn btn-info m-3">Send Eployees</button>
        </form>
    </div>
 </div>
</div>


<?php 
include '../shared/script.php';  
?>