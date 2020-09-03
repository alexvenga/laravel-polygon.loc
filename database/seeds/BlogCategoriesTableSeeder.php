<?php

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [];

        $name = 'Без категории';

        $categories[] = [
            'title'     => $name,
            'slug'      => str_slug($name),
            'parent_id' => 0,
        ];

        for ($i = 1; $i <= 10; $i++) {
            $name = 'Категория #' . $i;

            $parentId = ($i > 3) ? ($i > 6) ? mt_rand(1, 6) : mt_rand(1, 3) : 1;

            $categories[] = [
                'title'     => $name,
                'slug'      => str_slug($name),
                'parent_id' => $parentId,
            ];
        }

        \DB::table('blog_categories')->insert($categories);

    }
}
