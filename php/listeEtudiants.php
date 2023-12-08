<?php
// Inclure le fichier de connexion à la base de données
require_once 'db_connect.php';
require_once 'process_add_student.php';

// Créer une instance de la classe Student
$student = new Student(); // Utilisez une variable distincte pour l'objet Student

$allStudents = $student->getAllStudents(); // Utilisez une variable distincte pour le tableau d'étudiants

// Ajouter la logique de recherche ici
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Récupérer les étudiants avec le filtre
$students = $searchTerm ? $student->getStudents($searchTerm) : $allStudents;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
    /* Add a custom CSS style  */
    th { 
        background-color: #32be8f;
        color: #fff; 
    }

    .btn2 { 
        display: inline-block; 
        width: fit-content;
        padding: 10px 20px; 
        border-radius: 25px;
        outline: none;
        border: none;
        background-image: linear-gradient(to right, #32be8f, #38d39f, #32be8f);
        background-size: 200%;
        font-size: 1.2rem;
        color: #fff;
        font-family: "Poppins", sans-serif;
        text-transform: uppercase;
        cursor: pointer;
        transition: 0.5s;
    }

    .form-control { 
        border-radius: 25px;
        height: 50px;
        transition: 0.5s;
    }

    /* Style for focused input */
    .form-control:focus { 
        border-color: #38d39f;
    }

    h2 {
        font-size: 2.5rem; 
        color: #38d39f; 
        margin-bottom: 30px; 
        text-transform: uppercase;
        text-align: center; 
    }

    header {
        background-color: #f8f9fa; 
        padding: 20px; 
        text-align: center;
    }

    table {
        border-radius: 10px;
        overflow: hidden;
    }

    table th, table td {
        border: 1px solid #dee2e6;
    }

    .btn2:hover {
        background-position: right center;
        transform: scale(1.05);
    }
    </style>

    <title>All Students</title>
</head>
<body>
    <div class="container-fluid mt-4">
        <h2 class="text-center mb-4">Liste de tous les étudiants</h2>

        <!-- Formulaire de recherche -->
        <form action="listeEtudiants.php" method="GET" class="mb-4">
            <div class="form-row">
                <div class="col">
                    <input type="text" name="search" class="form-control" placeholder="Rechercher par nom, prénom ou email">
                </div>
                <div class="col">
                    <button type="submit" class="btn2 btn-primary">Rechercher</button>
                </div>
            </div>
        </form>

        <!-- Tableau Bootstrap -->
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead >
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Groupe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $index => $student): ?>
                        <tr>
                            <td><?= $student['id'] ?></td>
                            <td><?= $student['nom'] ?></td>
                            <td><?= $student['prenom'] ?></td>
                            <td><?= $student['email'] ?></td>
                            <td><?= $student['groupe'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
