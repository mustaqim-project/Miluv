<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            [
                "question" => "Apa alasan utama Anda ingin menikah?",
                "options" => [
                    ["text" => "Membangun keluarga harmonis", "score" => 3],
                    ["text" => "Merasa sudah cukup umur", "score" => 2],
                    ["text" => "Tekanan dari keluarga", "score" => 1],
                    ["text" => "Takut hidup sendiri", "score" => 0],
                ]
            ],
            [
                "question" => "Seberapa baik Anda mengenal pasangan Anda?",
                "options" => [
                    ["text" => "Sangat mengenal", "score" => 3],
                    ["text" => "Cukup mengenal", "score" => 2],
                    ["text" => "Kurang mengenal", "score" => 1],
                    ["text" => "Tidak yakin", "score" => 0],
                ]
            ],
            [
                "question" => "Bagaimana Anda menghadapi konflik dengan pasangan?",
                "options" => [
                    ["text" => "Berdiskusi terbuka dan mencari solusi bersama", "score" => 3],
                    ["text" => "Kadang berdiskusi, tapi sering menghindari konflik", "score" => 2],
                    ["text" => "Sering bertengkar dan sulit menemukan solusi", "score" => 1],
                    ["text" => "Menghindari konflik dengan diam atau mengalah terus", "score" => 0],
                ]
            ],
            [
                "question" => "Bagaimana kondisi finansial Anda saat ini?",
                "options" => [
                    ["text" => "Stabil dan memiliki perencanaan keuangan bersama pasangan", "score" => 3],
                    ["text" => "Cukup baik, tetapi masih ada beberapa aspek yang perlu diperbaiki", "score" => 2],
                    ["text" => "Tidak stabil, tetapi yakin bisa membaik setelah menikah", "score" => 1],
                    ["text" => "Tidak memiliki perencanaan keuangan sama sekali", "score" => 0],
                ]
            ],
            [
                "question" => "Apakah Anda siap berbagi tanggung jawab dalam pernikahan?",
                "options" => [
                    ["text" => "Sangat siap, sudah membicarakannya dengan pasangan", "score" => 3],
                    ["text" => "Cukup siap, tetapi masih perlu belajar lebih banyak", "score" => 2],
                    ["text" => "Kurang siap, masih terbiasa hidup sendiri", "score" => 1],
                    ["text" => "Tidak siap, lebih suka pasangan yang mengurus semuanya", "score" => 0],
                ]
            ],
            [
                "question" => "Bagaimana hubungan Anda dengan keluarga pasangan?",
                "options" => [
                    ["text" => "Sangat baik dan sudah merasa diterima", "score" => 3],
                    ["text" => "Cukup baik, meski masih ada beberapa perbedaan", "score" => 2],
                    ["text" => "Kurang baik, ada beberapa ketegangan", "score" => 1],
                    ["text" => "Tidak baik dan sering terjadi konflik", "score" => 0],
                ]
            ],
            [
                "question" => "Apakah Anda dan pasangan memiliki nilai atau keyakinan yang sejalan?",
                "options" => [
                    ["text" => "Ya, sangat sejalan dan sudah mendiskusikannya", "score" => 3],
                    ["text" => "Cukup sejalan, meskipun ada beberapa perbedaan kecil", "score" => 2],
                    ["text" => "Banyak perbedaan, tetapi belum pernah dibahas secara mendalam", "score" => 1],
                    ["text" => "Sangat berbeda dan sering menjadi sumber perdebatan", "score" => 0],
                ]
            ],
            [
                "question" => "Bagaimana Anda dan pasangan mengelola emosi dalam hubungan?",
                "options" => [
                    ["text" => "Bisa mengontrol emosi dengan baik dan saling mendukung", "score" => 3],
                    ["text" => "Kadang masih emosional, tetapi bisa diperbaiki", "score" => 2],
                    ["text" => "Sering emosional dan sulit dikendalikan", "score" => 1],
                    ["text" => "Tidak bisa mengontrol emosi sama sekali", "score" => 0],
                ]
            ],
            [
                "question" => "Apakah Anda sudah membahas rencana masa depan bersama pasangan?",
                "options" => [
                    ["text" => "Ya, sudah memiliki rencana jangka panjang yang jelas", "score" => 3],
                    ["text" => "Cukup, meski belum terlalu detail", "score" => 2],
                    ["text" => "Belum banyak membahasnya", "score" => 1],
                    ["text" => "Tidak pernah membahas sama sekali", "score" => 0],
                ]
            ],
            [
                "question" => "Seberapa siap Anda dengan perubahan yang terjadi setelah menikah?",
                "options" => [
                    ["text" => "Sangat siap dan sudah memahami konsekuensinya", "score" => 3],
                    ["text" => "Cukup siap, tetapi masih perlu banyak belajar", "score" => 2],
                    ["text" => "Tidak yakin siap atau tidak", "score" => 1],
                    ["text" => "Tidak siap sama sekali", "score" => 0],
                ]
            ],
            [
                "question" => "Bagaimana Anda dan pasangan mengelola keuangan bersama?",
                "options" => [
                    ["text" => "Sudah memiliki perencanaan keuangan yang matang", "score" => 3],
                    ["text" => "Pernah membicarakan tetapi belum ada rencana konkret", "score" => 2],
                    ["text" => "Belum membahasnya sama sekali", "score" => 1],
                    ["text" => "Tidak ingin berbagi keuangan dengan pasangan", "score" => 0],
                ]
            ],
            [
                "question" => "Apakah Anda siap berkompromi dalam pernikahan?",
                "options" => [
                    ["text" => "Ya, sangat siap dan menganggap kompromi adalah hal penting", "score" => 3],
                    ["text" => "Cukup siap, tetapi masih sulit dalam beberapa hal", "score" => 2],
                    ["text" => "Sering merasa sulit untuk berkompromi", "score" => 1],
                    ["text" => "Tidak suka berkompromi dan ingin segalanya berjalan sesuai keinginan", "score" => 0],
                ]
            ],
            [
                "question" => "Bagaimana Anda menilai komunikasi dalam hubungan Anda?",
                "options" => [
                    ["text" => "Sangat baik, bisa berbicara terbuka tentang apa saja", "score" => 3],
                    ["text" => "Cukup baik, meskipun ada beberapa kendala kecil", "score" => 2],
                    ["text" => "Kurang baik, sering terjadi kesalahpahaman", "score" => 1],
                    ["text" => "Buruk, komunikasi sering berakhir dengan konflik", "score" => 0],
                ]
            ],
            [
                "question" => "Seberapa siap Anda menghadapi tantangan dalam rumah tangga?",
                "options" => [
                    ["text" => "Sangat siap, sudah menyadari bahwa pernikahan tidak selalu mudah", "score" => 3],
                    ["text" => "Cukup siap, tetapi masih takut menghadapi masalah besar", "score" => 2],
                    ["text" => "Tidak yakin bisa menghadapinya", "score" => 1],
                    ["text" => "Tidak siap dan ingin semuanya berjalan sempurna", "score" => 0],
                ]
            ],
            [
                "question" => "Apakah Anda dan pasangan memiliki tujuan hidup yang sama?",
                "options" => [
                    ["text" => "Ya, sangat sejalan dan sudah dibicarakan dengan jelas", "score" => 3],
                    ["text" => "Cukup sejalan, meskipun ada beberapa perbedaan", "score" => 2],
                    ["text" => "Banyak perbedaan yang belum diselesaikan", "score" => 1],
                    ["text" => "Tidak memiliki kesamaan dalam tujuan hidup", "score" => 0],
                ]
            ],
            [
                "question" => "Bagaimana cara Anda mengatasi stres dalam hubungan?",
                "options" => [
                    ["text" => "Berkomunikasi dengan pasangan dan mencari solusi bersama", "score" => 3],
                    ["text" => "Berusaha mengatasi sendiri tetapi masih berbagi dengan pasangan", "score" => 2],
                    ["text" => "Cenderung menghindar dan menunggu masalah reda sendiri", "score" => 1],
                    ["text" => "Melampiaskan stres dengan marah atau menyalahkan pasangan", "score" => 0],
                ]
            ],
            [
                "question" => "Apakah Anda memiliki ekspektasi realistis tentang pernikahan?",
                "options" => [
                    ["text" => "Ya, sudah memahami bahwa pernikahan membutuhkan usaha dan kompromi", "score" => 3],
                    ["text" => "Cukup realistis, tetapi masih memiliki beberapa harapan idealis", "score" => 2],
                    ["text" => "Kurang realistis dan sering membandingkan dengan hubungan lain", "score" => 1],
                    ["text" => "Tidak realistis, menganggap pernikahan seperti kisah dongeng", "score" => 0],
                ]
            ],
            [
                "question" => "Bagaimana Anda menilai kepercayaan dalam hubungan Anda?",
                "options" => [
                    ["text" => "Sangat kuat dan tidak ada rasa curiga", "score" => 3],
                    ["text" => "Cukup kuat, meskipun ada beberapa tantangan kecil", "score" => 2],
                    ["text" => "Kurang kuat, masih ada rasa ragu", "score" => 1],
                    ["text" => "Tidak ada kepercayaan sama sekali", "score" => 0],
                ]
            ],
            [
                "question" => "Bagaimana Anda menangani perbedaan pendapat dengan pasangan?",
                "options" => [
                    ["text" => "Berdiskusi dengan kepala dingin dan mencari solusi bersama", "score" => 3],
                    ["text" => "Sering berdiskusi, tetapi kadang emosi masih sulit dikendalikan", "score" => 2],
                    ["text" => "Lebih sering menghindari diskusi untuk menghindari konflik", "score" => 1],
                    ["text" => "Tidak pernah berdiskusi dan lebih suka mempertahankan pendapat sendiri", "score" => 0],
                ]
            ],
            [
                "question" => "Apakah Anda siap menerima pasangan apa adanya?",
                "options" => [
                    ["text" => "Ya, sudah menerima kelebihan dan kekurangannya dengan tulus", "score" => 3],
                    ["text" => "Cukup menerima, tetapi masih ada beberapa hal yang ingin diubah", "score" => 2],
                    ["text" => "Sulit menerima beberapa kekurangannya", "score" => 1],
                    ["text" => "Tidak siap menerima kekurangan pasangan", "score" => 0],
                ]
            ],
        ];

        foreach ($questions as $q) {
            Question::create([
                'question' => $q['question'],
                'options' => json_encode($q['options']),
            ]);
        }
    }
}