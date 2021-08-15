<?php
session_start();
if(isset($_SESSION['mail'])){
    $climail=$_SESSION['mail'];
$city=$_REQUEST['city'];
$sid=$_REQUEST['shop'];
     include_once("dbconfig.php");
     $qry1="SELECT `bussiness-name`,`email` FROM `bussines` WHERE `bussines-type-id`=$sid AND `city`=$city";
    $result=mysqli_query($con,$qry1);
}
if(isset($_POST['submit'])){
    $shop_mail=$_POST['shops'];
    $slot=$_POST['slot'];
    $date=$_POST['book-date'];
    $pass=$_POST['user-pass'];
     $qry1="SELECT `bussiness-name` FROM `bussines` WHERE `email`='$shop_mail'";
    $result=mysqli_query($con,$qry1);
    if(mysqli_num_rows($result)==1) {
                      while($row=mysqli_fetch_assoc($result)){
                          $shop_name=$row['bussiness-name'];
                      }
                      
                  }
    $qry1="SELECT `password` FROM `customer` WHERE `email`='$climail';";
    $result=mysqli_query($con,$qry1);
    if(mysqli_num_rows($result)==1) {
                      while($row=mysqli_fetch_assoc($result)){
                          $cpass=$row['password'];
                      }
                      
                  }
    if($cpass==$pass){
        $qry2="INSERT INTO `all-bookings`(`customer-email`, `shop-email`, `service-type`, `shop_name`, `date`, `slot`) VALUES ('$climail','$shop_mail','$sid','$shop_name','$date','$slot')";
        if(mysqli_query($con,$qry2)){
             session_destroy();
          header("location:slotbooked.php");
          }
          else
          {
              echo "some error occured.";
              session_destroy();
              //header("location:index.html");
              
          }
        
          }
    else{
         session_destroy();
        ?>
<script>
    var r=confirm("Wrong Password.");
    if(r==true){
        window.location.href="booknow.php";
    }
    
</script>
<?php
       
        
    }
}
 mysqli_close($con);
?>

<html>
   <head>
       <style>
        input[type=tel],
               input[type=password],
                input[type=date],
            .select{
    width: 100%;
    display: inline-block;
    margin: 8px 0;
    outline: none;
}
               .lowe{
                   display: flex;
                    align-items: center;
                   justify-content: space-around;
                   width: 100%;
                  
               }
               
               .lowe a{
                   color: white;
                   text-decoration: none;
                   transition: color 0.5s;
                   font-size: 105%;
               }
               .lowe a:active,
               .lowe a:hover{
                   color: #dedede;
                   text-decoration: none;
               }
        .select .option{
                  background:rgb(212, 29, 170);
                   color: white;
                   
               }
        
        </style>
        
    
    </head>
<body>
   <section class="feedback-form">
      <div class="container">
          <h1 class="text-center" style="padding-top:100px;" data-aos="zoom-in">STEP 2</h1> 
          <div class="row" data-aos="zoom-in" >
      <form class="form1" action="#" method="post" >
              
          <label><i class="ion-android-locate"></i> Choose a Shop</label>
              <select name="shops" class="select shop" required>
            <option value="" disabled selected hidden>--SELECT--</option>
                  <?php
                  if(mysqli_num_rows($result)>0) {
                      while($row=mysqli_fetch_assoc($result)){
                          echo "<option value='".$row['email']."'>".$row['bussiness-name'] ."</option>";
                      }
                      
                  }
                  ?>
                </select>
              
               <label><i class="ion-ios7-clock-outline"></i> Choose a Slot</label>
              <select name="slot" class="select" required>
                  <option value="" disabled selected hidden>--SELECT--</option>
                  <option value="09-10am" class="option">09-10am</option>
                  <option value="10-11am" class="option">10-11am</option>
                  <option value="11-12am" class="option">11-12pm</option>
                  <option value="12-01pm" class="option">12-01pm</option>
                  <option value="01-02pm" class="option">01-02pm</option>
                  <option value="02-03pm" class="option">02-03pm</option>
                  <option value="03-04pm" class="option">03-04pm</option>
                  <option value="04-05pm" class="option">04-05pm</option>
                  <option value="05-06pm" class="option">05-06pm</option>
                  <option value="06-07pm" class="option">06-07pm</option>
                  <option value="07-08pm" class="option">07-08pm</option>
                  <option value="08-09pm" class="option">08-09pm</option>
                  <option value="09-10pm" class="option">09-10pm</option>
                </select>
              <label><i class="ion-ios7-calendar"></i> Choose a Date</label>
              <input type="date" name="book-date" required>
              
                <label><i class="ion-locked"></i> Enter Password</label>
              <input type="password" name="user-pass" placeholder="Enter Your Password" required> 
              <input type="submit" name="submit" value="Book">
            <div class="lowe">
              <button class="btn"><a href="#"><i class="ion-locked"></i> Forgot Password</a></button>
            <button class="btn"><a href="client-signup.php"><i class="ion-plus"></i> New User</a></button>
              </div>
      </form>
            
      </div>   
      </div>
           </section>  
    </body>              
</html> 
<?php
include_once("navigation.php");
?>
