<?php

namespace Database\Factories;

use App\Models\BarangInv;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangInvFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BarangInv::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //Outlet::select('id')->get()
            'nama_barang' => $this->faker->words($nb = 3, $asText = true),
            'merk_barang' => $this->faker->words($nb = 3, $asText = true),
            'qty' => round($this->faker->numberBetween($min = 1, $max = 100)),
            'kondisi' => $this->faker->randomElement(['layak_pakai', 'rusak_ringan', 'rusak_baru']),
            'tanggal_pengadaan' => now()
        ];
    }
}
