<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Batch;
use com\bangkitanomsedhayu\uqi\academy\Entity\Skill;

class SkillRepositoryImpl implements SkillRepository {

    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(Skill $skill): Skill
    {
        $statement = $this->connection->prepare("INSERT INTO skills (id_student, skill, score) VALUES (?,?,?)");
        $statement->execute([$skill->getIdStudent(), $skill->getSkill(), $skill->getScore()]);

        $skill->setId($this->connection->lastInsertId());
        return $skill;
    }

    public function getByIDStudent(string $id_student): array
    {
        $statement = $this->connection->prepare("SELECT * FROM skills WHERE id_student = ?");
        $statement->execute([$id_student]);

        $skills = [];
        try {
            if ($rows = $statement->fetchAll()) {
                foreach ($rows as $row) {
                    $skills[] = new Skill($row["id"], $row["id_student"], $row["skill"], (int)$row["score"]);
                }
            }
            return $skills;
        } finally {
            $statement->closeCursor();
        }
    }

    public function delete(int $id): void
    {
        $statement = $this->connection->prepare("DELETE FROM skills WHERE id = ?");
        $statement->execute([$id]);
    }

    public function deleteAll(): void
    {
        $statement = $this->connection->prepare("TRUNCATE TABLE skills");
        $statement->execute();
    }

}