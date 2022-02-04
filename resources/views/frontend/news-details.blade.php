@extends("layouts.frontend")
@section("breadcrumb","Blog")
@section("breadcrumb-title","News Details")

@section("content")
<div class="page-section pt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <nav aria-label="Breadcrumb">
            <ol class="breadcrumb bg-transparent py-0 mb-5">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('frontend.news')}}">Blog</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$news->title}}</li>
            </ol>
          </nav>
        </div>
      </div> <!-- .row -->

      <div class="row">
        <div class="col-lg-8">
          <article class="blog-details">
            <div class="post-thumb">
              <img src="../assets/img/blog/blog_1.jpg" alt="">
            </div>
            <div class="post-meta">
              <div class="post-author">
                <span class="text-grey">By</span> <a href="#">{{$news->user->name}}</a>  
              </div>
              <span class="divider">|</span>
              <div class="post-date">
                <a href="#">{{$news->created_at->format("d M, Y")}}</a>
              </div>
              <span class="divider">|</span>
              <div class="text-muted">
                {{$news->tags}}
              </div>
             
              
            </div>
            <h2 class="post-title h1">{{$news->title}}</h2>
            <div class="post-content">
              {{$news->body}}
            </div>
             @php $categories=["Radiology","Pathology","Cardiology","Sergery","Gastroenterology"];@endphp
            <div class="post-tags">
            @foreach($categories as $category)
              <a href="#" class="tag-link">{{$category}}</a>
              @endforeach
            </div>
          </article> <!-- .blog-details -->
        </div>
        <div class="col-lg-4">
          <div class="sidebar">
            <div class="sidebar-block">
              <h3 class="sidebar-title">Search</h3>
              <form action="{{route("news.search")}}" class="search-form" method="post">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter" name="term">
                  <button type="submit" class="btn"><span class="icon mai-search"></span></button>
                </div>
              </form>
            </div>
            <div class="sidebar-block">
              <h3 class="sidebar-title">Categories</h3>
              <ul class="categories">
               
                @foreach($categories as $category)
                    <li><a href="#">{{$category}} <span>12</span></a></li>
                @endforeach
              </ul>
            </div>

            <div class="sidebar-block">
              <h3 class="sidebar-title">Recent Blog</h3>
              @foreach($recent_news as $news)
              <div class="blog-item">
                <a class="post-thumb" href="">
                  <img src="{{asset($news->image)}}" alt="">
                </a>
                <div class="content">
                  <h5 class="post-title"><a href="{{route("news.details",$news->id)}}">{{$news->title}}</a></h5>
                  <div class="meta">
                    <a href="#"><span class="mai-calendar"></span> {{$news->created_at->format('M d, Y')}}</a>
                    <a href="#"><span class="mai-person"></span>{{$news->user->name}}</a>
                   
                  </div>
                </div>
              </div>
              @endforeach
            </div>

            <div class="sidebar-block">
              <h3 class="sidebar-title">Tag Cloud</h3>
              @php $tags=explode(" ",$news->tags); @endphp
              <div class="tagcloud">
                @foreach($tags as $tag)
                <a href="#" class="tag-cloud-link">{{$tag}}</a>
                @endforeach
              </div>
            </div>
          </div>
        </div> 
      </div> <!-- .row -->
    </div> <!-- .container -->
  </div>
@endsection