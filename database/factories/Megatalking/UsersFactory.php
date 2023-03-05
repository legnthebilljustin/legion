<?php

namespace Database\Factories\Megatalking;

use App\Models\Megatalking\MegatalkingUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UsersFactory extends Factory
{
    protected $model = MegatalkingUser::class;

    public function definition()
    {
        return [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'username' => 'johndoes',
            'password' => 'password',
            'role' => 'admin',
            'status' => '1'
        ];
    }
}
