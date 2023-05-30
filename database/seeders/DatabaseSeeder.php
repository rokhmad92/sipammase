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
        // end pemrakarsa

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
                'nama' => 'Penyampaian'
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
