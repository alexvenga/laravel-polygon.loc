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

        $dataTime = date('Y-m-d H:i:s');

        $categories[] = [
            'title'      => $name,
            'slug'       => str_slug($name),
            'parent_id'  => 0,
            'created_at' => $dataTime,
            'updated_at' => $dataTime,
        ];

        for ($i = 1; $i <= 10; $i++) {
            $name = 'Категория #' . ($i + 1);

            $parentId = ($i > 3) ? ($i > 6) ? mt_rand(1, 6) : mt_rand(1, 3) : 1;

            $categories[] = [
                'title'     => $name,
                'slug'      => str_slug($name),
                'parent_id' => $parentId,
                'created_at' => $dataTime,
                'updated_at' => $dataTime,
            ];
        }

        \DB::table('blog_categories')->insert($categories);

    }
}
