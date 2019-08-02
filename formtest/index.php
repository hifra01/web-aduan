<?php include "db.php";?>
<?php include "header_login.php";?>
<?php
session_start();
if(isset($_SESSION)){
    if($_SESSION['LevelID'] == 2){
        header("Location: home_teknisi.php");
    }
    elseif ($_SESSION['LevelID'] == 3) {
        header("Location: home_user.php");
    }
    elseif ($_SESSION['LevelID'] == 1){
        header("Location: su.php");
    }
}
?>


<?php
if(isset($_POST['UserLogin']) && isset($_POST['pwd'])){
$UserLogin=$_POST["UserLogin"];
$pwd=$_POST["pwd"];

$sql= "SELECT IdUser, UserLogin, Password, LevelID FROM tbluser WHERE UserLogin = '$UserLogin' AND Password = '$pwd'";
$query=$conn->query($sql);


if(mysqli_num_rows($query) > 0){
    $result=$query->fetch_assoc();
    
    if($result['LevelID']==2){
        $_SESSION['UserLogin']=$result['UserLogin'];
        $_SESSION['IdUser']=$result['IdUser'];
        $_SESSION['LevelID']=$result['LevelID'];
        header("Location: home_teknisi.php");
    }
    elseif ($result['LevelID']==3) {
        $_SESSION['UserLogin']=$result['UserLogin'];
        $_SESSION['IdUser']=$result['IdUser'];
        $_SESSION['LevelID']=$result['LevelID'];
        header("Location: home_user.php");
    }
    elseif ($result['LevelID']==1) {
        $_SESSION['UserLogin']=$result['UserLogin'];
        $_SESSION['IdUser']=$result['IdUser'];
        $_SESSION['LevelID']=$result['LevelID'];
        header("Location: su.php");
    }
}
else{
    echo '<script>alert("Username atau Password anda salah")</script>';    
}
}
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-header text-center text-uppercase h4 font-weight-light">
                        Login
                    </div>
                    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
                        <div class="card-body py-5">
                            <div class="form-group">
                                <label class="form-control-label">Username</label>
                                <input type="text" class="form-control" name="UserLogin">
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <input type="password" class="form-control" name="pwd">
                            </div>

                      
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <input type="submit" class="btn btn-primary px-5" value="LOGIN">
                                </div>
                                <div class="col-6">
                                    <a href="register.php" class="btn btn-link">Buat Akun</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




<?php include "footer.php";?>