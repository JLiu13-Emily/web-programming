<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Record</title>
    <link href="record.css" type="text/css" rel="stylesheet" />
    <script>
            function myfun(){
                    location.href = "http://scu-wp-jliu13.atwebpages.com/finalproject/main.php";
            }
    </script>
  </head>
  <body>
    <?php
    $nameErr = $authorErr = $dateErr = $sourceErr = $statusErr = $categoryErr = "";

     if($_SERVER['REQUEST_METHOD'] == 'POST'){
             if(empty($_POST['name'])){
                     $nameErr = '* name is required';
             }
             if(empty($_POST['author'])){
                     $authorErr = '* author is required';
             }
             if(empty($_POST['date'])){
                     $dateErr = '* date is required';
             }
             if(empty($_POST['source'])){
                     $sourceErr = '* source is required';
             }
             if(empty($_POST['status'])){
                     $statusErr = '* status is required';
             }
             if(empty($_POST['category'])){
                     $categoryErr = '* category is required';
             }

     }
     ?>

       <form action="<?= $_server['PHP_SELF']?>" method="post">
         Book Name: <input type = "text" name = 'name'>
            <span class="error"><?php echo $nameErr; ?></span><br><br>
         Author: <input type = "text" name = 'author'>
            <span class="error"><?php echo $authorErr; ?></span><br><br>
         Aquire Date: <input type = "date" name = 'date'>
            <span class="error"><?php echo $dateErr; ?></span><br><br>
         
         <div id = "source">
         Aquire Source:<br><br>
           <input type="radio" name="source"
           value="Amazon"><label for = "Amazon">Amazon<label>
           <input type="radio" name="source" 
           value="Costco"><label for = "Costco">Costco<label>
           <input type="radio" name="source" 
           value="UsborneSeller"><label for = "UsborneSeller">UsborneSeller<label>
           <input type="radio" name="source" 
           value="BookSale"><label for = "BookSale">BookSale<label>
           <input type="radio" name="source" 
           value="gift"><label for = "gift">gift<label>
           <input type="radio" name="source" 
           value="other"><label for = "other">other<label><br>
             <span class="error"><?php echo $sourceErr;?></span><br>
         </div>
         <div id = "status">
         Status：<br><br>
           <input type="radio" name="status" value="rentout">
           <label for = "renting">RentOut<label>
           <input type="radio" name="status" value="sold">
           <label for = "sold">Sold<label>
           <input type="radio" name="status" value="hold">
           <label for = "hold">Hold<label>
           <input type="radio" name="status" value="lost">
           <label for = "lost">Lost<label>
             <span class="error"><?php echo $statusErr;?></span><br><br>
         </div>
         <div id = "category">
         Category:
           <input type="radio" name="category" value="fiction">
           <label for = "fiction">Fiction<label>
           <input type="radio" name="category" value="nonfiction">
           <label for = "nonfiction">Nonfiction<label>
           <span class="error"><?php echo $categoryErr;?></span><br><br>
         </div>
         <div id = 'submit'>
         <input type="submit" name="submit" value = "Send!"><br><br>
         </div>
        </form>
        <div>
          <input type = "button" name = "button" value = "return to main" onclick = "myfun()">
        </div>
       
  </body>
  <?php
    if(isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['author']) && !empty($_POST['date'])
            && !empty($_POST['source']) && !empty($_POST['status']) && !empty($_POST['category'])){
            $name = $_POST['name']; 
            $author = $_POST['author']; 
            $date = $_POST['date']; 
            $source = $_POST['source']; 
            $status = $_POST['status']; 
            $category = $_POST['category']; 
    
            $con = mysqli_connect('fdb28.awardspace.net',
              '3738006_jliu13','3738006_jliu13','3738006_jliu13');
            $sql = "INSERT INTO littlelibrary  VALUES ('$name', '$author',
              '$date', '$source', '$status', '$category');";
            mysqli_query($con, $sql);
    }
  ?>
</html>
