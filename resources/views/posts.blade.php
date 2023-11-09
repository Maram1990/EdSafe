@extends('layout.layout')
@section('content')
<br>
<br>
<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>التعليمات</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bx bxl-dribbble"></i></div>
            <h3 class="title"><a href="">{{ $post->title}}</a></h3>
            <a class="btn btn-primary" href="{{ route('detials',$post->id) }}">قراءة</a>
          </div>
        </div>
        @endforeach



      </div>

    </div>
  </section>
  @endsection<!-- End Services Section -->
