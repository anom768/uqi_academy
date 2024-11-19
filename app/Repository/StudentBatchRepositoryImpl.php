<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Student;
use com\bangkitanomsedhayu\uqi\academy\Entity\StudentBatch;

class StudentBatchRepositoryImpl implements StudentBatchRepository {

    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    function getByID(string $id): StudentBatch
    {
        $statement = $this->connection->prepare("SELECT s.id as id, s.temp_password as temp_password, s.photo as photo, s.fullname as fullname, s.specialist as specialist, s.email as email, s.website as website, s.bio as bio, s.phone as phone, s.address as address, s.school as school, s.status as status, b.id as id_batch, b.year as year, b.batch as batch  FROM students as s JOIN batch as b ON (s.id = b.id_student) WHERE s.id = ?");
        $statement->execute([$id]);

        try {
            if ($row = $statement->fetch()) {
                return new StudentBatch(
                    $row["id"], $row["temp_password"], $row["photo"], $row["fullname"], 
                    $row["specialist"], $row["email"], $row["website"], $row["bio"], $row["phone"],
                    $row["address"], $row["school"], $row["status"], $row["id_batch"], $row["year"], $row["batch"]
                );
            } 
            return null;
        } finally {
            $statement->closeCursor();
        }
    }

    function getAll(): array
    {
        $statement = $this->connection->prepare("SELECT s.id as id, s.temp_password as temp_password, s.photo as photo, s.fullname as fullname, s.specialist as specialist, s.email as email, s.website as website, s.bio as bio, s.phone as phone, s.address as address, s.school as school, s.status as status, b.id as id_batch, b.year as year, b.batch as batch  FROM students as s JOIN batch as b ON (s.id = b.id_student)");
        $statement->execute([]);

        $studentBatchs = [];
        try {
            if ($rows = $statement->fetchAll()) {
                foreach ($rows as $row) {
                    $studentBatchs[] = new StudentBatch(
                        $row["id"], $row["temp_password"], $row["photo"], $row["fullname"], 
                        $row["specialist"], $row["email"], $row["website"], $row["bio"], $row["phone"],
                        $row["address"], $row["school"], $row["status"], $row["id_batch"], $row["year"], $row["batch"]
                    );
                }
            }
            
            return $studentBatchs;
        } finally {
            $statement->closeCursor();
        }
    }

}