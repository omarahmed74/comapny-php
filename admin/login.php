<?php 

// Connect
include '../App/config.php';
include '../App/function.php';

// UI
include '../shared/head.php';
include '../shared/nav.php';  

if(isset($_POST['login'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $hashPassword = sha1($password);
    $select = "SELECT * FROM `admin` WHERE name = '$name' AND password = '$password'";
    $s = mysqli_query($conn, $select);

    $numOfRows = mysqli_num_rows($s);

  
    if($numOfRows == 1) {
        $_SESSION['admin'] = $name;
        path("/");
    }else{
        echo "false admin";
    }
    
   
}

print_r($_SESSION);

?>

<h1 class="text-center display-1 text-info mt-2 pt-2">Login Page</h1>


<div class="container col-md-6">
<div class="card">
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" value="" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Pasword</label>
                <input type="text" value="" name="password" class="form-control">
            </div>
            <button  name="login" class="btn btn-info m-3">Login</button>
        </form>
    </div>
</div>
</div>


<?php 
include '../shared/script.php';  
?>