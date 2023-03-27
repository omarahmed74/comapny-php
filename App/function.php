<?php 

function testMessage($condaction,$message){
    if($condaction){
        echo "<div class='alert alert-success col-5 mx-auto'>
           $message Successfully
        </div>";
    }else{
        echo "<div class='alert alert-danger col-5 mx-auto'>
        $message Failed
     </div>";
    }
}



function path($go){
    echo "<script>location.replace('/company/$go')</script>" ;
}


function auth(){
    if(!$_SESSION['admin']){
        header("location:/company/admin/login.php");
    }
}



?>



