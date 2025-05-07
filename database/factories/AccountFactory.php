<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\User;
use App\Models\AccountType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    protected $model = Account::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'name' => $this->faker->word() . ' Account',
            'balance' => $this->faker->randomFloat(2, 0, 10000),
            'account_type_id' => AccountType::inRandomOrder()->first()?->id ?? AccountType::factory(),
            'is_active' => $this->faker->boolean(80),
        ];
    }
}
