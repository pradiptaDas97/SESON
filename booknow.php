<?php
if(isset($_POST['submit'])){
    $mail=$_POST['c-u-name'];
    $shop=$_POST['bussiness'];
    $city=$_POST['CITY'];
    include_once("dbconfig.php");
    $qry1="SELECT `email` FROM `customer` WHERE `email`='$mail'";
          $result=mysqli_query($con,$qry1);
    if(mysqli_num_rows($result)==1)
          {           
           mysqli_close($con);
        session_start();
        $_SESSION['mail']=$mail;
        header("location:booknow2.php?shop=$shop&city=$city");
        
             }
          else{
              ?>
              <script>
                  var r=confirm("Email has Not registered yet. Do you want to register?");
                  if(r==true){
                      window.location.href="client-signup.php";  
                  }
                  
            </script>
<?php
          }
    
}

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
          <h1 class="text-center" style="padding-top:100px;" data-aos="zoom-in">Book Now</h1> 
          <div class="row" data-aos="zoom-in" >
      <form class="form1" action="#" method="post" >
              <label><i class="ion-person"></i> Email id</label>
             <input type="text" name="c-u-name" placeholder="Registered email address" required >
            
          <label><i class="ion-android-location"></i> City</label>
              <select name="CITY" class="select city1" required>
                  <option value="" disabled selected hidden>--SELECT--</option>
                  <option value="100" class="option">DELHI</option>
                  <option value="101" class="option">MUMBAI</option>
                  <option value="102" class="option">CHENNAI</option>
                  <option value="103" class="option">BANGALORE</option>
                  <option value="104" class="option">KOLKATA</option>
                  <option value="105" class="option">BHUBANESWAR</option>
                </select>
                 
              
               <label><i class="ion-edit"></i> Type Of Service</label>
              <select name="bussiness" class="select buss" required>
                 
                  <option value="" disabled selected hidden>--SELECT--</option>
                  <option value="79" class="option">GYM</option>
                  <option value="80" class="option">SPA &amp; BEAUTY PARLOUR</option>
                  <option value="82" class="option">AUTO GARAGE</option>
                  <option value="83" class="option">CA FIRM</option>
                  <option value="84" class="option">BARBER</option>
                  <option value="81" class="option">CAR WASH</option>
                </select>
              
        
              <input type="submit" name="submit" value="Next Step">
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
