<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::insert([
            ['id' => 4110,  'name_of_department' => 'Department of Ceramics Glass and Cement', 'street' => 'Radlinského 9', 'postcode' => '81237', 'city' => 'Bratislava', 'country' => 'Slovakia', 'created_at' => now()],
            ['id' => 4120,  'name_of_department' => 'Department of Inorganic Technology', 'street' => 'Radlinského 9', 'postcode' => '81237', 'city' => 'Bratislava', 'country' => 'Slovakia', 'created_at' => now()],
            ['id' => 4130,  'name_of_department' => 'Department of Organic Technology', 'street' => 'Radlinského 9', 'postcode' => '81237', 'city' => 'Bratislava', 'country' => 'Slovakia', 'created_at' => now()],
            ['id' => 4140,  'name_of_department' => 'Department of Organic Chemistry', 'street' => 'Radlinského 9', 'postcode' => '81237', 'city' => 'Bratislava', 'country' => 'Slovakia', 'created_at' => now()],
            ['id' => 4150,  'name_of_department' => 'Department of Fibres and Textile Chemistry', 'street' => 'Radlinského 9', 'postcode' => '81237', 'city' => 'Bratislava', 'country' => 'Slovakia', 'created_at' => now()],
            ['id' => 4160,  'name_of_department' => 'Department of Graphic Art Technology and Applied Photochemistry', 'street' => 'Radlinského 9', 'postcode' => '81237', 'city' => 'Bratislava', 'country' => 'Slovakia', 'created_at' => now()],
            ['id' => 4170,  'name_of_department' => 'Department of Petroleum Technology and Petrochemistry', 'street' => 'Radlinského 9', 'postcode' => '81237', 'city' => 'Bratislava', 'country' => 'Slovakia', 'created_at' => now()],
            ['id' => 4180,  'name_of_department' => 'Department of Analytical Chemistry', 'street' => 'Radlinského 9', 'postcode' => '81237', 'city' => 'Bratislava', 'country' => 'Slovakia', 'created_at' => now()],
            ['id' => 4190,  'name_of_department' => 'Department of Inorganic Chemistry', 'street' => 'Radlinského 9', 'postcode' => '81237', 'city' => 'Bratislava', 'country' => 'Slovakia', 'created_at' => now()],
            ['id' => 4210,  'name_of_department' => 'Department of Physical Chemistry', 'street' => 'Radlinského 9', 'postcode' => '81237', 'city' => 'Bratislava', 'country' => 'Slovakia', 'created_at' => now()],
        ]);
    }
}
