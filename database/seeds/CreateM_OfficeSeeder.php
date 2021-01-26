<?php

use Illuminate\Database\Seeder;
use App\M_Office;

class CreateM_OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offices = [
            [
                'name'=>'PT SINARMAS HANA FINANCE ROXY SQUARE',
                'address'=>'ROXY SQUARE, Gedung Roxy Square Lt.LG B06 No. 30, Jl. Kyai Tapa No.1, RT.10/RW.10, Tomang, Kec. Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11440',
                'telp' => '+622156954621',
                'latitude' => -6.166344259814379,
                'longitude'=> 106.79945148209205,
                'center' => true
            ],
            [
                'name'=>'PT SINARMAS HANA FINANCE DEPOK',
                'address'=>'Jl. Margonda Raya No.485, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424',
                'telp' => '+622122714645',
                'longitude' => 106.83349639743952,
                'latitude'=> -6.36375916456241
            ],
            [
                'name'=>'PT SINARMAS HANA FINANCE BEKASI',
                'address'=>'Ruko Mutiara Bekasi Center, Jl. Jend. Ahmad Yani No.10, RT.005/RW.002, Marga Jaya, Kec. Bekasi Sel., Kota Bks, Jawa Barat 17141',
                'telp' => '+62218852167',
                'latitude' => -6.242851060848968,
                'longitude'=> 106.99390262627543
            ],
            [
                'name'=>'PT SINARMAS HANA FINANCE TANGERANG',
                'address'=>'Ruko Bolsena Blok C No 28, Jl. Boulevard Raya Gading Serpong No.Kelurahan, Curug Sangereng, Kec. Klp. Dua, Tangerang, Banten 15810',
                'telp' => '+622122225805',
                'latitude' => -6.260661339136806,
                'longitude'=>106.61989203790948
            ],
            [
                'name'=>'PT SINARMAS HANA FINANCE BOGOR',
                'address'=>'Jl Raya Pajajaran Komp. Ruko Bantarjati No.96 N, Jl. Raya Pajajaran No.Kel, RT.02/RW.03, Bantarjati, North Bogor, Bogor City, West Java 16153',
                'telp' => '+622517706228',
                'latitude' => -6.574661526586926,
                'longitude'=>106.80755775024797
            ],
            [
                'name'=>'PT SINARMAS HANA FINANCE BEKASI',
                'address'=>'Jl. MH. Thamrin, Cibatu, Cikarang Sel., Bekasi, Jawa Barat 17530',
                'telp' => '+621899133331/+62189922003',
                'latitude' => -6.330266095305013,
                'longitude'=>107.13137558279722
            ],
            [
                'name'=>'PT SINARMAS HANA FINANCE SOLO',
                'address'=>'Penumping, Kec. Laweyan, Kota Surakarta, Jawa Tengah 57141',
                'telp' => '+622717464267',
                'latitude' => -7.4079022631166245,
                'longitude'=>110.84016092933359
            ],
            [
                'name'=>'PT SINARMAS HANA FINANCE BANDUNG',
                'address'=>'Jalan BKR No.15 B RT009/06 Kel, Cijagra, Kec. Lengkong, Kota Bandung, Jawa Barat 40265',
                'telp' => '+622273511707',
                'latitude' => -6.87374968634124,
                'longitude'=>107.59919396434742
            ],
            [
                'name'=>'PT SINARMAS HANA FINANCE SEMARANG',
                'address'=>'Jl. Mayor Jend. D.I. Panjaitan No.90A, Jagalan, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50241',
                'telp' => '+622486042465',
                'latitude' => -6.985003809274541,
                'longitude'=>110.43082291278951
            ],
            [
                'name'=>'PT SINARMAS HANA FINANCE KEDIRI',
                'address'=>'Jl. Pemuda no 11C, Dandangan, Ngadirejo, KEC. KOTA, Kota Kediri, Jawa Timur 64112',
                'telp' => '+623542893094',
                'latitude' => -7.813057085052394,
                'longitude'=>112.02047386861135
            ],
            [
                'name'=>'PT SINARMAS HANA FINANCE YOGYAKARTA',
                'address'=>'Ruko casagrande No 12, Jenengan, Maguwoharjo, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55282',
                'telp' => '+62742836022',
                'latitude' => -7.762913970700574,
                'longitude'=>110.41981981093768
            ],
            [
                'name'=>'PT SINARMAS HANA FINANCE MALANG',
                'address'=>'RUKO DE PANORAMA SQUARE JL. A. YANI MALANG A-3B, Purwodadi, Kec. Blimbing, Kota Malang, Jawa Timur 65125',
                'telp' => '+623414373900',
                'latitude' => -7.935230798344296,
                'longitude'=>112.64495732442906
            ],
            [
                'name'=>'PT SINARMAS HANA FINANCE SURABAYA',
                'address'=>'Jl. Raya Manyar No.36, Baratajaya, Kec. Gubeng, Kota SBY, Jawa Timur 60284',
                'telp' => '+623199005645',
                'latitude' => -7.290899516343178,
                'longitude'=>112.76236705326167
            ],
        ];
        //
        foreach ($offices as $key => $value) {
            M_Office::create($value);
        }
    }
}
