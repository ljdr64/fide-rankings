<?php
if (isset($_POST['submit'])){
    // validar que todos los campos esten completos
    if ($_POST['name'] !== '' && $_POST['surname'] !== '' && $_POST['elo'] !== '' && $_POST['fideId'] !== '' && $_POST['photo'] !== '' && $_POST['country'] !== ''){
        $validation = true;
        try {
            
           include_once ('configdb.php');
                       
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            };
            
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $elo = $_POST['elo'];
            $photo = $_POST['photo'];
            $fideId = $_POST['fideId'];
            $country = $_POST['country'];


            $sql = "INSERT INTO players (name, surname, elo, fideId, country, photo)
            VALUES ('$name', '$surname', '$elo', '$fideId', '$country', '$photo')";
            
          
            if ($conn->query($sql) === TRUE) {
              // save to DB and redirect to player list
              header("Location: players.php");
              die();
            } else {
             $validation = false;
            }
            
            $conn->close();
        } catch (Exception $e) {
            print_r($e);die();
        }
    }else{
        $validation = false;
    } 
}else{
  $validation = true;
}
?>
<!DOCTYPE html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<title>
Fide 
</title>
</head>
<body>
    <h1 style='text-align: center;'>  Formulario Fide </h1>
    
<div class="container">
    <form method="POST" action="index.php" name="fide" id="fide">
    <div class="form-group">
        <label for="exampleInputtext1">Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="textHelp" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="exampleInputtext1">Surname</label>
        <input type="text" class="form-control" id="surname" name="surname"  aria-describedby="textHelp" placeholder="Enter Surname">
    </div>
    <div class="form-group">
        <label for="exampleInputtext1">Elo</label>
        <input type="number" class="form-control" id="elo" name="elo" aria-describedby="textHelp" placeholder="Enter Elo">
    </div>
    <div class="form-group">
        <label for="exampleInputtext1">ID Fide</label>
        <input type="text" class="form-control" id="fideId" name="fideId" aria-describedby="textHelp" placeholder="Enter ID Fide">
    </div> 
    <div class="form-group">
        <label for="exampleInputtext1">Country</label>
        <input type="text" class="form-control"  id="country" name="country"  aria-describedby="textHelp" placeholder="Enter Country">
    </div> 
    <div class="form-group">
        <label for="exampleInputtext1">Photo</label>
        <input type="text" class="form-control" id="photo" name="photo" aria-describedby="textHelp" placeholder="Enter Photo">
    </div> 
    <br>   
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </br>
    <?php
    if ($validation !== true){   
    ?>
    <div class="visible alert alert-info mt-5" role="alert" id="validationMessage">
        No se pude ingresar el registro
    </div>
    <?php  }  ?>
    </form>   
</div>
 <!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- . Bootstrap JS -->
<script>
    var ele = document.getElementById('validationMessage') ;
if (ele !=null) {
    //do stuff
    setTimeout(()=>{
    ele.className=ele.className.concat(' invisible');

    }, 5000);
}
 </script>
</body>
</html>