<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Blog\Status::insert([
            [
                'name' => 'Draft',
                'alias' => 'draft',
            ],
            [
                'name' => 'Published',
                'alias' => 'Published',
            ],
            [
                'name' => 'Content Reviewed',
                'alias' => 'contentReviewed',
            ],
            [
                'name' => 'SEO Reviewed',
                'alias' => 'seoReviewed',
            ],
            [
                'name' => 'Rejected By SEO',
                'alias' => 'rejectedBySEO',
            ]
        ]);
    }
}
