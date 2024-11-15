<?php

namespace com\bangkitanomsedhayu\uqi\academy\Helper;

use Exception;

class ControllerHelper {

    public static function saveImageProfile(string $currentImage, string $targetDir, array $image ):string {
        $file_name = basename($image["name"]);

        if ($image != "") {
            if ($currentImage && file_exists($targetDir . $currentImage)) {
                unlink($targetDir . $currentImage); // Hapus file lama
            }
        } else {
            $file_name = $currentImage;
        }

        $targetFile = $targetDir . $file_name;

        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true); // Buat folder dengan izin penuh (777)
        }

        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $allowedTypes = ["jpg", "jpeg", "png", "gif"];

        if (in_array($fileType, $allowedTypes)) {
            // Coba pindahkan file ke folder target
            move_uploaded_file($image["tmp_name"], $targetFile);
        }

        return $file_name;
    }

    public static function saveImagePortofolio(string $targetDir, string $uniqId, array $file): string {
        // Buat nama file unik dan tentukan target direktori
        $targetFile = $targetDir . $uniqId . basename($file["name"]);
    
        // Cek dan buat direktori jika belum ada
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true); // Buat folder dengan izin penuh (777)
        }
    
        // Pindahkan file ke target
        move_uploaded_file($file["tmp_name"], $targetFile);
    
        // Ambil ekstensi file
        $fileExtension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    
        // Tentukan tipe berdasarkan ekstensi
        $fileType = '';
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
        $videoExtensions = ['mp4', 'mov', 'avi', 'mkv', 'flv'];
    
        if (in_array($fileExtension, $imageExtensions)) {
            $fileType = 'image';
        } elseif (in_array($fileExtension, $videoExtensions)) {
            $fileType = 'video';
        } else {
            throw new Exception("Invalid file type. Only images and videos are allowed.");
        }
    
        return $fileType;
    }    

}