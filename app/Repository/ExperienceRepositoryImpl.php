<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Experience;

class ExperienceRepositoryImpl implements ExperiencesRepository {

    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(Experience $experience): Experience
    {
        $statement = $this->connection->prepare("INSERT INTO experiences (id_student, type, company, entry_date, end_date, address, website, description) VALUES (?,?,?,?,?,?,?,?)");
        $statement->execute([$experience->getIdStudent(), $experience->getType(), $experience->getCompany(), $experience->getEntryDate(), $experience->getEndDate(), $experience->getAddress(), $experience->getWebsite(), $experience->getDescription()]);

        $experience->setId($this->connection->lastInsertId());
        return $experience;
    }

    public function getByIDStudent(string $id_student): array
    {
        $statement = $this->connection->prepare("SELECT * FROM experiences WHERE id_student = ?");
        $statement->execute([$id_student]);

        $experiences = [];
        try {
            if ($rows = $statement->fetchAll()) {
                foreach ($rows as $row) {
                    $experiences[] = new Experience($row["id"], $row["id_student"], $row["type"], $row["company"], $row["entry_date"], $row["end_date"], $row["address"], $row["website"], $row["description"]);
                }
            }
            return $experiences;
        } finally {
            $statement->closeCursor();
        }
    }

    public function update(Experience $newExperience): Experience
    {
        $statement = $this->connection->prepare("UPDATE experiences SET type = ?, company = ?, entry_date = ?, end_date = ?, address = ?, website = ?, description = ? WHERE id = ?");
        $statement->execute([$newExperience->getType(), $newExperience->getCompany(), $newExperience->getEntryDate(), $newExperience->getEndDate(), $newExperience->getAddress(), $newExperience->getWebsite(), $newExperience->getDescription(), $newExperience->getId()]);
        return $newExperience;
    }

    public function delete(int $id): void
    {
        $statement = $this->connection->prepare("DELETE FROM experiences WHERE id = ?");
        $statement->execute([$id]);
    }

    public function deleteAll(): void
    {
        $statement = $this->connection->prepare("TRUNCATE TABLE experiences");
        $statement->execute();
    }

}