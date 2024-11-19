<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Portofolio;

class PortofolioRepositoryImpl implements PortofolioRepository {

    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(Portofolio $portofolio): Portofolio
    {
        $statement = $this->connection->prepare("INSERT INTO portofolios (id, id_student, type, portofolio_name) VALUES(?,?,?,?)");
        $statement->execute([$portofolio->getId(), $portofolio->getIdStudent(), $portofolio->getType(), $portofolio->getPortofolioName()]);

        return $portofolio;
    }

    public function getAll(): array
    {
        $statement = $this->connection->prepare("SELECT * FROM portofolios");
        $statement->execute();

        $portofolios = [];
        try {
            if ($rows = $statement->fetchAll()) {
                foreach ($rows as $row) {
                    $portofolio = new Portofolio(
                        $row["id"], $row["id_student"], $row["type"], $row["portofolio_name"]
                    );
                    $portofolios[] = $portofolio;
                }
            }
            return $portofolios;
        } finally {
            $statement->closeCursor();
        }
    }

    public function getByIDStudent(string $id_student): array
    {
        $statement = $this->connection->prepare("SELECT * FROM portofolios WHERE id_student = ?");
        $statement->execute([$id_student]);

        $portofolios = [];
        try {
            if ($rows = $statement->fetchAll()) {
                foreach ($rows as $row) {
                    $portofolio = new Portofolio(
                        $row["id"], $row["id_student"], $row["type"], $row["portofolio_name"]
                    );
                    $portofolios[] = $portofolio;
                }
            }
            return $portofolios;
        } finally {
            $statement->closeCursor();
        }
    }

    public function delete(string $id): void
    {
        $statement = $this->connection->prepare("DELETE FROM portofolios WHERE id = ?");
        $statement->execute([$id]);
    }

    public function deleteAll(): void
    {
        $statement = $this->connection->prepare("TRUNCATE TABLE portofolios");
        $statement->execute();
    }

}