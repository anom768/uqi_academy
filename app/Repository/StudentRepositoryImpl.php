<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Student;

class StudentRepositoryImpl implements StudentRepository {

    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    function add(Student $student) :Student {
        $statement = $this->connection->prepare("INSERT INTO students (photo, fullname, phone, address, school, status) VALUES(?,?,?,?,?,?)");
        $statement->execute([$student->getPhoto(), $student->getFullname(), $student->getPhone(), $student->getAddress(), $student->getSchool(), $student->getStatus()]);

        $student->setId($this->connection->lastInsertId());
        return $student;
    }

    function getByID(string $id): ?Student
    {
        $statement = $this->connection->prepare("SELECT * FROM students WHERE id = ?");
        $statement->execute([$id]);

        try {
            if ($row = $statement->fetch()) {
                $student = new Student(
                    $row["id"], $row["photo"], $row["fullname"], $row["phone"], $row["address"], $row["school"], $row["status"]
                );
                return $student;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    function getByName(string $name): ?Student
    {
        $statement = $this->connection->prepare("SELECT * FROM students WHERE id = ?");
        $statement->execute([$name]);

        try {
            if ($row = $statement->fetch()) {
                $student = new Student(
                    $row["id"], $row["photo"], $row["fullname"], $row["phone"], $row["address"], $row["school"], $row["status"]
                );
                return $student;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    function getAll(): array
    {
        $statement = $this->connection->prepare("SELECT * FROM student");

        $students = [];
        try {
            if ($rows = $statement->fetchAll()) {
                foreach ($rows as $row) {
                    $student = new Student(
                        $row["id"], $row["photo"], $row["fullname"], $row["phone"], $row["address"], $row["school"], $row["status"]
                    );
                    $students[] = $student;
                }
                return $students;
            } else {
                return $students;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    function update(Student $newStudent): Student
    {
        return $newStudent;
    }

}