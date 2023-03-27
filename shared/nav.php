
<?php
session_start();

if(isset($_GET['logout'])){
    session_unset();
    header("location:/company/admin/login.php");
}
?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
        
          <a class="navbar-brand" href="#">B&W</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <?php  if(isset($_SESSION['admin'])) : ?> 
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/company/index.php">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Department
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/company/departments/add.php">Add Department</a></li>
                  <li><a class="dropdown-item" href="/company/departments/list.php">List Department</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Employees
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/company/employees/add.php">Add Employee</a></li>
                  <li><a class="dropdown-item" href="/company/employees/list.php">List Employee</a></li>
                </ul>
              </li>
            </ul>
            <?php endif; ?>
            
            <div class="d-flex" role="search">
            <?php if(!isset($_SESSION['admin'])): ?>
                 <a class="btn btn-outline-dark" href="/company/admin/login.php">Login</a>
             <?php else : ?>
                 <form action="">
                 <button name="logout" class="btn btn-outline-danger"  href="/company/admin/login.php">Logout</button>
                 </form>
                 <?php endif; ?>
             </div>
          </div>
         
        </div>
      </nav>
    
