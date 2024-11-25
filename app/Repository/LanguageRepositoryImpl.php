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
        $statement = $this->connection->prepare("INSERT INTO languages (id_student, language, score) VALUES (?,?,?)");
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

    public function update(Language $newLanguage): Language
    {
        $statement = $this->connection->prepare("UPDATE languages SET language = ?, score = ? WHERE id = ?");
        $statement->execute([$newLanguage->getLanguage(), $newLanguage->getScore(), $newLanguage->getId()]);
        return $newLanguage;
    }

    public function delete(int $id): void
    {
        $statement = $this->connection->prepare("DELETE FROM languages WHERE id = ?");
        $statement->execute([$id]);
    }

    public function deleteAll(): void
    {
        $statement = $this->connection->prepare("TRUNCATE TABLE languages");
        $statement->execute();
    }

}