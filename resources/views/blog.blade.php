{{-- Blog Page --}}
@extends('layouts.main')
@section('container')
    <main class="main">



        <!-- Blog Posts Section -->
        <section id="blog-posts" class="blog-posts section">

            @foreach ($posts as $post)
                <article class="mb-5">
                    <h2>
                        <a href="/blog/{{ $post->slug }}"> {{ $post->title }}</a>
                    </h2>
                    <h5>By : <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> </h5>
                    <p>{{ $post->content }}</p>
                </article>
            @endforeach

        </section><!-- /Blog Posts Section -->

        <!-- Blog Pagination Section -->
        <section id="blog-pagination" class="blog-pagination section">

            <div class="container">
                <div class="d-flex justify-content-center">
                    <ul>
                        <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#" class="active">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li>...</li>
                        <li><a href="#">10</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>

        </section>
        <!-- /Blog Pagination Section -->

    </main>
@endsection

{{-- \App\Models\Blog::create([
    'title' => 'Judul 4',
    'category_id' => 2,
    'slug' => 'judul-4',
    'author' => 'Asep',
    'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. A suscipit delectus sunt aliquam placeat numquam minus expedita, alias sapiente laborum. Commodi at suscipit sunt dolorum cupiditate perspiciatis distinctio impedit ad natus totam accusantium consequatur earum officiis similique quam, laborum odit sit dignissimos velit eaque quisquam reprehenderit! Voluptatem, quis. Nemo ea magnam quae natus quos placeat recusandae quo quaerat corrupti. Animi velit recusandae consequatur nam maiores voluptatibus quis officia quisquam adipisci!',
    'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure ullam totam sed distinctio, facere exercitationem alias. Dolore eligendi molestiae dolor, et quidem repudiandae neque odio ratione, sequi laboriosam nulla sed eos ipsum accusamus officia consectetur ipsa perferendis dolores quisquam cum? Soluta quod autem totam perferendis natus error, eveniet eligendi, alias iste id veniam, amet maiores corrupti quam. Earum placeat error quos qui, aspernatur odio maxime cupiditate doloribus amet eius esse? Tenetur blanditiis quod voluptates saepe voluptatibus et quos! Delectus error alias molestiae quod minima aperiam, quia animi labore cumque velit adipisci ratione non dolorum ipsa quam libero temporibus unde eum.',
]); --}}


{{-- App\Models\Category::create([
'name' => 'News',
'slug' => 'news',
]); --}}
