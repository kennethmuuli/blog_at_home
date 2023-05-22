<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post {
    public static function all(){
        $files = File::files(resource_path("posts/"));

        return array_map(fn($file) => $file->getContents(), $files);
    }
    
    public static function find ($slug) {
        // contents previously in web.php posts route
        
        if (! file_exists($path = resource_path("posts/{$slug}.html"))) {
            // ddd('file does not exits');
            // abort(404);
            // return redirect('/');
            throw new ModelNotFoundException();
        }
    
        return cache()->remember("posts.{$slug}", 1200, fn()=> file_get_contents($path));
    
    }
}