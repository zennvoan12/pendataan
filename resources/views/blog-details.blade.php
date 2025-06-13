@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container">

                        <article class="article">

                            <div class="post-img">
                                @if ($post->image)
                                    <div class="post-img" style="max-height:350px; overflow:hidden;">
                                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="">
                                    </div>
                                @else
                                    <div class="post-img">
                                        <img src="https://picsum.photos/1200/800?random={{ $post->category->name }}"
                                            class="img-fluid" alt="">
                                    </div>
                                @endif
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
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                            href="blog-details.html">12 Comments</a></li>
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

                            <div class="meta-bottom">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                                    </li>
                                </ul>

                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    <li><a href="#">Creative</a></li>
                                    <li><a href="#">Tips</a></li>
                                    <li><a href="#">Marketing</a></li>
                                </ul>
                            </div><!-- End meta bottom -->

                        </article>

                    </div>
                </section><!-- /Blog Details Section -->

                <!-- Blog Comments Section -->
                <section id="blog-comments" class="blog-comments section">
                    <div class="container">
                        <h4 class="comments-count">{{ $post->comments->count() }} Comments</h4>
                        @foreach ($post->comments as $comment)
                            <div id="comment-{{ $comment->id }}" class="comment mb-3">
                                <div class="d-flex">
                                    <div class="comment-img me-2">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name) }}" alt="">
                                    </div>
                                    <div>
                                        <h5>{{ $comment->user->name }}</h5>
                                        <time datetime="{{ $comment->created_at->toDateString() }}">{{ $comment->created_at->diffForHumans() }}</time>
                                        <p>{{ $comment->content }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section><!-- /Blog Comments Section -->

                <!-- Comment Form Section -->
                <section id="comment-form" class="comment-form section">
                    <div class="container">
                        @auth
                            <form action="{{ route('comments.store', $post) }}" method="POST">
                                @csrf
                                <h4>Post Comment</h4>
                                <div class="row">
                                    <div class="col form-group">
                                        <textarea name="content" class="form-control" placeholder="Your Comment*" required>{{ old('content') }}</textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Post Comment</button>
                                </div>
                            </form>
                        @else
                            <p>Please <a href="{{ route('login') }}">login</a> to comment.</p>
                        @endauth
                    </div>
                </section><!-- /Comment Form Section -->

            </div>

            <div class="col-lg-4 sidebar">

                <div class="widgets-container">

                    <!-- Blog Author Widget -->
                    <div class="blog-author-widget widget-item">

                        <div class="d-flex flex-column align-items-center">
                            <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0"
                                alt="">
                            <h4>Jane Smith</h4>
                            <div class="social-links">
                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                <a href="https://instagram.com/#"><i class="biu bi-linkedin"></i></a>
                            </div>

                            <p>
                                Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas
                                repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde
                                voluptas.
                            </p>

                        </div>
                    </div><!--/Blog Author Widget -->

                    <!-- Search Widget -->
                    <div class="search-widget widget-item">

                        <h3 class="widget-title">Search</h3>
                        <form action="">
                            <input type="text">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>

                    </div><!--/Search Widget -->

                    <!-- Recent Posts Widget -->
                    <div class="recent-posts-widget widget-item">

                        <h3 class="widget-title">Recent Posts</h3>

                        <div class="post-item">
                            <h4><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <h4><a href="blog-details.html">Quidem autem et impedit</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <h4><a href="blog-details.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <h4><a href="blog-details.html">Laborum corporis quo dara net para</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <h4><a href="blog-details.html">Et dolores corrupti quae illo quod dolor</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div><!-- End recent post item-->

                    </div><!--/Recent Posts Widget -->

                    <!-- Categories Widget -->
                    <div class="categories-widget widget-item">

                        <h3 class="widget-title">Categories</h3>
                        <ul class="categories-list">
                            <li><a href="#">Business</a> <span>(25)</span></li>
                            <li><a href="#">Creative</a> <span>(12)</span></li>
                            <li><a href="#">Marketing</a> <span>(5)</span></li>
                            <li><a href="#">Tips</a> <span>(8)</span></li>
                            <li><a href="#">Design</a> <span>(15)</span></li>
                            <li><a href="#">Development</a> <span>(10)</span></li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    @endsection
