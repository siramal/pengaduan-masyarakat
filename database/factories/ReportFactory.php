<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    protected $model = \App\Models\Report::class;

    public function definition(): array
    {
        return [
            'province_id' => '32',
            'kabupaten_id' => '3201',
            'kecamatan_id' => '3201120',
            'desa_id' => $this->faker->randomNumber(9, true),
            'report_type' => $this->faker->randomElement(['Kerusakan Jalan', 'Banjir', 'Kebakaran']),
            'report_detail' => $this->faker->sentence(10),
        ];
    }
}
