<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog
{
    private static $blog_posts = [
        [
            'title' => 'Post 1',
            'slug' => 'post-1',
            'author' => 'Author 1',
            'category' => 'Category 1',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur ipsa obcaecati rerum fugit suscipit aliquam
   molestiae nulla ullam culpa perspiciatis eligendi facere perferendis earum sunt possimus excepturi magni, vitae hic
   eos. Recusandae iusto deleniti, consequuntur quae rem ratione? Suscipit accusantium necessitatibus repellat saepe
   dolorum accusamus inventore exercitationem mollitia, sapiente beatae ipsam voluptatem debitis tempora natus quod,
   minus aliquid quae. Minima quo, dolor quidem, sint odio praesentium inventore accusantium esse porro quod consectetur
   error dolorem commodi minus rerum nobis possimus consequatur, qui fugiat modi aliquid quasi. Deleniti qui ut quasi
   delectus autem numquam dolor dolorem, similique quod vero accusantium commodi officia.'
        ],
        [
            'title' => 'Post 2',
            'slug' => 'post-2',
            'author' => 'Author 2',
            'category' => 'Category 2',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur ipsa obcaecati rerum fugit suscipit aliquam
   molestiae nulla ullam culpa perspiciatis eligendi facere perferendis earum sunt possimus excepturi magni, vitae hic
   eos. Recusandae iusto deleniti, consequuntur quae rem ratione? Suscipit accusantium necessitatibus repellat saepe
   dolorum accusamus inventore exercitationem mollitia, sapiente beatae ipsam voluptatem debitis tempora natus quod,
   minus aliquid quae. Minima quo, dolor quidem, sint odio praesentium inventore accusantium esse porro quod consectetur
   error dolorem commodi minus rerum nobis possimus consequatur, qui fugiat modi aliquid quasi. Deleniti qui ut quasi
   delectus autem numquam dolor dolorem, similique quod vero accusantium commodi officia.'
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        // foreach ($posts as $post) {
        //     if ($post['slug'] === $slug) {
        //         return $post;
        //     }
        // }
        return $posts->firstWhere('slug', $slug); // or throw an exception if preferred
    }
}
