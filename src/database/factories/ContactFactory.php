<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 5), // 外部キーの例
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'gender' => $this->faker->numberBetween(1, 3), // 1: 男性, 2: 女性, 3: その他
            'email' => $this->faker->safeEmail,
            'tel' => $this->faker->numerify('#####'), // 5桁の数字
            'address' => $this->faker->address,
            'building' => $this->faker->optional()->secondaryAddress, // nullも許容
            'detail' => $this->faker->realText(100), // 120文字以内を想定
        ];
    }
}
