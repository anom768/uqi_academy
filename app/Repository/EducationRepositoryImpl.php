<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Education;

class EducationRepositoryImpl implements EducationRepository {

    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(Education $education): Education
    {
        $statement = $this->connection->prepare("INSERT INTO educations (id_student, school, type, entry_year, graduate_year, address, description) VALUES (?,?,?,?,?,?,?)");
        $statement->execute([$education->getIdStudent(), $education->getSchool(), $education->getType(), $education->getEntryYear(), $education->getGraduateYear(), $education->getAddress(), $education->getDescription()]);

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
                    $educations[] = new Education($row["id"], $row["id_student"], $row["type"], $row["school"], (int)$row["entry_year"], (int)$row["graduate_year"], $row["address"], $row["description"]);
                }
            }
            return $educations;
        } finally {
            $statement->closeCursor();
        }
    }

    public function delete(int $id): void
    {
        $statement = $this->connection->prepare("DELETE FROM educations WHERE id = ?");
        $statement->execute([$id]);
    }

    public function deleteAll(): void
    {
        $statement = $this->connection->prepare("TRUNCATE TABLE educations");
        $statement->execute();
    }

}