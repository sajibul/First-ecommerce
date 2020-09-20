<?php
use Illuminate\Database\Seeder;
use App\Models\User;
class UserTableSeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class,10)->create();
    }
}
