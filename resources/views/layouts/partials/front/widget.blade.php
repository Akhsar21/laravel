<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget search-widget">
            <form class="search-form" action="#">
                <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Search Posts'">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="single-sidebar-widget user-info-widget">
            <img src="img/blog/user-info.png" alt="">
            <a href="#">
                <h4>Charlie Barber</h4>
            </a>
            <p>
                Senior blog writer
            </p>
            <ul class="social-links">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-github"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
            <p>
                Boot camps have its supporters andit sdetractors. Some people do not understand why you
                should have to spend money on boot camp when you can get. Boot camps have itssuppor ters
                andits detractors.
            </p>
        </div>
        <div class="single-sidebar-widget ads-widget">
            <a href="#"><img class="img-fluid" src="img/blog/ads-banner.jpg" alt=""></a>
        </div>
        <div class="single-sidebar-widget post-category-widget">
            <h4 class="category-title">Post Categories</h4>
            <ul class="cat-list">
                @foreach ($category as $cat)
                <li>
                    <a href="#" class="d-flex justify-content-between">
                        <p>{{ $cat->name }}</p>
                        <p>{{ $cat->posts->count() }}</p>
                    </a>
                </li>                    
                @endforeach
            </ul>
        </div>
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="newsletter-title">Newsletter</h4>
            <p>
                Here, I focus on a range of items and features that we use in life without
                giving them a second thought.
            </p>
            <div class="form-group d-flex flex-row">
                <div class="col-autos">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup"
                            placeholder="Enter email" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter email'">
                    </div>
                </div>
                <a href="#" class="bbtns">Subcribe</a>
            </div>
            <p class="text-bottom">
                You can unsubscribe at any time
            </p>
        </div>
        <div class="single-sidebar-widget tag-cloud-widget">
            <h4 class="tagcloud-title">Tag Clouds</h4>
            <ul>
                @foreach ($tag as $t)
                <li><a href="#">{{ $t->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
