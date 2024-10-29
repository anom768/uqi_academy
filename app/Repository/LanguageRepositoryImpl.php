<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Language;
use com\bangkitanomsedhayu\uqi\academy\Entity\Skill;

class LanguageRepositoryImpl implements LanguageRepository {

    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(Language $language): Language
    {
        $statement = $this->connection->prepare("INSERT INTO language (id_student, language, score) VALUES (?,?,?)");
        $statement->execute([$language->getIdStudent(), $language->getLanguage(), $language->getScore()]);

        $language->setId($this->connection->lastInsertId());
        return $language;
    }

    public function getByIDStudent(string $id_student): array
    {
        $statement = $this->connection->prepare("SELECT * FROM languages WHERE id_student = ?");
        $statement->execute([$id_student]);

        $languages = [];
        try {
            if ($rows = $statement->fetchAll()) {
                foreach ($rows as $row) {
                    $languages[] = new Language($row["id"], $row["id_student"], $row["language"], (int)$row["score"]);
                }
            }
            return $languages;
        } finally {
            $statement->closeCursor();
        }
    }

    public function delete(string $id_student, string $language): void
    {
        $statement = $this->connection->prepare("DELETE FROM language WHERE id_student = ? AND language = ?");
        $statement->execute([$id_student, $language]);
    }

    public function deleteAll(): void
    {
        $statement = $this->connection->prepare("TRUNCATE TABLE languages");
        $statement->execute();
    }

}