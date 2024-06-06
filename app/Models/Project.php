<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Technology;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'content', 'slug','type_id'];

    // we must create a generateSlug function that generates a slug for each project that has to be unique for each one
    public static function generateSlug($title) {
        // the slug take the title and turn it into a slug
        $slug = Str::slug($title, '-');
        $count = 1;
        // the slug cycle will run and generate a new one if the slug already exists
        while(Project::where('slug', $slug)->first()) {
            // if the slug already exists, we generate a new one with different count
            $slug = Str::slug($title, '-' . $count);
            $count++;
        }
        return $slug;
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}
