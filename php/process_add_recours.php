<?php
require_once 'db_connect.php';
class Recours {
        private $id_student ;
        private $module ;
        private $status ;
        private $nature ;
        private $note_affiche ;
        private $note_reel ;
    //Constructeur 
        public function __construct($id_student='', $module='',$nature='',$note_affiche='',$note_reel='', $status='') {
            $this->id_student = $id_student;
            $this->module = $module;
            $this->note_affiche= $note_affiche;
            $this->note_reel = $note_reel;
            $this->nature = $nature;
            $this->status = $status;
        }
    //Methode pour ajouter un recour
    function addrecours() {
        global $pdo;
        try {
            // Check if the id_etudiant exists in the students table
            if ($this->isIdEtudiantValid($this->id_student)) {
                // Check if note_affiche and note_reel are within the specified range
                if ($this->isValidNoteRange($this->note_affiche) && $this->isValidNoteRange($this->note_reel)) {
                    $sql = "INSERT INTO recours (id_student, module, nature, note_affiche, note_reel, status) VALUES (?, ?, ?, ?, ?, ?)";
                    $res = $pdo->prepare($sql);
                    $res->execute([
                        $this->id_student,
                        $this->module,
                        $this->nature,
                        $this->note_affiche,
                        $this->note_reel,
                        $this->status
                    ]);

                    // javascript code to display an alert
                    echo "<script>alert('Recours envoyé');</script>";
                    //header to the dashboard
                    echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 3000);</script>"; 
                } else {
                    // Handle the case where note_affiche or note_reel is outside the valid range
                    echo "Invalid note range. Note should be between 0 and 20.";
                   
                }
               
            } else {
                // Handle the case where id_etudiant does not exist in the students table
                echo "Invalid student ID. Student ID does not exist.";
            }


        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    //Methode pour valider l'id 
    function isIdEtudiantValid($idEtudiant) {
        global $pdo;
    
        try {
            $sql = "SELECT COUNT(*) FROM students WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$idEtudiant]);
            $count = $stmt->fetchColumn();
    
            return $count > 0;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }
// Methode pour valider la note
    function isValidNoteRange($note) {
        return is_numeric($note) && $note >= 0 && $note <= 20;
    }



}

      // Récupérer les données du formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
          
            $id_student = $_POST["id_student"];
            $module = $_POST["module"];
            $nature = $_POST["nature"];
            $note_affiche = $_POST["note_affiche"];
            $note_reel = $_POST["note_reel"];
            if($_POST["status"]=="favorable") 
            $status = 1; 
        elseif($_POST["status"]=="defavorable")
            $status = 2 ;
            $Recour=new Recours($id_student,$module,$nature,$note_affiche,$note_reel,$status);

            $Recour->addrecours();} //Ajouter le recours 