<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Room;
use App\Models\TimeSlot;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $rooms = [
            [
                'name' => 'Gedung Kreativitas Mahasiswa',
                'capacity' => 10,
                'description' => 'Gedung Kreativitas Mahasiswa FILKOM ini dibangun terdiri dari lima lantai. Dimana lantai 1 akan difungsikan sebagai Co-Working Space, lantai 2 dan 3 untuk ruang himpunan mahasiswa, lantai 4 untuk aula, dan lantai 5 untuk helipad yang tujuannya dapat difungsikan oleh komunitas atau grup riset yang melakukan penelitian menggunakan drone atau sejenisnya.'
            ],
            [
                'name' => 'Unit Konseling',
                'capacity' => 10,
                'description' => 'Unit konseling terletak di Gedung A dan memberikan fasilitas kepada mahasiswa yang membutuhkan konseling terhadap permasalahan yang dihadapi.'
            ],
            [
                'name' => 'Gazebo lantai 4',
                'capacity' => 10,
                'description' => 'Koridor Gedung F ini terletak di lantai 4. Terdapat banyak kursi dan meja yang dapat digunakan mahasiswa untuk berdiskusi bersama rekan yang lain atau hanya sekedar bersantai sejenak melepas penat di waktu istirahat.'
            ],
            [
                'name' => 'Helpdesk dan Operator Akademik',
                'capacity' => 10,
                'description' => 'Di Gedung F lantai 1 terdapat helpdesk sebagai pusat informasi dan operator akademik yang sigap membantu mahasiswa dalam melaksanakan prosedur akademik.'
            ],
            [
                'name' => 'Gazebo Koridor',
                'capacity' => 10,
                'description' => 'gazebo koridor merupakan area luas di antara gedung F dan gedung G yang dapat digunakan oleh mahasiswa untuk belajar, bersantai dan berkoordinasi'
            ],
            [
                'name' => 'Mushola Ulul Al-Baab',
                'capacity' => 10,
                'description' => 'Mushola Ulul Al-Baab merupakan mushola yang terletak pada lingkungan Fakultas Ilmu Komputer yang berada di sebelah Gedung Kreativitas Mahasiswa. Mushola ini sering mengadakan kegiatan seperti pengajian, kajian agama, keputrian, dan kegiatan agama lainnya. Mushola Ulul Al-Baab memiliki dua lantai. Lantai pertama merupakan tempat ibadan untuk laki-laki dan lantai kedua merupakan tempat ibadah untuk perempuan.'
            ],
            [
                'name' => 'Area Parkir',
                'capacity' => 10,
                'description' => 'Area parkir disiapkan di lahan yang luas sehingga dapat menampung kendaraan yang digunakan oleh mahasiswa'
            ],
            [
                'name' => 'EduTech',
                'capacity' => 10,
                'description' => 'Edutech merupakan lahan terbuka yang dimiliki oleh fakultas ilmu komputer UB yang dapat digunakan untuk beristirahat dan berkoordinasi dengan santai'
            ],
            [
                'name' => 'Ruang Laktasi',
                'capacity' => 10,
                'description' => 'Ruang laktasi adalah fasilitas ruang yang diberikan kepada Ibu yang telah memiliki anak sehingga dapat meluangkan waktu di sela-sela pekerjaan bagi anaknya'
            ]
        ];

        foreach ($rooms as $roomData) {
            $room = Room::create($roomData);

            $timeSlots = TimeSlot::all();
            $room->timeSlots()->attach($timeSlots->pluck('id')->toArray());

            if ($room->name === 'Room B') {
                $room->timeSlots()->detach($timeSlots->last()->id);
            }
        }
    }
}
