<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/recours.css">
    <title>Student Form</title>
</head>
<body>
    <div class="wrapper">
        <div class="inner">
            <div class="images-holder">
                <img src="../img/image1.jpg" alt="image">
            </div>

            <form action="process_add_recours.php" method="post">
                <h3>Ajouter un recours</h3>
                <div class="txt_field">
                    <input type="text" name="id_student" placeholder="id student" class="form-control" required>
                </div>

                <div class="txt_field">
                    <input type="text" id="module" name="module" placeholder="Module" class="form-control" required>
                </div>

                <div class="txt_field">
                    <select name="nature" class="form-control" required>
                        <option value="cc">cc</option>
                        <option value="Examen">Examen</option>
                    </select>
                </div>

                <div class="txt_field">
                    <input type="text" id="note_affiche" name="note_affiche" placeholder="Note affiche" class="form-control" required>
                </div>

                <div class="txt_field">
                    <input type="text" id="note_reel" name="note_reel" placeholder="Note reel" class="form-control" required>
                </div>

                <br>
                <div class="input-box">
                    <label class="status">Status :</label>
                    <label for="status" class="status">favorable</label>
                    <input type="radio" id="" name="status" value="favorable">
                    <label for="status" class="status">defavorable</label>
                    <input type="radio" id="" name="status" value="defavorable">
                </div><br>

                <button>Ajouter</button>
            </form>
        </div>
    </div>
</body>
</html>