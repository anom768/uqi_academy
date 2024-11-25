<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentRegistration;
use com\bangkitanomsedhayu\uqi\academy\Repository\BatchRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentRepositoryImpl;
use PHPUnit\Framework\TestCase;

class AddStudentTest extends TestCase
{

    private \PDO $connection;
    private StudentRepository $studentRepository;
    private StudentService $studentService;

    protected function setUp(): void
    {
        $this->connection = Database::getConnection();
        $this->studentRepository = new StudentRepositoryImpl($this->connection);
        $batchRepository = new BatchRepositoryImpl($this->connection);

        $this->studentService = new StudentServiceImpl($this->studentRepository, $batchRepository);
    }

    public function testAddStudent() {
        $students = [
            new StudentRegistration("blank.jpg", "Ainun Salsabila", "085600894635", "Kawunganten RT 07 RW 03", "SMK Negeri 1 Kawunganten"),
            new StudentRegistration("blank.jpg", "Akramuti Ghaniarto", "087794710749", "RT/02 RW/03, Dukuh. Krajan, Desa. Banioro, Kec. Karangsambung, Kab. Kebumen", "SMK Negeri 1 Kebumen"),
            new StudentRegistration("blank.jpg", "Dheni Setiawan", "085641190307", "Bojong, kramasari rt 04 rw 04", "SMK Negeri 1 Kawunganten"),
            new StudentRegistration("blank.jpg", "Fani Fadila", "088216458968", "dusun Sidamulya RT 01/03, desa Binangun, kecamatan bantarsari, kabupaten Cilacap", "SMK Negeri 1 Kawunganten"),
            new StudentRegistration("blank.jpg", "Febriyanti", "088221887265", "KARANGREJA RT02 RW08, KEC.KAWUNGANTEN, KAB.CILACAP", "SMK Negeri 1 Kawunganten"),
            new StudentRegistration("blank.jpg", "KHIRANIA ADINDA KENCANA PUTRI", "083145812351", "Desa Sidaurip Dusun Bojong Djander Rt 04 / Rw 03", "SMK Negeri 1 Kawunganten"),
            new StudentRegistration("blank.jpg", "MOHAMAD BINTANG RAMADANIATUN", "081567670616", "DUSUN MULYADADI,RT07/RW04", "SMK Negeri 1 Kawunganten"),
            new StudentRegistration("blank.jpg", "Mohammad Haykal Fahrezha", "089603633930", "Ds. Munggu RT01/05 Kec. Petanahan", "SMK Negeri 1 Kebumen"),
            new StudentRegistration("blank.jpg", "Muhamad sidik kurniawan", "0882005720963", "desa rawajaya rt 2 rw 2 kecamatan Bantarsari kabupaten cilacap", "SMK Negeri 1 Kawunganten"),
            new StudentRegistration("blank.jpg", "Najwa Aulia Sifa", "087872383191", "Jl. KarangKemiri, No. 7, Rt. 001/Rw.003, Desa Pengempon, Kec. Sruweng, Kab. Kebumen", "SMK Negeri 1 Kawunganten"),
            new StudentRegistration("blank.jpg", "purwati ningsih", "085725805329", "jln cireong RT 08/06 desa rawajaya", "SMK Negeri 1 Kawunganten"),
            new StudentRegistration("blank.jpg", "ROHAYAH", "0882003097698", "KARANGSARI KAWUNGANTEN RT 03 RW 04", "SMK Negeri 1 Kawunganten"),
            new StudentRegistration("blank.jpg", "Sekar Nolo Ratri", "082257975181", "Dusun Gunung Sari RT07/RW03", "SMK Negeri 1 Kawunganten"),
            new StudentRegistration("blank.jpg", "Siska Widi Yuliani", "081228354023", "Dusun Sarwatulus, Desa Sarwadadi Rt 03 Rw 04, Kawunganten, Kab. Cilacap, Jawa Tengah", "SMK Negeri 1 Kawunganten"),
            new StudentRegistration("blank.jpg", "ZHARA", "085865305316", "DUSUN TEGALANYAR RT06/03 KALIJERUK KAWUNGANTEN CILACAP", "SMK Negeri 1 Kawunganten"),
        ];

        foreach ($students as $student) {
            try {
                $this->studentService->register($student, "2024", "1");
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }
        self::assertTrue(true);
    }

    public function testUpdatePhoto()
    {
        $photos = ["Ainun.jpg", "Ghani.jpg", "Dheni.jpg", "Fani.jpg", "Febri.jpg", "Rani.jpg", "Bintang.jpg", "Haykal.jpg", "Sidik.jpg", "Najwa.jpg", "Purwati.jpg", "Rohayah.jpg", "Sekar.jpg", "Siska.jpg", "Zhara.jpg"];
        $statement = $this->connection->prepare("UPDATE students SET photo = ? WHERE id = ?");
        $statement->execute([$photos[14], "2401-016"]);
        self::assertEquals(1, 1);
    }
}
