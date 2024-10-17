<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Batch;

class BatchRepositoryImpl implements BatchRepository {

    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(Batch $batch): Batch
    {
        $statement = $this->connection->prepare("INSERT INTO batch (id_student, year, batch) VALUES (?,?,?)");
        $statement->execute([$batch->getIdStudent(), $batch->getYear(), $batch->getBatch()]);

        $batch->setId($this->connection->lastInsertId());
        $batch->setRegistrationDate($this->getByIDStudent($batch->getIdStudent())->getRegistrationDate());
        return $batch;
    }

    public function getByIDStudent(string $id_student): ?Batch
    {
        $statement = $this->connection->prepare("SELECT * FROM batch WHERE id_student = ?");
        $statement->execute([$id_student]);

        try {
            if ($row = $statement->fetch()) {
                $batch = new Batch($row["id"], $row["id_student"], $row["registration_date"], (int)$row["year"], (int)$row["batch"]);
                return $batch;
            }
            return null;
        } finally {
            $statement->closeCursor();
        }
    }

    public function getByBatch(int $year, int $batch): array
    {
        $statement = $this->connection->prepare("SELECT * FROM batch WHERE year = ? AND batch = ?");
        $statement->execute([$year, $batch]);

        $batchs = [];
        try {
            if ($rows = $statement->fetchAll()) {
                foreach ($rows as $row) {
                    $batch = new Batch($row["id"], $row["id_student"], $row["registration_date"], $row["year"], $row["batch"]);
                    $batchs[] = $batch;
                }
                
                return $batchs;
            }
            return $batchs;
        } finally {
            $statement->closeCursor();
        }
    }

    public function getAll(): array
    {
        $statement = $this->connection->prepare("SELECT * FROM batch");
        $statement->execute();

        $batchs = [];
        try {
            if ($rows = $statement->fetchAll()) {
                foreach ($rows as $row) {
                    $batch = new Batch($row["id"], $row["id_student"], $row["registration_date"], $row["year"], $row["batch"]);
                    $batchs[] = $batch;
                }
                
                return $batchs;
            }
            return $batchs;
        } finally {
            $statement->closeCursor();
        }
    }

    public function update(Batch $newbatch): Batch
    {
        $statement = $this->connection->prepare("UPDATE batch SET year = ?, batch = ? WHERE id_student = ?");
        $statement->execute([$newbatch->getYear(), $newbatch->getBatch(), $newbatch->getIdStudent()]);

        return $newbatch;
    }

    public function deleteAll(): void
    {
        $statement = $this->connection->prepare("TRUNCATE TABLE batch");
        $statement->execute();
    }

}