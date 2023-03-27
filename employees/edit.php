<?php 
// Connect
include '../App/config.php';
include '../App/function.php';

// UI
include '../shared/head.php';
include '../shared/nav.php';  
$select = "SELECT * FROM department";
$departments = mysqli_query($conn,$select);
if(isset($_GET['edit'])){
      
    $id = $_GET['edit'];  

    $select = "SELECT * FROM `employeeswithdepartments` where id=$id";
    $s = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($s);

    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $salary = $_POST['salary'];

            // Image Code
            if(!empty($_FILES['image']['tmp_name'])){
                $image_name = rand(0 ,9000000) .  $_FILES  ['image']['name'];
                $tmp_name =  $_FILES['image']['tmp_name'];
                $location = "upload/" . $image_name ;
                move_uploaded_file($tmp_name , $location);
                $imageName = $row['image'];
                unlink("./upload/$imageName");
            }else{
                $image_name = $row['image'];
            }
       
        $depId = $_POST['depId'];
        $update = "UPDATE `employees` SET name='$name' , salary = $salary , image = '$image_name' ,  department_id = $depId  where id = $id";
        $i = mysqli_query($conn,$update);
        path('employees/list.php');
     }
}

auth();
?>



    <h1 class="text-center display-1 text-info mt-2 pt-2">Edit Employees Page</h1>


<div class="container col-md-6">
<div class="card">
    <div class="card-body">
    <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" value="<?= $row['empName']?>" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Salary</label>
                <input type="text"  value="<?= $row['salary']?>" name="salary" class="form-control">
            </div>
            
            <div class="form-group">
                <label>Image : <span><img width="50" src="./upload/<?= $row['image']?>" alt=""></span></label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label>Department ID</label>
                <select name="depId" class="form-control">
                    <option selected value="<?= $row['depId'] ?>" ><?= $row['depName'] ?></option>
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