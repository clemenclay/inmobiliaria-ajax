<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'permission_access',],
            ['id' => 3, 'title' => 'permission_create',],
            ['id' => 4, 'title' => 'permission_edit',],
            ['id' => 5, 'title' => 'permission_view',],
            ['id' => 6, 'title' => 'permission_delete',],
            ['id' => 7, 'title' => 'role_access',],
            ['id' => 8, 'title' => 'role_create',],
            ['id' => 9, 'title' => 'role_edit',],
            ['id' => 10, 'title' => 'role_view',],
            ['id' => 11, 'title' => 'role_delete',],
            ['id' => 12, 'title' => 'user_access',],
            ['id' => 13, 'title' => 'user_create',],
            ['id' => 14, 'title' => 'user_edit',],
            ['id' => 15, 'title' => 'user_view',],
            ['id' => 16, 'title' => 'user_delete',],
            ['id' => 17, 'title' => 'contact_management_access',],
            ['id' => 18, 'title' => 'contact_management_create',],
            ['id' => 19, 'title' => 'contact_management_edit',],
            ['id' => 20, 'title' => 'contact_management_view',],
            ['id' => 21, 'title' => 'contact_management_delete',],
            ['id' => 22, 'title' => 'contact_company_access',],
            ['id' => 23, 'title' => 'contact_company_create',],
            ['id' => 24, 'title' => 'contact_company_edit',],
            ['id' => 25, 'title' => 'contact_company_view',],
            ['id' => 26, 'title' => 'contact_company_delete',],
            ['id' => 27, 'title' => 'contact_access',],
            ['id' => 28, 'title' => 'contact_create',],
            ['id' => 29, 'title' => 'contact_edit',],
            ['id' => 30, 'title' => 'contact_view',],
            ['id' => 31, 'title' => 'contact_delete',],
            ['id' => 32, 'title' => 'propiedade_access',],
            ['id' => 33, 'title' => 'propiedade_create',],
            ['id' => 34, 'title' => 'propiedade_edit',],
            ['id' => 35, 'title' => 'propiedade_view',],
            ['id' => 36, 'title' => 'propiedade_delete',],
            ['id' => 37, 'title' => 'galerium_access',],
            ['id' => 38, 'title' => 'galerium_create',],
            ['id' => 39, 'title' => 'galerium_edit',],
            ['id' => 40, 'title' => 'galerium_view',],
            ['id' => 41, 'title' => 'galerium_delete',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
