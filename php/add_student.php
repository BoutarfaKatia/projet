<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS --> 
    <link rel="stylesheet" type="text/css" href="../css/adds.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Ajouter un Etudiant</title>
</head>
<body>
<div class="container">
        <!-- left side -->
    <div class="img">
    <img src="../img/wave.png" alt="">
    <img src="../img/undraw_predictive_analytics_re_wxt8.svg" alt="" class="img2">
    </div>
    <!-- right side -->
    <div class="info">
     <form action="process_add_student.php" method="POST">
        <img src="../img/avatar.svg" alt="">
        <h2>Welcome</h2>
   
        <div class="input-box">
           <input type="text" name="nom" placeholder="Nom" required>
        </div>
        <div class="input-box">
           <input type="text" name="prenom" placeholder="Prenom" required>
        </div>
        <div class="input-box">
           <input type="text" name="email" placeholder="Email" required>
        </div>
        <div class="input-box">
           <input type="text" name="groupe" placeholder="Groupe" required>
        </div> 
           <input type="submit" name="btn" class="btn" value="Ajouter">

    </form>
    </div>
</div>
</body>
</html>