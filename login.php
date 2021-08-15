<?php
$mailEror=$passEror=$mail1Eror=$pass1Eror="";
$mail=$pass="";
if($_SERVER["REQUEST_METHOD"]=="POST")
   {
       
   if($_POST['action']=='Log in')
{
   
    $mail=$_POST['cmail'];
    
    $pass=$_POST['cpass'];
   
    if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
        $mailEror="Enter valid Email address";
    }
    if(strlen($pass)<8)
    {
        $passEror="Password should contain at least 8 characters";
    }
      if( $mailEror=="" and $passEror=="") {
          header("location:thank.php");
        
      }
}
  else if($_POST['action'] == 'Login')
{
    $mail=$_POST['bmail'];
    $pass=$_POST['bpass'];
    
    if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
        $mail1Eror="Eenter valid Email address.";
    }
    if(strlen($pass)<8)
    {
        $pass1Eror="Password should contain at least 8 characters.";
    }
      if($mail1Eror=="" and $pass1Eror=="") {
          header("location:thank.php");
          
      }
}
else{
    
}
}
?>
<html>
    <head>
        <style>
           
            .nav{
               
                display: flex;
                align-items: center;
                justify-content: center;
                
            }
           
             
               input[type=password]
           {
    width: 100%;
    display: inline-block;
    margin: 8px 0;
    outline: none;
}
            .nav button{
                padding:10 20px;
                
            }
            .nav button{
                margin: 0 10px;
            }
            .nav .btn-prim{
                background-color:rgb(52, 98, 201);
                 outline: none;
                color: white;
            }
            .nav .btn-prim.active{
                background-color:rgb(0, 45, 216);
                  outline: none;
            }
     
             .nav .btn-prim:hover,
             .nav .btn-pri:active
            {
                background-color:rgb(0, 45, 216);
                color: white;
            }
            
            .feedback-form{
                padding-bottom: 20px;
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
             .code-red{
                   color: red;
                   width: 100%;
                 
               }
        </style>
    </head>
    
    <body>
        <section class="feedback-form">
           <div class="container justify-content-center" data-aos="zoom-in" >
    <h1 class="container text-center" style="padding-top:100px;" >Log in</h1>
  <br>
  
 <div class="nav nav-tabs text-center" style="width:100%; border:none;" >

        <button class="btn btn-prim active" data-toggle="tab" href="#client">For Client</button>
      <button class="btn btn-prim" data-toggle="tab" href="#owner">For Shop</button>

     
</div>


  <div class="tab-content">
    <div id="client" class="container tab-pane active"><br>
      <form class="form1" action="#" method="post">
         
          <label><i class="ion-android-mail"></i> Enter Your Email</label>
          <span class="code-red"><?php echo $mailEror; ?></span>
              <input type="email" name="cmail" placeholder="Enter your registered email Address" required>
           
          <label><i class="ion-locked"></i> Enter your Password</label>
          <span class="code-red"><?php echo $passEror; ?></span>
              <input type="password" name="cpass" placeholder="Enter Your Password" required> 
         
          
              <input type="submit" name="action" value="Log in">
            
  <div class="lowe">
              <button class="btn"><a href="#"><i class="ion-locked"></i> Forgot Password</a></button>
                <button class="btn"><a href="client-signup.php"><i class="ion-plus"></i> New User</a></button>
              </div>
      </form>
        
    
    </div>
    <div id="owner" class="container tab-pane fade"><br>
    
          <form class="form1" action="#" method="post">
         
          <label><i class="ion-android-mail"></i> Enter Shop Email</label>
              <span class="code-red"><?php echo $mail1Eror; ?></span>
              <input type="email" name="bmail" placeholder="Enter your registered shop email Address" required>
           
          <label><i class="ion-locked"></i> Enter your Password</label>
              <span class="code-red"><?php echo $pass1Eror; ?></span>
              <input type="password" name="bpass" placeholder="Enter Your Password" required> 
         
          
              <input type="submit" name="action" value="Login">
            
  <div class="lowe">
              <button class="btn"><a href="#"><i class="ion-locked"></i> Forgot Password</a></button>
                <button class="btn"><a href="register.php"><i class="ion-plus"></i> New User</a></button>
              </div>
      </form>
            
     
    </div>
    
  </div>
</div>

        </section>
    </body>
</html>
<?php
include_once("navigation.php");
?>