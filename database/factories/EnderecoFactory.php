<?php

namespace Database\Factories;

use App\Models\Endereco;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnderecoFactory extends Factory
{
    protected $model = Endereco::class;

    public function definition(): array
    {
        $faker = Faker::create('pt_BR');
        return [
            'rua' => $faker->streetName,
            'numero' => $faker->buildingNumber,
            'bairro' => $faker->citySuffix,
            'cidade' => $faker->city,
            'uf' => $faker->stateAbbr,
            'cep' => $faker->postcode,
        ];
    }
}
