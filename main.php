<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BookBug</title>
    <link href="lib.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
<script>
  function myfunction(){
          location.href = 'http://scu-wp-jliu13.atwebpages.com/finalproject/record.php';
  }
  function myfun(){
          location.href = 'http://scu-wp-jliu13.atwebpages.com/finalproject/overview.php';
  }
  function search(){
          location.href = 'http://scu-wp-jliu13.atwebpages.com/finalproject/searchresult.php';
  }
</script>
    <h1>Little Library</h><br><br>
      <div class = 'choices'>
        <form action="searchresult.php?>" method = "post">
          <input type = 'button' value="Create new record" onclick = "myfunction()"><br>
          <input type = 'button' value="Overview" onclick="myfun()"><br>
          <input type = 'text' name = 'search'>
          <input type = "submit" value="Search" >
        </form>
      </div>
  </body>
</html>
