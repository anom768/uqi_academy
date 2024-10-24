<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentRegistration;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentUpdate;
use com\bangkitanomsedhayu\uqi\academy\Repository\BatchRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\BatchRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\SessionRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\SessionRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentRepositoryImpl;
use PHPUnit\Framework\TestCase;

class AddAdminTest extends TestCase {

    private StudentRepository $studentRepository;
    private BatchRepository $batchRepository;
    private StudentService $studentService;
    private SessionRepository $sessionRepository;

    function setUp(): void
    {
        $connection = Database::getConnection();
        $this->studentRepository = new StudentRepositoryImpl($connection);
        $this->batchRepository = new BatchRepositoryImpl($connection);
        $this->sessionRepository = new SessionRepositoryImpl($connection);
        $this->studentService = new StudentServiceImpl($this->studentRepository, $this->batchRepository);

        $this->sessionRepository->deleteAll();
        $this->batchRepository->deleteAll();
        $this->studentRepository->deleteAll();
    }

    private function studentRegistration() : StudentResponse {
        $request = new StudentRegistration("bangkit.jpg", "BAS", "089", "jalan", "smk");
        $student = $this->studentService->register($request, 2024, 1);

        // $this->studentService->register()
        return $student;
    }

    function testSetup() {
        $student = $this->studentRegistration()->getStudent();
        self::assertNotEmpty($student->getId());
        self::assertNotEmpty($student->getPassword());

        $batch = $this->batchRepository->getByIDStudent($student->getId());
        self::assertEquals($batch->getIdStudent(), $student->getId());

        $this->studentService->update(new StudentUpdate(
            $student->getId(),
            "rahasia",
            $student->getPhoto(),
            $student->getFullname(),
            $student->getPhone(),
            $student->getAddress(),
            $student->getSchool(),
            $student->getStatus()
        ));

        $this->addDataStudents();
    }

    function addDataStudents() {
        $requests = [
            new StudentRegistration("Ainun.jpg", "Ainun Salsabila", "085600894635", "Kawunganten RT 07 \ RW 03", "SMK N 1 Kawunganten"),
            new StudentRegistration("Ghani.jpg", "Akramuti Ghaniarto", "087794710749", "RT/02 RW/03, Dukuh. Krajan, Desa. Banioro, Kec. Karangsambung, Kab. Kebumen", "SMK N 1 Kebumen"),
            new StudentRegistration("Dheni.jpg", "Dheni Setiawan", "085641190307", "Bojong, kramasari rt 04 rw 04", "SMK N 1 Kawunganten"),
            new StudentRegistration("Fani.jpg", "Fani Fadila", "088216458968", "dusun Sidamulya RT 01/03, desa Binangun, kecamatan bantarsari, kabupaten Cilacap ", "SMK N 1 Kawunganten"),
            new StudentRegistration("Febri.jpg", "Febriyanti", "088221887265", "Karangreja RT02 RW08, Kec.Kawunganten, Kab.Cilacap", "SMK N 1 Kawunganten"),
            new StudentRegistration("Rani.jpg", "Kirania Adinda Kencana Putri", "083145812351", "Desa Sidaurip Dusun Bojong Djander Rt 04 / Rw 03", "SMK N 1 Kawunganten"),
            new StudentRegistration("Bintang.jpg", "Mohamad Bintang Ramadaniatun", "081567670616", "Dusun Mulyadadi, Rt07 Rw04", "SMK N 1 Kawunganten"),
            new StudentRegistration("Haykal.jpg", "Mohammad Haykal Fahrezha", "089603633930", "Ds. Munggu RT01/05 Kec. Petanahan", "SMK N 1 Kebumen"),
            new StudentRegistration("Sidik.jpg", "Muhamad sidik kurniawan", "0882005720963", "desa rawajaya rt 2 rw 2 kecamatan Bantarsari kabupaten cilacap", "SMK N 1 Kawunganten"),
            new StudentRegistration("Najwa.jpg", "Najwa Aulia Sifa", "087872383191", "Jl. KarangKemiri, No. 7, Rt. 001/Rw.003, Desa Pengempon, Kec. Sruweng, Kab. Kebumen", "SMK N 1 Kebumen"),
            new StudentRegistration("Purwati.jpg", "Purwati Ningsih", "085725805329", "jln cireong RT 08/06 desa rawajaya", "SMK N 1 Kawunganten"),
            new StudentRegistration("Rohayah.jpg", "Rohayah", "0882003097698", "Karangsari Kawunganten RT 03 RW 04", "SMK N 1 Kawunganten"),
            new StudentRegistration("Sekar.jpg", "Sekar Nolo Ratri", "082257975181", "Dusun Gunung Sari RT07/RW03", "SMK N 1 Kawunganten"),
            new StudentRegistration("Siska.jpg", "Siska Widi Yuliani", "081228354023", "Dusun Sarwatulus, Desa Sarwadadi Rt 03 Rw 04, Kawunganten, Kab. Cilacap, Jawa Tengah", "SMK N 1 Kawunganten"),
            new StudentRegistration("Zhara.jpg", "Zhara", "085865305316", "Dusun Tegalanyar RT06/03 Kalijeruk Kawunganten Cilacap", "SMK N 1 Kawunganten")
        ];

        foreach ($requests as $request) {
            $this->studentService->register($request, 2024, 1);
        }

        self::assertTrue(true);
        
    }

}