<?php

use Illuminate\Database\Seeder;
use vhx\User;
use vhx\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name','User')->first();
        $role_manager = Role::where('name','Manager')->first();
        $role_admin = Role::where('name','Admin')->first();

        $user = new User();
        $user -> name= 'name user';
        $user -> username = 'user';
        $user -> password = bcrypt('123456');
        $user -> save();
        $user->roles()->attach($role_user);

        $manager = new User();
        $manager -> name = 'name manager';
        $manager -> username = 'manager';
        $manager -> password = bcrypt('123456');
        $manager -> save();
        $manager->roles()->attach($role_manager);

        $admin = new User();
        $admin -> name = 'name admin';
        $admin -> username = 'admin';
        $admin -> password = bcrypt('123456');
        $admin -> save();
        $admin->roles()->attach($role_admin);
    }
}
