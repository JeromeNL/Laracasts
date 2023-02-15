<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Post
{
    public $title;
    public $description;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $body, $date, $description, $slug){
        $this->title = $title;
        $this->body = $body;
        $this->date = $date;
        $this->description = $description;
        $this->slug = $slug;
    }
    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function all(){
        return collect(File::files(resource_path("posts")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                $document->title,
                $document->description,
                $document->date,
                $document->body(),
                $document->slug
            ));

//        return array_map(function ($file){
//            return $file->getContents();
//        }, $files);
    }
}
