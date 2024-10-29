<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Education;
use com\bangkitanomsedhayu\uqi\academy\Entity\Language;
use com\bangkitanomsedhayu\uqi\academy\Entity\Skill;

class EducationRepositoryImpl implements EducationRepository {

    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(Education $education): Education
    {
        $statement = $this->connection->prepare("INSERT INTO education (id_student, school, entry_year, graduate_year) VALUES (?,?,?,?)");
        $statement->execute([$education->getIdStudent(), $education->getSchool(), $education->getEntryYear(), $education->getGraduateYear()]);

        $education->setId($this->connection->lastInsertId());
        return $education;
    }

    public function getByIDStudent(string $id_student): array
    {
        $statement = $this->connection->prepare("SELECT * FROM educations WHERE id_student = ?");
        $statement->execute([$id_student]);

        $educations = [];
        try {
            if ($rows = $statement->fetchAll()) {
                foreach ($rows as $row) {
                    $educations[] = new Education($row["id"], $row["id_student"], $row["school"], (int)$row["entry_year"], (int)$row["graduate_year"]);
                }
            }
            return $educations;
        } finally {
            $statement->closeCursor();
        }
    }

    public function delete(string $id_student, string $school): void
    {
        $statement = $this->connection->prepare("DELETE FROM educations WHERE id_student = ? AND school = ?");
        $statement->execute([$id_student, $school]);
    }

    public function deleteAll(): void
    {
        $statement = $this->connection->prepare("TRUNCATE TABLE educations");
        $statement->execute();
    }

}