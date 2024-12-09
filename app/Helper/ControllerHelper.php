<?php

namespace com\bangkitanomsedhayu\uqi\academy\Helper;

use Exception;
use Google\Cloud\Storage\StorageClient;

class ControllerHelper {

    public static function saveImageProfile(string $currentImage, string $bucketName, $targetDir, array $image): string {
        $file_name = basename($image["name"]);
    
        // Jika ada gambar baru yang diunggah
        if ($image["name"] != "") {
            // Hapus file lama dari bucket jika ada
            if ($currentImage) {
                self::deleteFileFromBucket($bucketName, $targetDir, $currentImage);
            }
        } else {
            // Jika tidak ada gambar baru, gunakan gambar saat ini
            $file_name = $currentImage;
        }
    
        // Gabungkan path direktori dengan nama file
        $filePathInBucket = rtrim($targetDir, '/') . '/' . $file_name;
    
        // Proses upload file ke bucket jika ada file baru
        if ($image["tmp_name"]) {
            $fileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowedTypes = ["jpg", "jpeg", "png", "gif"];
    
            // Periksa tipe file
            if (!in_array($fileType, $allowedTypes)) {
                throw new Exception("Tipe file tidak didukung.");
            }
    
            // Inisialisasi StorageClient
            $storage = new StorageClient([
                'keyFilePath' => __DIR__ . '/../../config/access-uqiacademytestbucket.json' // Ganti dengan path ke key file Anda
            ]);
    
            // Akses bucket
            $bucket = $storage->bucket($bucketName);
    
            // Upload file ke bucket dengan path lengkap (direktori + nama file)
            $bucket->upload(
                fopen($image["tmp_name"], 'r'), // Buka file untuk diunggah
                [
                    'name' => $filePathInBucket // Nama file di dalam folder di bucket
                ]
            );
        }
    
        return $file_name; // Kembalikan nama file yang di-upload
    }

    private static function deleteFileFromBucket($bucketName, $directoryPath, $fileName) {
        try {
            // Gabungkan path direktori dengan nama file
            $fullPath = rtrim($directoryPath, '/') . '/' . $fileName;
            
            // Inisialisasi StorageClient dengan path ke file key JSON
            $storage = new StorageClient([
                'keyFilePath' => __DIR__ . '/../../config/access-uqiacademytestbucket.json' // Ganti dengan path ke key file Anda
            ]);
        
            // Akses bucket
            $bucket = $storage->bucket($bucketName);
            
            // Akses objek (file) dalam bucket berdasarkan path lengkap
            $object = $bucket->object($fullPath);
        
            // Cek apakah objek ada sebelum dihapus
            if ($object->exists()) {
                $object->delete();
                return true; // File berhasil dihapus
            } else {
                return false; // File tidak ditemukan
            }
        } catch (\Exception $e) {
            // Tangani error jika terjadi kesalahan saat mengakses atau menghapus file
            error_log("Gagal menghapus file dari bucket: " . $e->getMessage());
            return false; // Return false jika ada kesalahan
        }
    }

    public static function saveImagePortofolio(string $targetDir, string $uniqId, array $file): string {
        // Gabungkan nama file unik dengan path direktori untuk target file di bucket
        $file_name = $uniqId . basename($file["name"]);
        $targetFile = rtrim($targetDir, '/') . '/' . $file_name; // Path di bucket (direktori + nama file)
    
        // Tentukan path ke file JSON key Anda (gunakan path yang sesuai dengan konfigurasi Anda)
        $keyFilePath = __DIR__ . '/../../config/access-uqiacademytestbucket.json'; // Sesuaikan path ini dengan yang Anda miliki
    
        // Inisialisasi StorageClient dengan key file
        $storage = new StorageClient([
            'keyFilePath' => $keyFilePath
        ]);
        
        // Akses bucket
        $bucket = $storage->bucket('uqiacademytestbucket'); // Ganti dengan nama bucket Anda
        
        // Periksa apakah file diupload
        if ($file["tmp_name"]) {
            // Ambil ekstensi file
            $fileExtension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    
            // Tentukan tipe file berdasarkan ekstensi
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
    
            // Unggah file ke bucket
            $bucket->upload(
                fopen($file["tmp_name"], 'r'), // Buka file untuk diunggah
                [
                    'name' => $targetFile // Tentukan path lengkap file di dalam bucket
                ]
            );
    
            return $fileType; // Kembalikan tipe file
        } else {
            throw new Exception("Failed to upload file.");
        }
    }

    public static function deletePortofolio(string $bucketName, string $targetDir, string $id): bool {
        try {
            // Tentukan path ke file JSON key Anda (sesuaikan dengan path konfigurasi Anda)
            $keyFilePath = __DIR__ . '/../../config/access-uqiacademytestbucket.json'; // Ganti dengan path key file Anda
    
            // Inisialisasi StorageClient dengan key file
            $storage = new StorageClient([
                'keyFilePath' => $keyFilePath
            ]);
    
            // Akses bucket
            $bucket = $storage->bucket($bucketName); // Ganti dengan nama bucket Anda
            
            // Cari objek di bucket yang diawali dengan $id
            $objects = $bucket->objects([
                'prefix' => rtrim($targetDir, '/') . '/' . $id // Prefix adalah direktori + ID yang ingin dicari
            ]);
    
            // Iterasi objek dan hapus file yang ditemukan
            foreach ($objects as $object) {
                // Hapus file jika ada yang cocok
                $object->delete();
            }
    
            // Jika ada file yang dihapus, return true
            return true;
    
        } catch (\Exception $e) {
            // Tangani error jika terjadi kesalahan saat mengakses atau menghapus file
            error_log("Gagal menghapus file dari bucket: " . $e->getMessage());
            return false; // Return false jika ada kesalahan
        }
    }

}