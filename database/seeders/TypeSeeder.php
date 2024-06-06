<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Front-end',
            'Back-end',
            'Full-stack',
            'Data Science',
            'Machine Learning',
            'Ethical Hacking',
        ];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->slug = Type::generateSlug($newType->name);
            $newType->save();
        }
    }
}
