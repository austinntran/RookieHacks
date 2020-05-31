<?php
 include_once('fix_mysql.inc.php');
 mysql_connect("localhost","root","") or die("could not connect");
 mysql_select_db("pokemon") or die("could not find db!");
$output = '';
//collect
if(isset($_POST['search'])) {
  $searchq = $_POST['search'];
  $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

  $query = mysql_query("SELECT * FROM members WHERE name LIKE '%$searchq%' OR id LIKE '%$searchq%'") or die("could not search");
  $count = mysql_num_rows($query);
  if($count == 0) {
    $output = 'There was no search results!';
  }else{
    while($row = mysql_fetch_array($query)) {
      $id = $row['id'];
      $name = $row['name'];
      $type1 = $row['type1'];
      $type2 = $row['type2'];
      $output .= '<div> '.$id.' '.$name.' '.$type1.' '.$type2.'</div>';
    }
  }
}
?>
<?php print("$output");?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Webpage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
    <body>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#"><img src="logo.png" height="50px"></img></a>

        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Link 1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link 2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link 3</a>
          </li>
        </ul>
        <form class="form-inline right" action="index.php" method="post">
          <input class="form-control mr-sm-2" type="text" placeholder="Search for a Pokemon" name="search">
          <input class="btn btn-success" type="submit" value="Search"/>
        </form>
      </nav>
      <div class="bg-image"></div>

      <!-- <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">PokeFight</a>
          </div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            <li><a href="#">Page 3</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <form class="form-inline">
              <div class="md-form my-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
              </div>
            </form>
          </ul>
        </div>
      </nav> -->

    </body>
</html>
