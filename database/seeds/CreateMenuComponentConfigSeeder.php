<?php

use App\Component;
use App\ConfigApp;
use App\Menu;
use Illuminate\Database\Seeder;

class CreateMenuComponentConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = [
            [
                'name' => 'Home',
                'route' => 'home',
                'id_parent' => 0,
                'index' => 1,
            ],
        ];

        $component = [
            [
                'name' => 'Slider',
                'id_menu' => 1,
                'index' => 1,
            ],
        ];

        $config = [
            [
                'name' => 'interval',
                'id_component' => 1,
                'type' => 'integer',
                'values' => toString('integer', 3000),
            ],
            [
                'name' => 'imgWidth',
                'id_component' => 1,
                'type' => 'integer',
                'values' => toString('integer', 1024),
            ],
            [
                'name' => 'imgHeight',
                'id_component' => 1,
                'type' => 'integer',
                'values' => toString('integer', 480),
            ],
            [
                'name' => 'controls',
                'id_component' => 1,
                'type' => 'boolean',
                'values' => toString('boolean', true),
            ],
            [
                'name' => 'indicators',
                'id_component' => 1,
                'type' => 'boolean',
                'values' => toString('boolean', true),
            ],
        ];


        foreach ($menu as $key => $value) {
            Menu::create($value);
        }

        foreach ($component as $key => $value) {
            Component::create($value);
        }

        foreach ($config as $key => $value) {
            ConfigApp::create($value);
        }
    }
}
