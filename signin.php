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
        </style>
    </head>
    
    <body>
        <section class="feedback-form">
           <div class="container justify-content-center" data-aos="zoom-in" >
    <h1 class="container text-center" style="padding-top:100px;" >Log in</h1>
  <br>
  
 <div class="nav nav-tabs text-center" style="width:100%; border:none;" >

        <button class="btn btn-prim active" data-toggle="tab" href="#client">For Client</button>
      <button class="btn btn-prim" data-toggle="tab" href="#owner">For Client</button>

     
</div>


  <div class="tab-content">
    <div id="client" class="container tab-pane active"><br>
      <form class="form1" action="#" method="post">
         
          <label><i class="ion-android-mail"></i> Enter Your Email</label>
              <input type="email" name="cmail" placeholder="Enter your registered email Address" required>
           
          <label><i class="ion-locked"></i> Enter your Password</label>
              <input type="password" name="cpass" placeholder="Enter Your Password" required> 
         
          
              <input type="submit" name="submitbyclient" value="Log in">
            
  
      </form>
    
    </div>
    <div id="owner" class="container tab-pane fade"><br>
    <form class="form1" action="#" method="post">
         
          <form class="form1" action="#" method="post">
         
          <label><i class="ion-android-mail"></i> Enter Your Email</label>
              <input type="email" name="bmail" placeholder="Enter your registered email Address" required>
           
          <label><i class="ion-locked"></i> Enter your Password</label>
              <input type="password" name="bpass" placeholder="Enter Your Password" required> 
         
          
              <input type="submit" name="submitbyowner" value="Log in">
            
  
      </form>
            
  
      </form>
    </div>
    
  </div>
</div>

        </section>
    </body>
</html>
<?php
include_once("navigation.html");
?>