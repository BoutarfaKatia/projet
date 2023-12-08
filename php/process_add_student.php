<?php
require_once 'db_connect.php';

class Student {
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $groupe;
// Constricteur 
    public function __construct($nom = '', $prenom = '', $email = '', $groupe = '') {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->groupe = $groupe;
    }
 //Methode pour ajouter un etudiant
    public function addStudentToDatabase() {
        global $pdo;

        try {
            $sql = "INSERT INTO students (nom, prenom, email, groupe) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$this->nom, $this->prenom, $this->email, $this->groupe]);
            $this->id = $pdo->lastInsertId();
            header("Location: listeEtudiants.php");
            exit();
        } catch (PDOException $e) {
            die("Erreur lors de l'ajout de l'étudiant : " . $e->getMessage());
        }
    }
// methode pour chercher un etudiant
    public function getStudents($filter = '') {
        global $pdo;

        try {
            $sql = "SELECT * FROM students WHERE nom LIKE :filter OR prenom LIKE :filter OR email LIKE :filter";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':filter', "%$filter%", PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la récupération des étudiants : " . $e->getMessage());
        }
    }
// methode pour afficher tout les etudiants
    public function getAllStudents() {
        global $pdo;

        try {
            $sql = "SELECT * FROM students";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la récupération de tous les étudiants : " . $e->getMessage());
        }
    }
}
// recuperer les information de l'etudiant

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $groupe = $_POST["groupe"];

    $student = new Student($nom, $prenom, $email, $groupe); 
    $student->addStudentToDatabase(); // ajouter l'etudiant a la base de donnée
}
?>
