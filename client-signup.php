<?php
$namEror=$mailEror=$mobEror=$passEror=$pass1Eror="";
$name=$mail=$mob=$pass=$pass1="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
   $name=$_POST['cname'];
    $mail=$_POST['c-mail'];
    $mob=$_POST['c-mob'];
    $pass=$_POST['c-pass'];
    $pass1=$_POST['c-pass-ag'];
    if(!preg_match("/^[a-zA-Z ']*$/",$name)){
        $namEror="only letters and white space allowed"; 
    }
    $p="/[6-9][0-9]{9}/";
    if(!preg_match($p,$mob)){
        $mobEror=" Enter valid number";
    }
    if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
        $mailEror="Enter valid Email address";
    }
    if(strlen($pass)<8)
    {
        $passEror="Password should contain at least 8 characters";
    }
    if((strcmp($pass,$pass1))!=0)
    {
        $pass1Eror=" Password doesn't match";
    }
      if($namEror=="" and $mailEror=="" and $mobEror=="" and $passEror=="" and $pass1Eror=="") {
          $dob=$_POST['c-birth'];
          $pasen=$pass;
        include_once("dbconfig.php");
          $qry1="SELECT `email` FROM `customer` WHERE `email`='$mail'";
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
          $qry="INSERT INTO `customer`(`customer Name`, `email`, `mobile num`, `dob`, `password`) VALUES ('$name','$mail',$mob,'$dob','$pasen')";
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
               input[type=date],
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
          <h1 class="text-center" style="padding-top:100px;" data-aos="zoom-in">Sign up</h1> 
          <div class="row" data-aos="zoom-in">
      <form class="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
         
          <label><i class="ion-person"></i> Enter Your Name</label>
          <span class="code-red"><?php echo $namEror; ?></span>
             <input type="text" name="cname" placeholder="Full Name" required>
        
          <label><i class="ion-android-mail"></i> Enter Your Email</label>
          <span class="code-red"><?php echo $mailEror; ?></span>
              <input type="email" name="c-mail" placeholder="Enter valid email Address" required>
          
             <label><i class="ion-iphone"></i> Mobile Number</label>
          <span class="code-red"><?php echo $mobEror; ?></span>
              <input type="tel" name="c-mob" min="10" maxlength="10" placeholder="Enter 10 Digit Mobile Number" required>
          
          <label><i class="ion-ios7-calendar"></i> Date of Birth</label>
              <input type="date" name="c-birth" max="2003-01-01" value="2003-01-01" required>
          
          <label><i class="ion-unlocked"></i> Create Password</label>
          <span class="code-red"><?php echo $passEror; ?></span>
              <input type="password" name="c-pass" placeholder="Enter 8 Characters or more" min="8" maxlength="16" required> 
          
          <label><i class="ion-locked"></i> Confirm Password</label>
         <span class="code-red"><?php echo $pass1Eror; ?></span>
        <input type="password" name="c-pass-ag" placeholder="Repeat Your Password"  maxlength="16" required> 
          
              <input type="submit" name="submit" value="Register" onclick="chkname();">
            
            <div class="lowe">   
            <button class="btn"><a href="login.php"><i class="ion-person"></i> Already have an Account</a></button>
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