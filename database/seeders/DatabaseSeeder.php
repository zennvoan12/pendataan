<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Blog;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        User::create([
            'name' => 'Zennovan',

            'email' => 'zennovan@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        Category::create([
            'name' => 'Technology',
            'slug' => 'technology',
        ]);

        Category::create([
            'name' => 'Web Development',
            'slug' => 'web-development',

        ]);

        Category::create([
            'name' => 'Lifestyle',
            'slug' => 'lifestyle',
        ]);

        Blog::create([
            'title' => 'First Blog Post',
            'slug' => 'first-blog-post',
            'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad nam sunt neque at saepe quis nobis omnis ea, culpa veritatis aliquid rerum! Ipsam quo molestias adipisci vero, eligendi dolore commodi repudiandae explicabo maiores ducimus nihil modi consequuntur velit delectus harum nulla maxime nemo accusamus quidem! Explicabo quibusdam iste itaque aperiam?',
            'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos, ullam libero. Ut minima nemo repudiandae delectus tempora qui doloremque cum error ab. Dolore recusandae maxime illum tempore non amet eaque cupiditate, beatae esse voluptatem in, repellat dolores quia ratione modi mollitia voluptatum voluptatibus et deleniti explicabo unde, iure eveniet. Tempore asperiores quia saepe velit deserunt facilis hic ullam aliquam culpa nobis commodi corporis similique delectus quam itaque eligendi earum expedita dolore, officiis nisi eum voluptatibus vero? Laudantium est ducimus porro aspernatur, enim sapiente optio a ullam exercitationem facere molestiae quisquam nesciunt hic voluptates quae excepturi quia atque voluptate sed illo dolores non reiciendis. Excepturi, id. Exercitationem tenetur alias esse quam quia, culpa iste perspiciatis sed ratione beatae delectus dignissimos tempora sequi laboriosam numquam maxime repellat temporibus sint quis voluptatum cum necessitatibus illo magni laudantium. Quos, fugiat inventore quidem tempore error iure voluptate omnis maxime magnam, quisquam dolore? Velit qui dolore libero nesciunt eveniet quibusdam! Vero amet commodi, iusto, magnam illo consequatur alias unde ullam placeat explicabo cum facere, ratione dolorum sequi obcaecati eos omnis cupiditate autem nulla? Praesentium nesciunt ipsum sapiente quo! Quis illo architecto earum at praesentium sunt recusandae, perferendis fugiat commodi officia eum. Itaque provident sed perferendis omnis.',
            'category_id' => 1,
            'user_id' => 1,

        ]);

        Blog::create([
            'title' => 'Second Blog Post',
            'slug' => 'second-blog-post',
            'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad nam sunt neque at saepe quis nobis omnis ea, culpa veritatis aliquid rerum! Ipsam quo molestias adipisci vero, eligendi dolore commodi repudiandae explicabo maiores ducimus nihil modi consequuntur velit delectus harum nulla maxime nemo accusamus quidem! Explicabo quibusdam iste itaque aperiam?',
            'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos, ullam libero. Ut minima nemo repudiandae delectus tempora qui doloremque cum error ab. Dolore recusandae maxime illum tempore non amet eaque cupiditate, beatae esse voluptatem in, repellat dolores quia ratione modi mollitia voluptatum voluptatibus et deleniti explicabo unde, iure eveniet. Tempore asperiores quia saepe velit deserunt facilis hic ullam aliquam culpa nobis commodi corporis similique delectus quam itaque eligendi earum expedita dolore, officiis nisi eum voluptatibus vero? Laudantium est ducimus porro aspernatur, enim sapiente optio a ullam exercitationem facere molestiae quisquam nesciunt hic voluptates quae excepturi quia atque voluptate sed illo dolores non reiciendis. Excepturi, id. Exercitationem tenetur alias esse quam quia, culpa iste perspiciatis sed ratione beatae delectus dignissimos tempora sequi laboriosam numquam maxime repellat temporibus sint quis voluptatum cum necessitatibus illo magni laudantium. Quos, fugiat inventore quidem tempore error iure voluptate omnis maxime magnam, quisquam dolore? Velit qui dolore libero nesciunt eveniet quibusdam! Vero amet commodi, iusto, magnam illo consequatur alias unde ullam placeat explicabo cum facere, ratione dolorum sequi obcaecati eos omnis cupiditate autem nulla? Praesentium nesciunt ipsum sapiente quo! Quis illo architecto earum at praesentium sunt recusandae, perferendis fugiat commodi officia eum. Itaque provident sed perferendis omnis.',
            'category_id' => 1,
            'user_id' => 2,

        ]);


        Blog::create([
            'title' => 'Third Blog Post',
            'slug' => 'third-blog-post',
            'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad nam sunt neque at saepe quis nobis omnis ea, culpa veritatis aliquid rerum! Ipsam quo molestias adipisci vero, eligendi dolore commodi repudiandae explicabo maiores ducimus nihil modi consequuntur velit delectus harum nulla maxime nemo accusamus quidem! Explicabo quibusdam iste itaque aperiam?',
            'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos, ullam libero. Ut minima nemo repudiandae delectus tempora qui doloremque cum error ab. Dolore recusandae maxime illum tempore non amet eaque cupiditate, beatae esse voluptatem in, repellat dolores quia ratione modi mollitia voluptatum voluptatibus et deleniti explicabo unde, iure eveniet. Tempore asperiores quia saepe velit deserunt facilis hic ullam aliquam culpa nobis commodi corporis similique delectus quam itaque eligendi earum expedita dolore, officiis nisi eum voluptatibus vero? Laudantium est ducimus porro aspernatur, enim sapiente optio a ullam exercitationem facere molestiae quisquam nesciunt hic voluptates quae excepturi quia atque voluptate sed illo dolores non reiciendis. Excepturi, id. Exercitationem tenetur alias esse quam quia, culpa iste perspiciatis sed ratione beatae delectus dignissimos tempora sequi laboriosam numquam maxime repellat temporibus sint quis voluptatum cum necessitatibus illo magni laudantium. Quos, fugiat inventore quidem tempore error iure voluptate omnis maxime magnam, quisquam dolore? Velit qui dolore libero nesciunt eveniet quibusdam! Vero amet commodi, iusto, magnam illo consequatur alias unde ullam placeat explicabo cum facere, ratione dolorum sequi obcaecati eos omnis cupiditate autem nulla? Praesentium nesciunt ipsum sapiente quo! Quis illo architecto earum at praesentium sunt recusandae, perferendis fugiat commodi officia eum. Itaque provident sed perferendis omnis.',
            'category_id' => 3,
            'user_id' => 2,

        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
