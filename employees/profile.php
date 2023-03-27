<?php 

// Connect
include '../App/config.php';
include '../App/function.php';
// UI

include '../shared/head.php';
include '../shared/nav.php';  



if(isset($_GET['show'])){
    $id = $_GET['show'];
    $select = "SELECT * FROM `employeeswithdepartments` where id = $id";
    $s = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($s);
 }

 auth();
?>


    <h1 class="text-center display-1 text-info mt-2 pt-2">List Employees Page</h1>

<div class="container col-md-5">
    <div class="card">
     <img src="./upload/<?= $row['image']?>" class="img-top" alt="">
       <div class="card-body">
          Name : <?= $row['empName']?>
          <hr>
          Salary : <?= $row['salary']?>
          <hr>
          Department : <?= $row['depName']?>
          <hr>
           <a class="btn btn-info" href="/company/employees/edit.php?edit=<?= $row['id']?> ">Edit</a>
           <a onclick="return confirm('Are You Sure ?')" class="btn btn-danger" href="/company/employees/list.php?delete=<?= $row['id']?> ">delete</a>
    </div>
    </div>
</div>




<?php 
include '../shared/script.php';  
?>