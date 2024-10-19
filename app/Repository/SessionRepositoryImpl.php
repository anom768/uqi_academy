<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Session;

class SessionRepositoryImpl implements SessionRepository {

    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Session $session): Session
    {
        $statement = $this->connection->prepare("INSERT INTO sessions(id, id_student) VALUES (?, ?)");
        $statement->execute([$session->getId(), $session->getIdStudent()]);
        return $session;
    }

    public function getById(string $id): ?Session
    {
        $statement = $this->connection->prepare("SELECT id, id_student FROM sessions WHERE id = ?");
        $statement->execute([$id]);

        try {
            if($row = $statement->fetch()){
                $session = new Session($row['id'], $row['id_student']);
                return $session;
            }
            return null;
        } finally {
            $statement->closeCursor();
        }
    }

    public function deleteById(string $id): void
    {
        $statement = $this->connection->prepare("DELETE FROM sessions WHERE id = ?");
        $statement->execute([$id]);
    }

    public function deleteAll(): void
    {
        $this->connection->exec("DELETE FROM sessions");
    }

}