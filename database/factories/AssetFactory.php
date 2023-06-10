<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category_name = $this->faker->randomElement(['Rumah','Ruko','Gedung','Gudang','Apartemen','Tanah','Barang','Kendaraan','Alat berat','Lain-lain']);
        $province_name = $this->faker->randomElement([
            'Aceh',
            'Sumatera Utara',
            'Sumatera Barat',
            'Riau',
            'Jambi',
            'Sumatera Selatan',
            'Bengkulu',
            'Lampung',
            'Kepulauan Bangka Belitung',
            'Kepulauan Riau',
            'DKI Jakarta',
            'Jawa Barat',
            'Jawa Tengah',
            'DI Yogyakarta',
            'Jawa Timur',
            'Banten',
            'Bali',
            'Nusa Tenggara Barat',
            'Nusa Tenggara Timur',
            'Kalimantan Barat',
            'Kalimantan Tengah',
            'Kalimantan Selatan',
            'Kalimantan Timur',
            'Kalimantan Utara',
            'Sulawesi Utara',
            'Sulawesi Tengah',
            'Sulawesi Selatan',
            'Sulawesi Tenggara',
            'Gorontalo',
            'Sulawesi Barat',
            'Maluku',
            'Maluku Utara',
            'Papua Barat',
            'Papua'
        ]);
        $city_name = $this->faker->randomElement([
            'Ambon', 'Balikpapan', 'Banda Aceh', 'Bandar Lampung', 'Bandung', 'Banjar', 'Banjarbaru', 'Banjarmasin',
            'Batam', 'Batu', 'Bau-Bau', 'Bekasi', 'Bengkulu', 'Bima', 'Binjai', 'Bitung', 'Blitar', 'Bogor', 'Bontang',
            'Bukittinggi', 'Cilegon', 'Cimahi', 'Cirebon', 'Denpasar', 'Depok', 'Dumai', 'Gorontalo', 'Jakarta', 'Jambi',
            'Jayapura', 'Jember', 'Kediri', 'Kendari', 'Ketapang', 'Kupang', 'Langsa', 'Lhokseumawe', 'Lubuklinggau',
            'Madiun', 'Magelang', 'Makassar', 'Malang', 'Manado', 'Mataram', 'Medan', 'Metro', 'Mojokerto', 'Padang',
            'Padang Panjang', 'Padangsidempuan', 'Pagar Alam', 'Palangkaraya', 'Palembang', 'Palopo', 'Palu',
            'Pangkalpinang', 'Parepare', 'Pariaman', 'Pasuruan', 'Payakumbuh', 'Pekalongan', 'Pekanbaru',
            'Pematangsiantar', 'Pontianak', 'Prabumulih', 'Probolinggo', 'Ruteng', 'Salatiga', 'Samarinda', 'Sawahlunto',
            'Semarang', 'Serang', 'Sibolga', 'Singkawang', 'Solok', 'Sorong', 'Subulussalam', 'Sukabumi', 'Sumedang',
            'Surabaya', 'Surakarta', 'Tangerang', 'Tanjungbalai', 'Tanjungpinang', 'Tarakan', 'Tasikmalaya', 'Tegal',
            'Ternate', 'Tidore Kepulauan', 'Tomohon', 'Tual', 'Yogyakarta'
        ]);

        return [
            'name' => $this->faker->name(),
            'category' => $category_name,
            'province' => $province_name,
            'city' => $city_name,
            'price' => $this->faker->numberBetween(123456789,20000000),
            'seller_id' => $this->faker->numberBetween(1,5),
            'owner_id' => $this->faker->numberBetween(1,5),
            'description' => $this->faker->text(50),
            'status' => 'dijamin oleh bank a',
            'attachment1' => 'asset.png',
            'image1' => 'asset.png'
        ];
    }
}
