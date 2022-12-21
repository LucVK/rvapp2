<?php

namespace Database\Seeders\Rv;

use App\Models\InfoPages\Content;
use App\Models\InfoPages\Page;
use App\Models\Rv\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    private $afdelingen = [
        'Wielertoeristen' => ['Groep 1', 'Groep 2', 'Groep 3', 'Groep 4', 'Groep 5'],
        'Voetbal Den Een' => [],
        'Voetbal Den Twee' => [],
        'Voetbal Den Drie' => [],
        'Voetbal Dames' => [],
        'Petanque' => [],
        'Kaarten' => [],
        'Biljarten' => [],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->afdelingen as $key => $value) {
            $afd = Department::factory()->create(['name' =>  $key]);

            $infoPage = Page::factory()->makeOne([
                'name' => 'homepage',
                'title' => $afd->name.' pagina',
            ]);

            $pageContent = Content::factory()->makeOne([
                'name' => 'start content',
                'data' => 'dit is een voorbeeld',
            ]);


            $afd->pages()->save($infoPage);
            $infoPage->contents()->save($pageContent);

            foreach ($value as $group) {
                Department::factory()->create(['name' => $group, 'parent_id' => $afd->id]);
            }
        }
    }
}
