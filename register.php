<?php
$namEror=$bregEror=$panEror=$mailEror=$mobEror=$passEror=$pass1Eror="";
$name=$bRegNum=$mail=$pan=$mob=$pass=$pass1="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
   $name=$_POST['bname'];
    $bRegNum=$_POST['b_reg_num'];
    $pan=$_POST['bpan'];
    $mail=$_POST['b-mail'];
    $mob=$_POST['bmob'];
    $pass=$_POST['b-pass'];
    $pass1=$_POST['b-pass-ag'];
    if(!preg_match("/^[a-zA-Z ,']*$/",$name)){
        $namEror=" only letters and white space allowed"; 
    }
    $p="/[6-9][0-9]{9}/";
    if(!preg_match($p,$mob)){
        $mobEror=" Enter valid number.";
    }
    if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
        $mailEror=" Enter valid Email address.";
    }
    if(!preg_match("/[A-Z0-9]{10}/",$pan)){
        $panEror=" Enter Valid Pan Number.";
    }
    if(!preg_match("/[A-Z0-9]{7,16}/",$bRegNum)){
        $bregEror=" Enter Valid Registration Number.";
    }
    if(strlen($pass)<8)
    {
        $passEror=" Password should contain at least 8 characters.";
    }
    if((strcmp($pass,$pass1))!=0)
    {
        $pass1Eror="Password doesn't match.";
    }
      if($namEror=="" and $mailEror=="" and $mobEror=="" and $passEror=="" and $pass1Eror=="" and  $bregEror=="" and $panEror=="") {
            $btype=$_POST['bussiness-type'];
          $city=$_POST['city'];
         $pasen=$pass;
        include_once("dbconfig.php");
          $qry1="SELECT `email` FROM `bussines` WHERE `email`='$mail'";
          $result=mysqli_query($con,$qry1);
        
          if(mysqli_num_rows($result)==1)
          { ?>
              <script>
                  alert("Email has already registered");
                  </script>
          <?php
              mysqli_close($con);
                  }
        
          else{
          $qry="INSERT INTO `bussines`(`bussiness-name`, `email`, `mobile num`, `bussines-type-id`, `bussiness-reg-num`, `pancard`, `city`, `password`) VALUES ('$name','$mail',$mob,$btype,'$bRegNum','$pan',$city,'$pasen')";
              
              
  
          if(mysqli_query($con,$qry)){
                mysqli_close($con);
          header("location:thank.php");
          }
          else
          {
              echo "some error occured.";
                mysqli_close($con);
             
          }
        }
         
      }
}
?>
<!Doctype html>
<html>
    
    <head>
           <style>
        input[type=tel],
               input[type=password],
            .select{
    width: 100%;
    display: inline-block;
    margin: 8px 0;
    outline: none;
}
               .select .option{
                  background:rgb(212, 29, 170);
                   color: white;
                   
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
               .code-red{
                   color: red;
                   width: 100%;
                 
               }
        
        
        
        </style>
        
    
    </head>
<body>
  <section class="feedback-form">
      <div class="container">
          <h1 class="text-center" style="padding-top:100px;" data-aos="zoom-in">Register Your Bussiness</h1> 
          <div class="row" data-aos="zoom-in">
      <form class="form1" action="#" method="post">
          <label><i class="ion-android-location"></i> City</label>
              <select name="city" class="select" required>
                  <option value="" disabled selected hidden>--SELECT--</option>
                  <option value="100" class="option" >DELHI</option>
                  <option value="101" class="option">MUMBAI</option>
                  <option value="102" class="option">CHENNAI</option>
                  <option value="103" class="option">BANGALORE</option>
                  <option value="104" class="option">KOLKATA</option>
                  <option value="105" class="option">BHUBANESWAR</option>
                </select>
             
          <label><i class="ion-edit"></i> Type Of Busssines</label>
              <select name="bussiness-type" class="select" required>
                 <option value="" disabled selected hidden>--SELECT--</option>
                  <option value="79" class="option">GYM</option>
                  <option value="80" class="option">SPA &amp; BEAUTY PARLOUR</option>
                  <option value="82" class="option">AUTO GARAGE</option>
                  <option value="83" class="option">CA FIRM</option>
                  <option value="84" class="option">BARBER</option>
                  <option value="81" class="option">CAR WASH</option>
                </select>
          
          <label><i class="ion-briefcase"></i> Registered Bussiness Name</label>
           <span class="code-red"><?php echo $namEror; ?></span>
             <input type="text" name="bname" placeholder="Ex: Shiv Fitness Center,Patia,Delhi" required >
          
                <label><i class="ion-compose"></i> Bussiness Registration Number</label>
           <span class="code-red"><?php echo $bregEror; ?></span>
              <input type="text" name="b_reg_num" placeholder="Enter Registration Number" required>
          
                <label><i class="ion-card"></i> PAN Card Number</label>
           <span class="code-red"><?php echo $panEror; ?></span>
              <input type="text" name="bpan" maxlength="10" placeholder="Enter Pan Card Number" required>
          
          <label><i class="ion-android-mail"></i> Enter Your Email</label>
           <span class="code-red"><?php echo $mailEror; ?></span>
              <input type="email" name="b-mail" placeholder="Enter valid email Address" required>
          
             <label><i class="ion-iphone"></i> Mobile Number</label>
           <span class="code-red"><?php echo $mobEror; ?></span>
              <input type="tel" name="bmob" maxlength="10" placeholder="Enter 10 Digit Mobile Number" required>
          
          <label><i class="ion-unlocked"></i> Create Password</label>
           <span class="code-red"><?php echo $passEror; ?></span>
              <input type="password" name="b-pass" placeholder="Enter 8 Characters or more" required> 
          
          <label><i class="ion-locked"></i> Confirm Password</label>
           <span class="code-red"><?php echo $pass1Eror; ?></span>
              <input type="password" name="b-pass-ag" placeholder="Repeat Your Password" required> 
          
              <input type="submit" name="submit" value="Register">
             <div class="lowe">
              
            <button class="btn"><a href="login.php"><i class="ion-briefcase"></i> Already have an Account</a></button>
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