<!DOCTYPE html>
<?php
      $con = mysqli_connect('fdb28.awardspace.net','3738006_jliu13','3738006_jliu13'
        ,'3738006_jliu13');
      $sql = "SELECT * FROM littlelibrary ";
      $result = mysqli_query($con, $sql);
      
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Overview</title>
    <link href="overview.css" type="text/css" rel="stylesheet" />
    <script>
      function myfun(){
        location.href = "http://scu-wp-jliu13.atwebpages.com/finalproject/bookdetail.php";
      }
      function myfun2(){
        location.href = "http://scu-wp-jliu13.atwebpages.com/finalproject/main.php";
      }
      function edit(){
        location.href = "http://scu-wp-jliu13.atwebpages.com/finalproject/edit.php";
      }
    </script>
  </head>
  <body>
    
    <?php
    $idx = 0;
    while($record = mysqli_fetch_array($result)):
           $line = $record;
           list($name, $author, $date, $source, $status) = $line; ?>
           <?php if($idx%2 == 0):?>
            <div class = "column">
              <div class = 'box'>
                     <div class = "left">
                       <form action="bookdetail1.php" method = "post">
                         <input type = "hidden" name = "bookdetail[0]" value = "<?=$name?>">
                         <input type = "hidden" name = "bookdetail[1]" value = "<?=$author?>">
                          <input type = "image" src="booklogo.jpg" width="180" height="180"
                             onclick = "myfun()">
                       </form >
                     </div> 
                     <p class = "abstract">
                              <span class = "bookname"><?= $name?></span><br><br>
                              Author:<span class = "author"><?= $author?></span><br><br>
                              <span class = "satus"><?= $status?></span><br>
                              
                     </p>
                    </div>
               </div>
            <?php $idx= $idx + 1;?>
            <?php else: ?>
            <div class = "column">
              <div class = 'box'>
                     <div class = "left">
                       <form action="bookdetail1.php" method = "post">
                         <input type = "hidden" name = "bookdetail[0]" value = "<?=$name?>">
                         <input type = "hidden" name = "bookdetail[1]" value = "<?=$author?>">
                         
                         <input type = "image" src="booklogo.jpg" width="180" height="180"
                            onclick = "myfun()">
                       </form>
                     </div> 
                     <p class = "abstract">
                               <span class = "bookname"><?= $name?></span><br><br>
                              Author:<span class = "author"><?= $author?></span><br><br>
                              <span class = "satus"><?= $status?></span><br><br>
                     </p>
                    </div>
              </div>
          <?php $idx= $idx + 1;
            endif; ?>
     <?php endwhile;?>
     <input type = "button" value = "return to main" onclick = "myfun2()"><br><br>
  </body>
</html>

                