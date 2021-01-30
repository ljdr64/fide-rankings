<?php

include_once ('configdb.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$order = "DESC";

if ($_GET['order'] === 'ASC'){
    $order = 'ASC';
} else $order = 'DESC';

if ($_GET['search'] != ''){
   $sql = "SELECT * FROM players WHERE name LIKE '%" . $_GET['search'] . "%'";
}else{
   $sql = "SELECT * FROM players ORDER BY elo $order";
}

// die($sql );
$players = $conn->query ($sql); 
$table = '<table class="table table-striped text">  <tr>
<th>Ranking</th>
<th>Firstname</th>
<th>Surname</th>
<th>Elo <a href="?order=ASC"><button class="btn-primary"><i class="bi bi-arrow-down-short"></i></button></a> <a href="?order=DESC"><button class="btn-primary"><i class="bi bi-arrow-up-short"></i></button></a> </th>
<th>FideId</th>
<th>Country</th>
<th>Photo</th>
</tr>
';

foreach($players as $i => $player){
// print_r($player['name']);

    $table .= '<tr><td>' . "&nbsp". ($i + 1) . '</td>';
    $table .= '<td>' . "&nbsp". $player['name'] . '</td>';
    $table .= '<td>' . "&nbsp". $player['surname'] . '</td>';
    $table .= '<td>' . "&nbsp". $player['elo'] . '</td>';
    $table .= '<td>' . "&nbsp". "<a target='blank' href=" . "https://ratings.fide.com/profile/" . $player['fideId'] . ">".  $player['fideId'] ."</a>" . '</td>';
    $table .= '<td>' . "&nbsp". $player['country'] . '</td>';
    $table .= '<td>' . "&nbsp". "<a target='blank' href=" . "https://ratings.fide.com/profile/" . $player['fideId'] . ">".  "<img src=" . $player['photo'] . " width='150'>" . '</td>' ."</a>" . '</td>';
    $table .= '</tr>';
}   
$table .= '<table>';
// die()

?>
<!DOCTYPE html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<title>
Fide 
</title>
</head>
<body>
<h1 style='text-align: center;'>  Player List </h1>
<div class='container'>
    <form method="GET" action="players.php" class="form-inline my-2 my-lg-0" style="width:50%;margin-left:-0px;margin-top:10px;margin-bottom:10px;padding-bottom:20px;">
          <input class="form-control mr-sm-2" type="search" placeholder="Name" aria-label="Search" name="search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin-top:10px !important;margin-bottom:10px !important;">Search</button>
    </form>
</div>
<div class="container">
   <?=$table?>
</div>
 <!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- . Bootstrap JS -->
<style>
.table > tbody > tr > td {
     vertical-align: middle;
}
</style>
</body>
</html>