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
        $statement = $this->connection->prepare("INSERT INTO students (id, password, temp_password, photo, fullname, phone, address, school, status) VALUES(?,?,?,?,?,?,?,?,?)");
        $statement->execute([$student->getId(), $student->getPassword(), $student->getTempPassword(),
        $student->getPhoto(), $student->getFullname(), $student->getPhone(), $student->getAddress(), $student->getSchool(), $student->getStatus()]);
        
        return $student;
    }

    function getByID(string $id): ?Student
    {
        $statement = $this->connection->prepare("SELECT * FROM students WHERE id = ?");
        $statement->execute([$id]);

        return $this->fetchStudent($statement);
    }

    function getByName(string $name): ?Student
    {
        $statement = $this->connection->prepare("SELECT * FROM students WHERE fullname = ?");
        $statement->execute([$name]);

        return $this->fetchStudent($statement);
    }

    function getByPhone(string $phone): ?Student
    {
        $statement = $this->connection->prepare("SELECT * FROM students WHERE phone = ?");
        $statement->execute([$phone]);

        return $this->fetchStudent($statement);
    }

    function getByEmail(string $email): ?Student
    {
        $statement = $this->connection->prepare("SELECT * FROM students WHERE email = ?");
        $statement->execute([$email]);

        return $this->fetchStudent($statement);
    }

    function getAll(): array
    {
        $statement = $this->connection->prepare("SELECT * FROM students");
        $statement->execute();

        $students = [];
        try {
            if ($rows = $statement->fetchAll()) {
                foreach ($rows as $row) {
                    $students[] = new Student(
                        $row["id"], $row["password"], $row["temp_password"], $row["photo"], $row["fullname"], 
                        $row["specialist"], $row["email"], $row["website"], $row["bio"], $row["phone"],
                        $row["address"], $row["school"], $row["status"]
                    );
                }
            }
            return $students;
        } finally {
            $statement->closeCursor();
        }
    }

    function update(Student $newStudent): Student
    {
        $statement = $this->connection->prepare("UPDATE students SET password = ?, temp_password = ?, photo = ?, fullname = ?, specialist = ?, email = ?, bio = ?, phone = ?, address = ?, school = ?, status = ? WHERE id = ?");
        $statement->execute([$newStudent->getPassword(), $newStudent->getTempPassword(), $newStudent->getPhoto(),
        $newStudent->getFullname(), $newStudent->getSpecialist(), $newStudent->getEmail(),
        $newStudent->getBio(), $newStudent->getPhone(), $newStudent->getAddress(), $newStudent->getSchool(), $newStudent->getStatus(), $newStudent->getId()]);
    
        return $newStudent;
    }

    function updateProfile(Student $newStudent): Student
    {
        $statement = $this->connection->prepare("UPDATE students SET photo = ?, fullname = ?, specialist = ?, email = ?, bio = ?, phone = ?, address = ?, school = ? WHERE id = ?");
        $statement->execute([$newStudent->getPhoto(), $newStudent->getFullname(), $newStudent->getSpecialist(), $newStudent->getEmail(),
        $newStudent->getBio(), $newStudent->getPhone(), $newStudent->getAddress(), $newStudent->getSchool(), $newStudent->getId()]);

        $student = $this->getByID($newStudent->getId());
        
        return $student;
    }

    function updatePassword(string $id, string $password): Student
    {
        $statement = $this->connection->prepare("UPDATE students SET password = ?, temp_password = ? WHERE id = ?");
        $statement->execute([$password, "", $id]);

        $student = $this->getByID($id);
        
        return $student;
    }

    function deleteAll(): void
    {
        $statement = $this->connection->prepare("DELETE FROM students");
        $statement->execute();
    }

    private function fetchStudent(\PDOStatement $statement) :?Student {
        try {
            if ($row = $statement->fetch()) {
                $student = new Student(
                    $row["id"], $row["password"], $row["temp_password"], $row["photo"], $row["fullname"], 
                    $row["specialist"], $row["email"], $row["website"], $row["bio"], $row["phone"],
                    $row["address"], $row["school"], $row["status"]
                );
                return $student;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

}