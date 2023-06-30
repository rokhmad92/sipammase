<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\role;
use App\Models\User;
use App\Models\tahun;
use App\Models\jabatan;
use App\Models\rancangan;
use App\Models\kpengajuan;
use App\Models\pemrakarsa;
use App\Models\padministrasi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // rancangan
            rancangan::create([
                'nama' => 'RPERDA PEMDA'
            ]);
            rancangan::create([
                'nama' => 'RPERDA DPRD'
            ]);
            rancangan::create([
                'nama' => 'RPERKADA'
            ]);
        // end rancangan

        // role
            role::create([
                'nama' => 'Administrator'
            ]);
            role::create([
                'nama' => 'Pokja'
            ]);
            role::create([
                'nama' => 'Pemda'
            ]);
            role::create([
                'nama' => 'DPRD'
            ]);
        // end role

        // tahun
            tahun::create([
                'no' => 2023
            ]);
            tahun::create([
                'no' => 2024
            ]);
            tahun::create([
                'no' => 2025
            ]);
        // end tahun

        // pemrakarsa
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Bantaeng'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Barru'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Bone'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Bulukumba'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Enrekang'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Gowa'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Jeneponto'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Kepulauan Selayar'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Luwu'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Luwu Timur'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Luwu Utara'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Maros'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Pangkep'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Pinrang'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Sidenreng Rappang'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Soppeng'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Takalar'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Tana Toraja'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Toraja Utara'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Wajo'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kota Makassar'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kota Palopo'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kota Parepare'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Bantaeng'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Barru'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Bone'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Bulukumba'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Enrekang'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Gowa'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Jeneponto'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Kepulauan Selayar'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Luwu'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Luwu Timur'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Luwu Utara'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Maros'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Pangkep'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Pinrang'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Sidenreng Rappang'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Sinjai'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Soppeng'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Tana Toraja'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Toraja Utara'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Wajo'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kota Makassar'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kota Palopo'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kota Parepare'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Provinsi Sulawesi Selatan'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Provinsi Sulawesi Selatan'
            ]);
            pemrakarsa::create([
                'nama' => 'Pemerintah Daerah Kabupaten Sinjai'
            ]);
            pemrakarsa::create([
                'nama' => 'DPRD Kabupaten Takalar'
            ]);
        // end pemrakarsa

        // users
            User::create([
                'username' => 'sipammase',
                'password' => bcrypt('sipammase'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 1,
                'role_id' => 1,
                'tahun_id' => 1,
                'namaPanjang' => 'Administrator',
                'alamat' => 'Makassar',
                'email' => 'admin@sipammase.com'
            ]);
            // start pemda
            User::create([
                'username' => 'pemda.bantaeng',
                'password' => bcrypt('bantaeng'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 1,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten Bantaeng',
                'email' => 'pemda@kab-bantaeng.id'
            ]);
            User::create([
                'username' => 'pemda.barru',
                'password' => bcrypt('barru'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 2,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten Barru',
                'email' => 'pemda@kab-barru.id'
            ]);
            User::create([
                'username' => 'pemda.bone',
                'password' => bcrypt('bone'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 3,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten Bone',
                'email' => 'pemda@kab-bone.id'
            ]);
            User::create([
                'username' => 'pemda.bulukumba',
                'password' => bcrypt('bulukumba'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 4,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten Bulukumba',
                'email' => 'pemda@kab-bulukumba.id'
            ]);
            User::create([
                'username' => 'pemda.enrekang',
                'password' => bcrypt('enrekang'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 5,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten enrekang',
                'email' => 'pemda@kab-enrekang.id'
            ]);
            User::create([
                'username' => 'pemda.gowa',
                'password' => bcrypt('gowa'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 6,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten gowa',
                'email' => 'pemda@kab-gowa.id'
            ]);
            User::create([
                'username' => 'pemda.jeneponto',
                'password' => bcrypt('jeneponto'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 7,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten jeneponto',
                'email' => 'pemda@kab-jeneponto.id'
            ]);
            User::create([
                'username' => 'pemda.selayar',
                'password' => bcrypt('selayar'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 8,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten selayar',
                'email' => 'pemda@kab-selayar.id'
            ]);
            User::create([
                'username' => 'pemda.luwu',
                'password' => bcrypt('luwu'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 9,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten luwu',
                'email' => 'pemda@kab-luwu.id'
            ]);
            User::create([
                'username' => 'pemda.luwutimur',
                'password' => bcrypt('luwutimur'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 10,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten luwutimur',
                'email' => 'pemda@kab-luwutimur.id'
            ]);
            User::create([
                'username' => 'pemda.luwuutara',
                'password' => bcrypt('luwuutara'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 11,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten luwuutara',
                'email' => 'pemda@kab-luwuutara.id'
            ]);
            User::create([
                'username' => 'pemda.maros',
                'password' => bcrypt('maros'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 12,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten maros',
                'email' => 'pemda@kab-maros.id'
            ]);
            User::create([
                'username' => 'pemda.pangkep',
                'password' => bcrypt('pangkep'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 13,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten pangkep',
                'email' => 'pemda@kab-pangkep.id'
            ]);
            User::create([
                'username' => 'pemda.pinrang',
                'password' => bcrypt('pinrang'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 14,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten pinrang',
                'email' => 'pemda@kab-pinrang.id'
            ]);
            User::create([
                'username' => 'pemda.sidrap',
                'password' => bcrypt('sidrap'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 15,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten sidrap',
                'email' => 'pemda@kab-sidrap.id'
            ]);
            User::create([
                'username' => 'pemda.sinjai',
                'password' => bcrypt('sinjai'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 49,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten sinjai',
                'email' => 'pemda@kab-sinjai.id'
            ]);
            User::create([
                'username' => 'pemda.soppeng',
                'password' => bcrypt('soppeng'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 16,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten soppeng',
                'email' => 'pemda@kab-soppeng.id'
            ]);
            User::create([
                'username' => 'pemda.takalar',
                'password' => bcrypt('takalar'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 17,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten takalar',
                'email' => 'pemda@kab-takalar.id'
            ]);
            User::create([
                'username' => 'pemda.tanatoraja',
                'password' => bcrypt('tanatoraja'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 18,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten tanatoraja',
                'email' => 'pemda@kab-tanatoraja.id'
            ]);
            User::create([
                'username' => 'pemda.torajautara',
                'password' => bcrypt('torajautara'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 19,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten torajautara',
                'email' => 'pemda@kab-torajautara.id'
            ]);
            User::create([
                'username' => 'pemda.wajo',
                'password' => bcrypt('wajo'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 20,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten wajo',
                'email' => 'pemda@kab-wajo.id'
            ]);
            User::create([
                'username' => 'pemda.makassar',
                'password' => bcrypt('makassar'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 21,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten makassar',
                'email' => 'pemda@kab-makassar.id'
            ]);
            User::create([
                'username' => 'pemda.palopo',
                'password' => bcrypt('palopo'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 22,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten palopo',
                'email' => 'pemda@kab-palopo.id'
            ]);
            User::create([
                'username' => 'pemda.parepare',
                'password' => bcrypt('parepare'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 23,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemerintah Daerah Kabupaten parepare',
                'email' => 'pemda@kab-parepare.id'
            ]);
            User::create([
                'username' => 'pemprov.sulsel',
                'password' => bcrypt('sulsel'),
                'rancangan_id' => 1,
                'pemrakarsa_id' => 47,
                'role_id' => 3,
                'tahun_id' => 1,
                'namaPanjang' => 'Pemprov Sulsel',
                'email' => 'pemprov@sulsel.id'
            ]);
            // start dprd
            User::create([
                'username' => 'dprd.bantaeng',
                'password' => bcrypt('bantaeng'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 24,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten Bantaeng',
                'email' => 'dprd@kab-bantaeng.id'
            ]);
            User::create([
                'username' => 'dprd.barru',
                'password' => bcrypt('barru'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 25,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten Barru',
                'email' => 'dprd@kab-barru.id'
            ]);
            User::create([
                'username' => 'dprd.bone',
                'password' => bcrypt('bone'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 26,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten Bone',
                'email' => 'dprd@kab-bone.id'
            ]);
            User::create([
                'username' => 'dprd.bulukumba',
                'password' => bcrypt('bulukumba'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 27,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten Bulukumba',
                'email' => 'dprd@kab-bulukumba.id'
            ]);
            User::create([
                'username' => 'dprd.enrekang',
                'password' => bcrypt('enrekang'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 28,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten enrekang',
                'email' => 'dprd@kab-enrekang.id'
            ]);
            User::create([
                'username' => 'dprd.gowa',
                'password' => bcrypt('gowa'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 29,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten gowa',
                'email' => 'dprd@kab-gowa.id'
            ]);
            User::create([
                'username' => 'dprd.jeneponto',
                'password' => bcrypt('jeneponto'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 30,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten jeneponto',
                'email' => 'dprd@kab-jeneponto.id'
            ]);
            User::create([
                'username' => 'dprd.selayar',
                'password' => bcrypt('selayar'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 31,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten selayar',
                'email' => 'dprd@kab-selayar.id'
            ]);
            User::create([
                'username' => 'dprd.luwu',
                'password' => bcrypt('luwu'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 32,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten luwu',
                'email' => 'dprd@kab-luwu.id'
            ]);
            User::create([
                'username' => 'dprd.luwutimur',
                'password' => bcrypt('luwutimur'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 33,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten luwutimur',
                'email' => 'dprd@kab-luwutimur.id'
            ]);
            User::create([
                'username' => 'dprd.luwuutara',
                'password' => bcrypt('luwuutara'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 34,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten luwuutara',
                'email' => 'dprd@kab-luwuutara.id'
            ]);
            User::create([
                'username' => 'dprd.maros',
                'password' => bcrypt('maros'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 35,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten maros',
                'email' => 'dprd@kab-maros.id'
            ]);
            User::create([
                'username' => 'dprd.pangkep',
                'password' => bcrypt('pangkep'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 36,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten pangkep',
                'email' => 'dprd@kab-pangkep.id'
            ]);
            User::create([
                'username' => 'dprd.pinrang',
                'password' => bcrypt('pinrang'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 37,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten pinrang',
                'email' => 'dprd@kab-pinrang.id'
            ]);
            User::create([
                'username' => 'dprd.sidrap',
                'password' => bcrypt('sidrap'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 38,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten sidrap',
                'email' => 'dprd@kab-sidrap.id'
            ]);
            User::create([
                'username' => 'dprd.sinjai',
                'password' => bcrypt('sinjai'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 39,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten sinjai',
                'email' => 'dprd@kab-sinjai.id'
            ]);
            User::create([
                'username' => 'dprd.soppeng',
                'password' => bcrypt('soppeng'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 40,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten soppeng',
                'email' => 'dprd@kab-soppeng.id'
            ]);
            User::create([
                'username' => 'dprd.takalar',
                'password' => bcrypt('takalar'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 50,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten takalar',
                'email' => 'dprd@kab-takalar.id'
            ]);
            User::create([
                'username' => 'dprd.tanatoraja',
                'password' => bcrypt('tanatoraja'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 41,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten tanatoraja',
                'email' => 'dprd@kab-tanatoraja.id'
            ]);
            User::create([
                'username' => 'dprd.torajautara',
                'password' => bcrypt('torajautara'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 42,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten torajautara',
                'email' => 'dprd@kab-torajautara.id'
            ]);
            User::create([
                'username' => 'dprd.wajo',
                'password' => bcrypt('wajo'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 43,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten wajo',
                'email' => 'dprd@kab-wajo.id'
            ]);
            User::create([
                'username' => 'dprd.makassar',
                'password' => bcrypt('makassar'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 44,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten makassar',
                'email' => 'dprd@kab-makassar.id'
            ]);
            User::create([
                'username' => 'dprd.palopo',
                'password' => bcrypt('palopo'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 45,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten palopo',
                'email' => 'dprd@kab-palopo.id'
            ]);
            User::create([
                'username' => 'dprd.parepare',
                'password' => bcrypt('parepare'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 46,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Kabupaten parepare',
                'email' => 'dprd@kab-parepare.id'
            ]);
            User::create([
                'username' => 'dprd.sulsel',
                'password' => bcrypt('sulsel'),
                'rancangan_id' => 2,
                'pemrakarsa_id' => 48,
                'role_id' => 4,
                'tahun_id' => 1,
                'namaPanjang' => 'DPRD Sulsel',
                'email' => 'dprd@sulsel.id'
            ]);
            // pokja
            // User::create([
            //     'username' => 'pokja1',
            //     'password' => bcrypt('pokja'),
            //     'rancangan_id' => 3,
            //     'pemrakarsa_id' => 18,
            //     'role_id' => 2,
            //     'tahun_id' => 1,
            //     'namaPanjang' => 'POKJA I',
            //     'email' => 'pokja1@gmail.com'
            // ]);
            // User::create([
            //     'username' => 'pokja2',
            //     'password' => bcrypt('pokja'),
            //     'rancangan_id' => 2,
            //     'pemrakarsa_id' => 1,
            //     'role_id' => 2,
            //     'tahun_id' => 1,
            //     'namaPanjang' => 'POKJA II',
            //     'email' => 'pokja2@gmail.com'
            // ]);
        // End users

        // keterangan pengajuan
            kpengajuan::create([
                'nama' => 'PROLEDGA'
            ]);
            kpengajuan::create([
                'nama' => 'IZIN PRAKARSA'
            ]);
            kpengajuan::create([
                'nama' => 'PROGRAM PENYUSUNAN RPERDA'
            ]);
            kpengajuan::create([
                'nama' => 'PROGRAM PENYUSUNAN RPERKADA'
            ]);
        // end keterangan pengajuan

        // poisi administrasi
            padministrasi::create([
                'nama' => 'Pengajuan'
            ]);
            padministrasi::create([
                'nama' => 'Administrasi Dan Analisis Konsep'
            ]);
            padministrasi::create([
                'nama' => 'Rapat Harmonisasi'
            ]);
            padministrasi::create([
                'nama' => 'Penyampaian Harmonisasi'
            ]);
            padministrasi::create([
                'nama' => 'Selesai Harmonisasi'
            ]);
        // end poisi administrasi

        // jabatan
            jabatan::create([
                'nama' => 'Kepala Kantor Wilayah'
            ]);
            jabatan::create([
                'nama' => 'Kepala Divisi Pelayanan Hukum Dan Hak Asasi Manusia'
            ]);
            jabatan::create([
                'nama' => 'Kepala Bidang Hukum Merangkap Perancang Peraturan Perundang-undangan Ahli Madya'
            ]);
            jabatan::create([
                'nama' => 'Kepala Subbidang Fasilitasi Pembentukan Produk Hukum Daerah Merangkap Perancang Peraturan Perundang-undangan Ahli Muda'
            ]);
            jabatan::create([
                'nama' => 'Perancang Peraturan Perundang-undangan Ahli Madya'
            ]);
            jabatan::create([
                'nama' => 'Perancang Peraturan Perundang-undangan Ahli Pertama'
            ]);
        // end jabatan
    }
}
