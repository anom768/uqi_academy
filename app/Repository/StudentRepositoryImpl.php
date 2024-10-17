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
        $statement = $this->connection->prepare("INSERT INTO students (id, photo, fullname, phone, address, school, status) VALUES(?,?,?,?,?,?,?)");
        $statement->execute([$student->getId(), $student->getPhoto(), $student->getFullname(), $student->getPhone(), $student->getAddress(), $student->getSchool(), $student->getStatus()]);

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
        $statement = $this->connection->prepare("SELECT * FROM students WHERE fullname = ?");
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
        $statement = $this->connection->prepare("SELECT * FROM students");
        $statement->execute();

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
        $statement = $this->connection->prepare("UPDATE students SET photo = ?, fullname = ?, phone = ?, address = ?, school = ?, status = ? WHERE id = ?");
        $statement->execute([$newStudent->getPhoto(), $newStudent->getFullname(), $newStudent->getPhone(), $newStudent->getAddress(), $newStudent->getSchool(), $newStudent->getStatus(), $newStudent->getId()]);
    
        return $newStudent;
    }

    function deleteAll(): void
    {
        $statement = $this->connection->prepare("DELETE FROM students");
        $statement->execute();
    }

}