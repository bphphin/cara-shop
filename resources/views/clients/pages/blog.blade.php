@extends('clients.layouts.app')
@section('app')
    <section id="page-header" class="blog-header">     
        <h2>#readmore</h2>
        <p>Read all case studies about our products!</p>
    </section>
    <section id="blog">
        <div class="blog-box">
            <div class="blog-img">
                <img src="{{ asset('assets/imgs/blog/b1.jpg')  }}" alt="">
            </div>
            <div class="box-details">
                <h4>The Cotton-Jersey Zip-Up Hoodie</h4>
                <p>Kickstarter man braid godard coloring book. Raclette waistcoat selfies yr wolf chartreuse haxagon irony, godard...</p>
                <a href="#">CONTINUE READING</a>
            </div>
            <h1>13/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="{{ asset('assets/imgs/blog/b2.jpg')  }}" alt="">
            </div>
            <div class="box-details">
                <h4>How to style a Quiff</h4>
                <p>Kickstarter man braid godard coloring book. Raclette waistcoat selfies yr wolf chartreuse haxagon irony, godard...</p>
                <a href="#">CONTINUE READING</a>
            </div>
            <h1>13/04</h1>         
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="{{ asset('assets/imgs/blog/b3.jpg')  }}" alt="">
            </div>
            <div class="box-details">
                <h4>Must Have Skater Girl Items</h4>
                <p>Kickstarter man braid godard coloring book. Raclette waistcoat selfies yr wolf chartreuse haxagon irony, godard...</p>
                <a href="#">CONTINUE READING</a>
            </div>
            <h1>12/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="{{ asset('assets/imgs/blog/b4.jpg')  }}" alt="">
            </div>
            <div class="box-details">
                <h4>Runway-Inspired Trend</h4>
                <p>Kickstarter man braid godard coloring book. Raclette waistcoat selfies yr wolf chartreuse haxagon irony, godard...</p>
                <a href="#">CONTINUE READING</a>
            </div>
            <h1>10/02</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="{{ asset('assets/imgs/blog/b5.jpg')  }}" alt="">
            </div>
            <div class="box-details">
                <h4>The Cotton-Jersey Zip-Up Hoodie</h4>
                <p>Kickstarter man braid godard coloring book. Raclette waistcoat selfies yr wolf chartreuse haxagon irony, godard...</p>
                <a href="#">CONTINUE READING</a>
            </div>
            <h1>16/01</h1>
        </div>
        <div class="blog-box">
            <div class="blog-img">
                <img src="{{ asset('assets/imgs/blog/b6.jpg')  }}" alt="">
            </div>
            <div class="box-details">
                <h4>AW20 Menswear Trend</h4>
                <p>Kickstarter man braid godard coloring book. Raclette waistcoat selfies yr wolf chartreuse haxagon irony, godard...</p>
                <a href="#">CONTINUE READING</a>
            </div>
            <h1>10/03</h1>
        </div>
    </section>
    
    @include('clients.layouts.form-feedback')
@endsection
