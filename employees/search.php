<?php 

// Connect
include '../App/config.php';
include '../App/function.php';
// UI

include '../shared/head.php';
include '../shared/nav.php';  

if(isset($_GET['search'])){
    $nameValue = $_GET['nameValue'];
    $select = "SELECT * FROM `employeeswithdepartments` where empName like '%$nameValue%'";
    $s = mysqli_query($conn,$select);
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
            <th>Salary</th>
            <th>Image</th>
            <th>Department</th> 
            <th>created_at</th>                     
            <th colspan="2">Action</th>
        </tr>
        <?php foreach ($s as $data) : ?>
            <tr>
                <td> <?= $data['id'] ?></td>
                <td> <?= $data['empName'] ?></td>
                <td> <?= $data['salary'] ?></td>
                <td> <img width="50" src="./upload/<?= $data['image'] ?>" ></td>
                <td> <?= $data['depName']?></td>
                <td> <?= substr($data['created_at'] , 10, 9)?></td>
                <td> <a class="btn btn-info" href="/company/employees/edit.php?edit=<?= $data['id']?> ">Edit</a></td>
                <td> <a onclick="return confirm('Are You Sure ?')" class="btn btn-danger" href="/company/employees/list.php?delete=<?= $data['id']?> ">delete</a></td>
            </tr>
            <?php endforeach; ?>
       </table>
    </div>
</div> 
</div>




<?php 
include '../shared/script.php';  
?>