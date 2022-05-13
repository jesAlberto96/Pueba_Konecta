<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'referencia',
        'precio',
        'peso',
        'stock',
        'categoria_id',
    ];

    public function definition()
    {
        return [
            'precio' => $this->faker->numberBetween(10000, 40000),
            'stock' => $this->faker->numberBetween(1, 20),
            'peso' => $this->faker->numberBetween(1, 20),
            'categoria_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
