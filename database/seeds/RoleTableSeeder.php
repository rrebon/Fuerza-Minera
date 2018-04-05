<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_administrador = new Role();
        $role_administrador->nombre = "administrador";
        $role_administrador->descripcion = "usuario administrador de la web";
        $role_administrador->save();
        
        $role_usuario = new Role();
        $role_usuario->nombre = "usuario";
        $role_usuario->descripcion = "usurio de la web";
        $role_usuario->save();
        
        $role_developer = new Role();
        $role_developer->nombre ="desarrollador";
        $role_developer->descripcion = "desarrollador de la web";
        $role_developer->save();        
        
    }
}
