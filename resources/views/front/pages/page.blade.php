@extends('layouts.app',['page_title'=>$page->title,'page_description'=>$page->meta_description])
@section('content')
<div class="col-12 bg-light pt-6 px-0">
	

    <section class="section-frame overflow-hidden">
      <div class="wrapper bg-soft-primary">
        <div class="container py-12 py-md-10 text-center">
          <div class="row">
            <div class="col-md-7 col-lg-6 col-xl-5 mx-auto">
              <h1 class="display-1 mb-3 text-center">{{$page->title}}</h1>
              <p class="lead px-lg-5 px-xxl-8 mb-1 text-center">{{$page->meta_description}}</p>
            </div>
            <!-- /column -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </div>
      <!-- /.wrapper -->
    </section>


<div class="col-12 p-0 bg-light">
	<div class=" p-0 container">
		<div class="col-12 p-2 p-lg-5 row front-content" style="min-height:70vh">
				{!!$page->description!!} 
		</div>
	</div>
</div>
</div>
@endsection