<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Exception;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (config('database.default') !== 'mysql') {
            throw new Exception('Use mysql as database driver');
        }

        if (! config('database.connections.mysql.strict')) {
            throw new Exception('Strict mode should be enabled');
        }

        $post = Post::create([
            'title' => 'Lorem ipsum dolor sit amet',
            'content' => '...'
        ]);

        $tagWithNumericStringId = Tag::create([
            'id' => '1',
            'name' => 'Foo'
        ]);

        $tagWithUuidId = Tag::create([
            'id' => '629b1c4e-4de9-411d-a108-88c1dd8556ac',
            'name' => 'Bar'
        ]);

        $post->tags()->attach([
            $tagWithUuidId->id => ['order' => 1],
            $tagWithNumericStringId->id => ['order' => 2],
        ]);

        $post->tags()->sync([
            $tagWithNumericStringId->id => ['order' => 1],
            $tagWithUuidId->id => ['order' => 2],
        ]);
    }
}
