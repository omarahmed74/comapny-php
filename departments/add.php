<?php 

// Connect
include '../App/config.php';
include '../App/function.php';

// UI
include '../shared/head.php';
include '../shared/nav.php';  

if(isset($_POST['send'])){
   $name = $_POST['name'];

   $insert = "INSERT INTO `department` values(null,'$name', Default)";
   $i = mysqli_query($conn,$insert);
   testMessage($i,"Insert");
}

auth();
?>

    <h1 class="text-center display-1 text-info mt-2 pt-2">Add Department Page</h1>


<div class="container col-md-6">
<div class="card">
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <button  name="send" class="btn btn-info m-3">Send Data</button>
        </form>
    </div>
</div>
</div>


<?php 
include '../shared/script.php';  
?>