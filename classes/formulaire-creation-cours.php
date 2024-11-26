<?php 

class FormulaireCreationCours {
    
    private $pdo;
    private $requeteSqlRecuperationSujets = "SELECT * FROM subject";
    private $requeteSqlRecuperationProfs = "SELECT id, first_name, surname FROM user WHERE role = 'enseignant'";

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function recuperationDesSujets()
    {
        $stmt = $this->pdo->prepare($this->requeteSqlRecuperationSujets);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function recuperationDesProfs()
    {
        $stmt = $this->pdo->prepare($this->requeteSqlRecuperationProfs);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function gestionFormulaire()
    {
        $form = new FormulaireCours();
        
        // Prepares the SQL statement
        $sql_schedule = "INSERT INTO schedule (subject_id, class_id, teacher_id, start_datetime, end_datetime) 
                        VALUES (:subject_id, :class_id, :teacher_id, :start_datetime, :end_datetime)";

        // Executes the prepared statement
        $stmt_schedule = $this->pdo->prepare($sql_schedule);
        $stmt_schedule->bindParam(':subject_id', $form->subject_id, PDO::PARAM_INT);
        $stmt_schedule->bindParam(':class_id', $form->class_id, PDO::PARAM_INT);
        $stmt_schedule->bindParam(':teacher_id', $form->teacher_id, PDO::PARAM_INT);
        $stmt_schedule->bindParam(':start_datetime', $form->start_datetime_str, PDO::PARAM_STR);
        $stmt_schedule->bindParam(':end_datetime', $form->end_datetime_str, PDO::PARAM_STR);
        $stmt_schedule->execute();
    }
}