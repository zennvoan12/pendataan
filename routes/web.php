<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view(
        'index',
        [
            'title' => 'Home'
        ]
    );
});

Route::get('/about', function () {
    return view(
        'About',
        [
            'title' => 'About'
        ]
    );
});



Route::get('/blog', function () {
    $blog_posts = [
        'title' => 'Blog',
        'posts' => [
            [
                'title' => 'Post 1',
                'author' => 'Author 1',
                'category' => 'Category 1',
                'date' => '2023-10-01',
                'image' => 'blog-1.jpg',
                'content' => '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur ipsa obcaecati rerum fugit suscipit aliquam
  molestiae nulla ullam culpa perspiciatis eligendi facere perferendis earum sunt possimus excepturi magni, vitae hic
  eos. Recusandae iusto deleniti, consequuntur quae rem ratione? Suscipit accusantium necessitatibus repellat saepe
  dolorum accusamus inventore exercitationem mollitia, sapiente beatae ipsam voluptatem debitis tempora natus quod,
  minus aliquid quae. Minima quo, dolor quidem, sint odio praesentium inventore accusantium esse porro quod consectetur
  error dolorem commodi minus rerum nobis possimus consequatur, qui fugiat modi aliquid quasi. Deleniti qui ut quasi
  delectus autem numquam dolor dolorem, similique quod vero accusantium commodi officia.
',

            ],
            [
                'title' => 'Post 2',
                'author' => 'Author 2',
                'category' => 'Category 2',
                'date' => '2023-10-02',
                'image' => 'blog-2.jpg',
                'content' => '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur ipsa obcaecati rerum fugit suscipit aliquam
  molestiae nulla ullam culpa perspiciatis eligendi facere perferendis earum sunt possimus excepturi magni, vitae hic
  eos. Recusandae iusto deleniti, consequuntur quae rem ratione? Suscipit accusantium necessitatibus repellat saepe
  dolorum accusamus inventore exercitationem mollitia, sapiente beatae ipsam voluptatem debitis tempora natus quod,
  minus aliquid quae. Minima quo, dolor quidem, sint odio praesentium inventore accusantium esse porro quod consectetur
  error dolorem commodi minus rerum nobis possimus consequatur, qui fugiat modi aliquid quasi. Deleniti qui ut quasi
  delectus autem numquam dolor dolorem, similique quod vero accusantium commodi officia.
'
            ],
            [
                'title' => 'Post 3',
                'author' => 'Author 3',
                'category' => 'Category 3',
                'date' => '2023-10-03',
                'image' => 'blog-3.jpg',
                'content' => '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur ipsa obcaecati rerum fugit suscipit aliquam
  molestiae nulla ullam culpa perspiciatis eligendi facere perferendis earum sunt possimus excepturi magni, vitae hic
  eos. Recusandae iusto deleniti, consequuntur quae rem ratione? Suscipit accusantium necessitatibus repellat saepe
  dolorum accusamus inventore exercitationem mollitia, sapiente beatae ipsam voluptatem debitis tempora natus quod,
  minus aliquid quae. Minima quo, dolor quidem, sint odio praesentium inventore accusantium esse porro quod consectetur
  error dolorem commodi minus rerum nobis possimus consequatur, qui fugiat modi aliquid quasi. Deleniti qui ut quasi
  delectus autem numquam dolor dolorem, similique quod vero accusantium commodi officia.
'
            ]
        ]
    ];
    return view(
        'Blog',
        [
            'title' => 'Blog',
            'posts' => $blog_posts
        ]
    );
});

Route::get('/blog-details', function () {
    return view('blog-details');
});
