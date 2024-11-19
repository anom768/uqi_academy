<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\SocialMedia;

class SocialMediaRepositoryImpl implements SocialMediaRepository {

    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(SocialMedia $socialMedia): SocialMedia
    {
        $statement = $this->connection->prepare("INSERT INTO social_media (id_student, platform, url) VALUES (?,?,?)");
        $statement->execute([$socialMedia->getIdStudent(), $socialMedia->getPlatform(), $socialMedia->getUrl()]);

        $socialMedia->setId($this->connection->lastInsertId());
        return $socialMedia;
    }

    public function getByIDStudent(string $id_student): array
    {
        $statement = $this->connection->prepare("SELECT * FROM social_media WHERE id_student = ?");
        $statement->execute([$id_student]);

        $socialMedias = [];
        try {
            if ($rows = $statement->fetchAll()) {
                foreach ($rows as $row) {
                    $socialMedias[] = new SocialMedia($row["id"], $row["id_student"], $row["platform"], $row["url"]);
                }
            }
            return $socialMedias;
        } finally {
            $statement->closeCursor();
        }
    }

    public function getAll(): array
    {
        $statement = $this->connection->prepare("SELECT * FROM social_media");
        $statement->execute();

        $social_medias = [];
        try {
            if ($rows = $statement->fetchAll()) {
                foreach ($rows as $row) {
                    $social_medias[] = new SocialMedia($row["id"], $row["id_student"], $row["platform"], $row["url"]);;
                }
            }
            return $social_medias;
        } finally {
            $statement->closeCursor();
        }
    }

    public function update(SocialMedia $newSocialMedia): SocialMedia
    {
        $statement = $this->connection->prepare("UPDATE social_media SET url = ? WHERE id_student = ? AND platform = ?");
        $statement->execute([$newSocialMedia->getUrl(), $newSocialMedia->getIdStudent(), $newSocialMedia->getPlatform()]);

        return $newSocialMedia;
    }

    public function delete(int $id): void
    {
        $statement = $this->connection->prepare("DELETE FROM social_media WHERE id = ?");
        $statement->execute([$id]);
    }

    public function deleteAll(): void
    {
        $statement = $this->connection->prepare("TRUNCATE TABLE social_media");
        $statement->execute();
    }

}