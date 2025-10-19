<?php

namespace App\Models;

class Schools
{
    public static function all(){
    $schools= [
        ['nama' => 'SMA 1 Makassar', 'jenjang' => "SMA", 'kabupaten' => "Makassar", 'skor'=>92.5],
        ['nama' => 'SMK 1 Makassar', 'jenjang' => "SMA", 'kabupaten' => "Makassar", 'skor'=>90.5],
        ['nama' => 'SMA 17 Makassar', 'jenjang' => "SMA", 'kabupaten' => "Makassar", 'skor'=>87.5],
        ['nama' => 'SMP 5 Gowa', 'jenjang' => "SMA", 'kabupaten' => "Gowa", 'skor'=>94.0],
        ['nama' => 'SMK 1 Makassar', 'jenjang' => "SMK", 'kabupaten' => "Makassar", 'skor'=>88.0],
        ['nama' => 'SMK 1 Makassar', 'jenjang' => "SMK", 'kabupaten' => "Makassar", 'skor'=>76.0],
        ['nama' => 'SMK 1 Makassar', 'jenjang' => "SMK", 'kabupaten' => "Makassar", 'skor'=>86.5],
        ['nama' => 'SMK 1 Makassar', 'jenjang' => "SMK", 'kabupaten' => "Makassar", 'skor'=>84.0],
        ['nama' => 'SMK 1 Makassar', 'jenjang' => "SMK", 'kabupaten' => "Makassar", 'skor'=>90.0],
        ['nama' => 'SMK 1 Makassar', 'jenjang' => "SMK", 'kabupaten' => "Makassar", 'skor'=>92.0],
        ['nama' => 'SMK 1 Makassar', 'jenjang' => "SMK", 'kabupaten' => "Makassar", 'skor'=>81.0],
        ['nama' => 'SMK 1 Makassar', 'jenjang' => "SMK", 'kabupaten' => "Makassar", 'skor'=>80.5],
        ['nama' => 'SMK 1 Makassar', 'jenjang' => "SMK", 'kabupaten' => "Makassar", 'skor'=>78.0],
        ['nama' => 'SMK 1 Makassar', 'jenjang' => "SMK", 'kabupaten' => "Makassar", 'skor'=>95.0],
        ['nama' => 'SMK 1 Makassar', 'jenjang' => "SMK", 'kabupaten' => "Makassar", 'skor'=>98.5],
        ['nama' => 'SMK 1 Makassar', 'jenjang' => "SMK", 'kabupaten' => "Makassar", 'skor'=>86.5],
        ['nama' => 'SMK 1 Makassar', 'jenjang' => "SMK", 'kabupaten' => "Makassar", 'skor'=>85.5],
        ['nama' => 'SMK 1 Makassar', 'jenjang' => "SMK", 'kabupaten' => "Makassar", 'skor'=>84.0],
        ['nama' => 'SMK 1 Makassar', 'jenjang' => "SMK", 'kabupaten' => "Makassar", 'skor'=>83.5],
        ['nama' => 'SMK 1 Makassar', 'jenjang' => "SMK", 'kabupaten' => "Makassar", 'skor'=>82.5],
        ];
         usort($schools, function($a, $b) {
            return $b['skor'] <=> $a['skor'];
        });
        return $schools;
    }
}