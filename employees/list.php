<?php 

// Connect
include '../App/config.php';
include '../App/function.php';
// UI

include '../shared/head.php';
include '../shared/nav.php';  

$select = "SELECT * FROM `employeeswithdepartments`";
$s = mysqli_query($conn,$select);

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    
    $selectImage = "SELECT `image` FROM `employees` WHERE id = $id";
    $runSelect = mysqli_query($conn,$selectImage); 

    $row = mysqli_fetch_assoc($runSelect);
    $image = $row['image'];
    echo $image;
    unlink("./upload/$image");

    $delete = "DELETE FROM  `employees` where id = $id";
    mysqli_query($conn,$delete);
    path('employees/list.php');
 }

 auth();
?>



    <h1 class="text-center display-1 text-info mt-2 pt-2">List Employees Page</h1>


   <div class="container col-md-9">
    <form action="./search.php" method="get">
        <div class="row my-4">
            <div class="col-md-10">
              <div class="form-group">
              <input type="text" id="myInput" name="nameValue" class="form-control" placeholder="Search"> 
        </div>
            </div>
            <div class="col-md-2">
                <div class="d-grid">
                  <button name="search" class="btn btn-info">Search</button>
                </div>
            </div>
        </div>
    </form>
<div class="card">
    <div class="card-body">
       <table id="myTable" class="table table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>            
            <th colspan="2">Action</th>
        </tr>
        <?php foreach ($s as $data) : ?>
            <tr>
                <td> <?= $data['id'] ?></td>
                <td> <?= $data['empName'] ?></td>
                <td>
                  <div class="dropdown">
                  <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-bars"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/company/employees/edit.php?edit=<?= $data['id']?> "><i class="fa-solid fa-pen-to-square"></i></a></li>
                    <li><a class="dropdown-item"href="/company/employees/list.php?delete=<?= $data['id']?> "><i class="fa-solid fa-trash text-danger"></i></a></li>
                    <li><a class="dropdown-item"href="/company/employees/profile.php?show=<?= $data['id']?> "><i class="fa-solid fa-users-viewfinder text-info"></i></a></li>
                  </ul>
                 </div>
                </td>
               
            </tr>
            <?php endforeach; ?>
       </table>
    </div>
</div>
</div>




<?php 
include '../shared/script.php';  
?>