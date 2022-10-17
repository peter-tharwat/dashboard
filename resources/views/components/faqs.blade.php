<section class="wrapper bg-light">
  <div class="container py-14 py-md-16">
    <h2 class="display-4 mb-3 text-center">الأسئلة الشائعة</h2>
    <p class="lead text-center mb-10 px-md-16 px-lg-0">نرد على الاستفسارات الخاصة بكم في صورة سؤال وجواب.</p>
    <div class="row">
      <div class="col-lg-12 mb-0">
        <div id="accordion-1" class="accordion-wrapper">
          @php
          $faqs = \App\Models\Faq::orderBy('order','DESC')->get();
          @endphp
          @foreach($faqs as $faq)
          <div class="card accordion-item col-lg-12">
            <div class="card-header" id="accordion-heading-{{$faq->id}}">
              <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-{{$faq->id}}" aria-expanded="false" aria-controls="accordion-collapse-{{$faq->id}}" style="text-align: start">{{$faq->question}}</button>
            </div>
            <!-- /.card-header -->
            <div id="accordion-collapse-{{$faq->id}}" class="collapse" aria-labelledby="accordion-heading-{{$faq->id}}" data-bs-target="#accordion-1">
              <div class="card-body">
                <p>{{$faq->answer}}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.collapse -->
          </div>
          @endforeach
          
        </div>
        <!-- /.accordion-wrapper -->
      </div>
      <!--/column -->
      
      <!--/column -->
    </div>
    <!--/.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->