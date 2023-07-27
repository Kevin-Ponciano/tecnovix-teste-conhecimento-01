<?php

namespace Database\Factories;

use App\Models\Livros;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LivrosFactory extends Factory
{
    protected $model = Livros::class;

    public function definition()
    {
        return [
            'titulo' => $this->faker->word(),
            'autor' => $this->faker->name(),
            'editora' => $this->faker->company(),
            'ano_de_publicacao' => Carbon::now(),
            'descricao' => $this->faker->text(),
            'paginas' => $this->faker->numberBetween(1, 1000),
            'isbn' => $this->faker->isbn13(),
            'capa' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
