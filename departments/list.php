<?php 

// Connect
include '../App/config.php';
include '../App/function.php';
// UI

include '../shared/head.php';
include '../shared/nav.php';  
$select = "SELECT * FROM department";
$s = mysqli_query($conn,$select);

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
 
    $delete = "DELETE FROM  `department` where id = $id";
    mysqli_query($conn,$delete);
 }

 auth();
?>




    <h1 class="text-center display-1 text-info mt-2 pt-2">List Department Page</h1>


   <div class="container col-md-7">
<div class="card">
    <div class="card-body">
       <table class="table table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>created_at</th>                        
            <th colspan="2">Action</th>
        </tr>
        <?php foreach ($s as $data) { ?>
            <tr>
                <th><?= $data['id']?></th>
                <th><?= $data['name']?></th>
                <th><?= substr($data['created_at'] , 10, 9)?></th>
                <th><a class="btn btn-info" href="/company/departments/edit.php?edit=<?= $data['id']?> ">Edit</a></th>
                <th><a onclick="return confirm('Are You Sure ?')" class="btn btn-danger" href="/company/departments/list.php?delete=<?= $data['id']?> ">delete</a></th>
            </tr>
            <?php } ?>
       </table>
    </div>
</div>
</div>




<?php 
include '../shared/script.php';  
?>