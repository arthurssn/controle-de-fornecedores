<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cpf_cnpj = $this->generateUniqueCpfCnpj();

        return [
            'cpf_cnpj' => $cpf_cnpj,
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'number' => $this->faker->buildingNumber,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country
        ];
    }

    private function generateUniqueCpfCnpj()
    {
        $unique = false;
        $cpf_cnpj = '';

        while (!$unique) {
            $cpf_cnpj = str_pad(mt_rand(0, 99999999999), 11, '0', STR_PAD_LEFT);
            if (!Supplier::where('cpf_cnpj', $cpf_cnpj)->exists()) {
                $unique = true;
            }
        }

        return $cpf_cnpj;
    }
}
