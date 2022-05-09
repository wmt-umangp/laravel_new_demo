<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use Hash;
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Student::class;
    public function definition()
    {
        return [
            "roll_no"=>$this->faker->numberBetween(25,50),
            "name" => $this->faker->name(),
            'standard'=>$this->faker->numberBetween(1,12),
            "age" => $this->faker->numberBetween(10,16),
            "email" => $this->faker->safeEmail,
            "password"=>Hash::make('12345678'),
        ];
    }
}
