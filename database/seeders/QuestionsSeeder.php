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
                    ["text" => "Ingin membangun keluarga yang harmonis dan bahagia", "score" => 3],
                    ["text" => "Merasa sudah saatnya untuk menikah", "score" => 2],
                    ["text" => "Tekanan dari keluarga dan lingkungan", "score" => 1],
                    ["text" => "Karena merasa kesepian", "score" => 0],
                ]
            ],
            [
                "question" => "Seberapa siap Anda secara finansial untuk menikah?",
                "options" => [
                    ["text" => "Sudah memiliki tabungan dan perencanaan keuangan", "score" => 3],
                    ["text" => "Cukup stabil, tapi masih ada beberapa yang perlu disiapkan", "score" => 2],
                    ["text" => "Masih dalam tahap menabung", "score" => 1],
                    ["text" => "Tidak ada tabungan dan belum berpikir soal keuangan", "score" => 0],
                ]
            ],
            [
                "question" => "Bagaimana kondisi emosional Anda saat ini?",
                "options" => [
                    ["text" => "Stabil dan siap untuk membangun hubungan jangka panjang", "score" => 3],
                    ["text" => "Cukup stabil, tetapi masih dalam tahap belajar mengenal diri", "score" => 2],
                    ["text" => "Sering merasa ragu dan emosional", "score" => 1],
                    ["text" => "Belum bisa mengendalikan emosi dan masih sering labil", "score" => 0],
                ]
            ],
            [
                "question" => "Apakah Anda siap untuk berbagi kehidupan dengan orang lain?",
                "options" => [
                    ["text" => "Sangat siap dan ingin berbagi kehidupan dengan pasangan", "score" => 3],
                    ["text" => "Siap, tetapi masih butuh waktu untuk menyesuaikan diri", "score" => 2],
                    ["text" => "Masih suka hidup sendiri, tapi ingin mencoba", "score" => 1],
                    ["text" => "Belum siap berbagi hidup dengan orang lain", "score" => 0],
                ]
            ],
            [
                "question" => "Seberapa penting komunikasi dalam hubungan menurut Anda?",
                "options" => [
                    ["text" => "Sangat penting, komunikasi adalah kunci keberhasilan hubungan", "score" => 3],
                    ["text" => "Penting, tetapi bisa dipelajari seiring waktu", "score" => 2],
                    ["text" => "Kadang penting, kadang tidak", "score" => 1],
                    ["text" => "Saya tidak terlalu suka membicarakan perasaan", "score" => 0],
                ]
            ],
            [
                "question" => "Bagaimana Anda menghadapi konflik dalam hubungan?",
                "options" => [
                    ["text" => "Mencari solusi dengan komunikasi yang baik", "score" => 3],
                    ["text" => "Coba menyelesaikan tetapi masih emosional", "score" => 2],
                    ["text" => "Menghindari konflik sebisa mungkin", "score" => 1],
                    ["text" => "Mudah marah dan sering menghindar", "score" => 0],
                ]
            ],
            [
                "question" => "Apa yang Anda pikirkan tentang komitmen jangka panjang?",
                "options" => [
                    ["text" => "Saya siap untuk komitmen dalam jangka panjang", "score" => 3],
                    ["text" => "Saya ingin menikah tetapi masih ada keraguan", "score" => 2],
                    ["text" => "Saya ragu apakah bisa menjalani hubungan seumur hidup", "score" => 1],
                    ["text" => "Saya tidak suka terikat dalam hubungan", "score" => 0],
                ]
            ],
            [
                "question" => "Seberapa siap Anda untuk bertanggung jawab dalam pernikahan?",
                "options" => [
                    ["text" => "Sangat siap dan memahami konsekuensinya", "score" => 3],
                    ["text" => "Cukup siap, tapi masih belajar", "score" => 2],
                    ["text" => "Masih banyak yang perlu saya pelajari", "score" => 1],
                    ["text" => "Belum siap bertanggung jawab dalam hubungan", "score" => 0],
                ]
            ],
            [
                "question" => "Apa yang Anda harapkan dari pasangan hidup?",
                "options" => [
                    ["text" => "Seseorang yang bisa bekerja sama membangun masa depan", "score" => 3],
                    ["text" => "Seseorang yang bisa melengkapi kekurangan saya", "score" => 2],
                    ["text" => "Seseorang yang bisa membuat saya bahagia", "score" => 1],
                    ["text" => "Saya belum tahu apa yang saya inginkan", "score" => 0],
                ]
            ],
            [
                "question" => "Seberapa baik Anda mengenal diri sendiri?",
                "options" => [
                    ["text" => "Saya sangat mengenal diri sendiri dan tahu apa yang saya inginkan", "score" => 3],
                    ["text" => "Saya cukup mengenal diri sendiri tetapi masih dalam proses belajar", "score" => 2],
                    ["text" => "Kadang saya bingung dengan diri saya sendiri", "score" => 1],
                    ["text" => "Saya masih belum mengenal diri sendiri", "score" => 0],
                ]
            ],
            [
                "question" => "Bagaimana pandangan Anda tentang berbagi tanggung jawab dalam pernikahan?",
                "options" => [
                    ["text" => "Harus berbagi secara adil dan saling mendukung", "score" => 3],
                    ["text" => "Saya ingin membantu tetapi masih belajar", "score" => 2],
                    ["text" => "Saya berharap pasangan lebih banyak mengambil tanggung jawab", "score" => 1],
                    ["text" => "Saya ingin pasangan mengurus semuanya", "score" => 0],
                ]
            ],
            [
                "question" => "Apakah Anda bisa mengelola stres dengan baik?",
                "options" => [
                    ["text" => "Ya, saya bisa mengelola stres dengan baik", "score" => 3],
                    ["text" => "Saya bisa mengelola stres tetapi masih butuh latihan", "score" => 2],
                    ["text" => "Saya mudah stres dalam situasi sulit", "score" => 1],
                    ["text" => "Saya sering kewalahan dengan stres", "score" => 0],
                ]
            ],
            [
                "question" => "Bagaimana cara Anda mengelola keuangan pribadi saat ini?",
                "options" => [
                    ["text" => "Saya punya perencanaan keuangan yang baik", "score" => 3],
                    ["text" => "Saya cukup bisa mengelola, tetapi masih ada kekurangan", "score" => 2],
                    ["text" => "Saya sering boros dan sulit menabung", "score" => 1],
                    ["text" => "Saya tidak pernah memikirkan keuangan", "score" => 0],
                ]
            ],
            [
                "question" => "Bagaimana sikap Anda terhadap perbedaan pendapat dalam hubungan?",
                "options" => [
                    ["text" => "Saya terbuka dan siap berdiskusi untuk mencari solusi", "score" => 3],
                    ["text" => "Saya mencoba memahami tetapi kadang sulit menerima perbedaan", "score" => 2],
                    ["text" => "Saya sering menghindari diskusi yang sulit", "score" => 1],
                    ["text" => "Saya tidak suka berdebat, lebih baik mengabaikannya", "score" => 0],
                ]
            ],
            [
                "question" => "Seberapa mandiri Anda dalam kehidupan sehari-hari?",
                "options" => [
                    ["text" => "Sangat mandiri dan bisa mengurus diri sendiri", "score" => 3],
                    ["text" => "Cukup mandiri tetapi masih butuh dukungan", "score" => 2],
                    ["text" => "Saya sering bergantung pada orang lain", "score" => 1],
                    ["text" => "Saya lebih suka orang lain mengurus semuanya", "score" => 0],
                ]
            ],
            [
                "question" => "Seberapa besar pengaruh keluarga terhadap keputusan pernikahan Anda?",
                "options" => [
                    ["text" => "Saya yang menentukan, keluarga hanya memberi saran", "score" => 3],
                    ["text" => "Saya mempertimbangkan saran keluarga", "score" => 2],
                    ["text" => "Keluarga sangat berpengaruh terhadap keputusan saya", "score" => 1],
                    ["text" => "Saya mengikuti apa yang keluarga tentukan", "score" => 0],
                ]
            ],
            [
                "question" => "Bagaimana pandangan Anda tentang memiliki anak dalam pernikahan?",
                "options" => [
                    ["text" => "Saya ingin memiliki anak dan sudah mempersiapkannya", "score" => 3],
                    ["text" => "Saya ingin memiliki anak tetapi masih banyak yang harus saya pelajari", "score" => 2],
                    ["text" => "Saya belum yakin ingin memiliki anak", "score" => 1],
                    ["text" => "Saya tidak ingin memiliki anak", "score" => 0],
                ]
            ],
            [
                "question" => "Apa yang Anda lakukan saat menghadapi kegagalan dalam hubungan?",
                "options" => [
                    ["text" => "Saya belajar dari kegagalan dan berusaha lebih baik", "score" => 3],
                    ["text" => "Saya mencoba bangkit tetapi masih butuh waktu", "score" => 2],
                    ["text" => "Saya sering menyalahkan keadaan atau pasangan", "score" => 1],
                    ["text" => "Saya menghindari hubungan setelah mengalami kegagalan", "score" => 0],
                ]
            ],
            [
                "question" => "Bagaimana cara Anda mengekspresikan cinta?",
                "options" => [
                    ["text" => "Dengan perhatian, komunikasi, dan tindakan nyata", "score" => 3],
                    ["text" => "Dengan kata-kata dan pujian", "score" => 2],
                    ["text" => "Dengan hadiah atau kejutan kecil", "score" => 1],
                    ["text" => "Saya jarang mengekspresikan cinta", "score" => 0],
                ]
            ],
            [
                "question" => "Apa yang Anda cari dalam hubungan pernikahan?",
                "options" => [
                    ["text" => "Keharmonisan, kebahagiaan, dan saling mendukung", "score" => 3],
                    ["text" => "Kesetiaan dan kenyamanan", "score" => 2],
                    ["text" => "Keamanan finansial dan status sosial", "score" => 1],
                    ["text" => "Saya belum tahu pasti", "score" => 0],
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