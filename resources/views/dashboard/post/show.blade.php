@extends('dashboard.layouts.main')



@section('container')
    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container">

                        <article class="article">

                            <div class="post-img">
                                <img src="https://picsum.photos/1200/800??{{ $post->category->name }}" class="img-fluid"
                                    alt="">
                            </div>

                            <h2 class="title">{{ $post->title }}</h2>
                            </h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time
                                            datetime="2020-01-01">{{ $post->created_at->diffForHumans() }}</time></li>

                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                <p>
                                    {!! $post->content !!}
                                </p>



                                <blockquote>
                                    <p>
                                        Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut
                                        eos aliquam doloribus minus autem quos.
                                    </p>
                                </blockquote>



                            </div><!-- End post content -->

                        </article>

                    </div>
                </section><!-- /Blog Details Section -->


            </div>


        </div>
    @endsection
