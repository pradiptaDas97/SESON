<?php


if(isset($_GET['submit']))
{
    $x="hel";
    $len=strlen($x);
    if($len<7){
        $y="helloooo"; 
    }
    
}
        
?>
<html>
    <head>
        <style>
            p{
                display: none;
            }
        
        </style>
    
    
    </head>
    <body style="padding-top:100px;">
        <p id="para">hello</p>
        <form action="" method="get">
    <label>Enter name</label>
    <input type="text" name="name" required>
    <input type="submit" name="submit" value="register" onclick="xyz();">
        </form>
    <script type="text/javascript">
    function xyz(){
        var x="<?php echo $y; ?>";
        document.getElementById('para').innerHTML=x;
        document.getElementById('para').style.display='block';
        
    }
    
    </script>

    </body>
</html>

<?php

include_once("navigation.html");
        
?>