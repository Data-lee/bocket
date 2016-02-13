<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // returns a collection of users.  a collection is an array like object
        $users = factory(App\User::class, 50)->create();
        // [App\User]:
        $users->each(function($user) { 
        	// Create bookmarks
        	foreach (range(1, rand(2, 5)) as $int) {	
        		$bookmark = factory(App\Bookmark::class)->make();
        		$user->bookmarks()->save($bookmark);
        	}

        	// Create tag
        	foreach (range(1, rand(2, 5)) as $int) {	
				$tag = factory(App\Tag::class)->make();
    	    	$user->tags()->save($tag);      
    	    }

    	    $tags = $user->tags;
    	    foreach ($tags as $tag) {
    	    	$bookmarks = $user->bookmarks;
    	    	foreach (range(1, rand(2, 5)) as $int) {
    	    		$bookmark = $bookmarks[rand(0, $bookmarks->count() -1)];
    	    		if (!$bookmark->tags()->where('tag_id', $tag->id)->exists()) {
	    	    		$bookmark->tags()->attach($tag);	
    	    		}
    	    	}
    	    }	
    	});
    }	
}
