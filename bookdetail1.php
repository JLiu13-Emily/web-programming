<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>bookreview</title>
    <link href="bookdetail.css" type="text/css" rel="stylesheet" />
    <?php  
          $twodetails = $_POST["bookdetail"];
          $name= $twodetails[0];
          $author = $twodetails[1];
          $con = mysqli_connect('fdb28.awardspace.net','3738006_jliu13','3738006_jliu13'
        ,'3738006_jliu13');
          $sql = "SELECT * FROM littlelibrary where name = '$name' and author = '$author';";          
          $result = mysqli_query($con, $sql);
          while($line = mysqli_fetch_array($result)){
              list($name, $author,$date, $source, $status, $category) = $line; 
          }         
          $sql2 = "SELECT * FROM review where name = '$name' and author = '$author';";
          $result2 = mysqli_query($con, $sql2);

    ?>
    <h1><?= $name?></h1>
    <script>
                function myfun(){
                        var input = document.getElementById('input').value;                        
                        var node = document.createElement("LI");
                          var textnode = document.createTextNode(input);
                          node.appendChild(textnode);
                          document.getElementById("myList").appendChild(node);
                      
                } 
                function myfun2(){
                        location.href = "http://scu-wp-jliu13.atwebpages.com/finalproject/overview.php";
                }
                function edit(){
                        location.href = "http://scu-wp-jliu13.atwebpages.com/finalproject/edit.php";
                }
    </script>
  </head>
  <body>
        <div class = "general">
                <p><?= 'Author: '.$author ?></p>
                <p><?= 'Bought Date: '.$date ?></p>
                <p><?= 'From: '.$source ?></p>
                <p><?= 'Available: '.$status ?></p>
                <p><?= 'Category: '.$category ?></p>
        </div>
        <span style ="font-size:20pt">Review:<span>
        <div class = "review">                                  
                <ul id = 'myList'>
                 <?php 
                while($record = mysqli_fetch_array($result2)):
                      $review = $record[2];?>   
                       <li><?=$review?></li>
                       
                       <?php endwhile;?>
                </ul>
                
                <form action ="<?= $_server['PHP_SELF']?>" method = "post" target="iframe"> 
                       
                       <textarea id = 'input' name = 'input' rows="10" cols="30"></textarea>
                       <input type = 'hidden' name = 'name' value = "<?=$name?>">
                       <input type = 'hidden' name = 'author' value = "<?=$author?>">
                       <input type="submit"  onclick = "myfun()"><br>
                       <input type = "button" onclick = "myfun2()" value = "return to overview"><br><br>
               </form>
               <iframe id="iframe" name="iframe" style="display:none;"></iframe>
        </div>
       
  </body>
</html>
<?php
        
        if(isset($_POST['input'])){
                $newreview = $_POST['input'];
                $name = $_POST['name'];
                $author = $_POST['author'];
                $date = $_POST['date'];
                $sql3 = "INSERT INTO review  VALUES ('$name', '$author', '$newreview');";
                mysqli_query($con, $sql3);
      }
?>