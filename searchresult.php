<!DOCTYPE html>
<?php 
    $bookname = $_POST["search"];
    $con = mysqli_connect('fdb28.awardspace.net','3738006_jliu13','3738006_jliu13'
        ,'3738006_jliu13');
      
      $sql = "SELECT * FROM littlelibrary where name like '%$bookname%';";
      $result = mysqli_query($con, $sql);    
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>searchresult</title>
    <link href="overview.css" type="text/css" rel="stylesheet" />
    <script>
      function myfun(){
        location.href = "http://scu-wp-jliu13.atwebpages.com/finalproject/bookdetail.php";
      }
    </script>
  </head>
  <body>
        <?php
            $idx = 0;
            while($record = mysqli_fetch_array($result)):
                   $line = $record;
                   list($name, $author, $date, $source, $status, $category) = $line; ?>
                   
                   <?php if($idx%2 == 0):?>
                    <div class = "column">
                     <div class = "left">
                       <form action="bookdetail1.php" method = "post">
                         <input type = "hidden" name = "bookdetail[0]" value = "<?=$name?>">
                         <input type = "hidden" name = "bookdetail[1]" value = "<?=$author?>">
                         <input type = "image" src="booklogo.jpg" width="180" height="180"
                             onclick = "myfun()">
                       </form>
                     </div> 
                     <div class = "right">
                              <span class = "bookname"><?= $name?></span><br>
                              Author:<span class = "author"><?= $author?></span><br>
                              <span class = "satus"><?= $status?></span><br>
                     </div>
                    </div>
                    <?php $idx= $idx + 1;?>
                    <?php else: ?>
                    <div class = "column">
                     <div class = "left">
                       <form action="bookdetail1.php" method = "post">
                         <input type = "hidden" name = "bookdetail[0]" value = "<?=$name?>">
                        
                         <input type = "hidden" name = "bookdetail[1]" value = "<?=$author?>">
                         <input type = "image" src="booklogo.jpg" width="180" height="180"
                            onclick = "myfun()">
                       </form>
                     </div> 
                     <div class = "right">
                               <span class = "bookname"><?= $name?></span><br>
                              Author:<span class = "author"><?= $author?></span><br>
                              <span class = "satus"><?= $status?></span><br>
                     </div>
                    </div>
                    <?php $idx= $idx + 1;
                    endif; ?>
     <?php endwhile;?>
  </body>
</html>
