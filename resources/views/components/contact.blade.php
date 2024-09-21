<div class="col-lg-12">
   <form class="" method="POST" action="{{route('contact-post')}}" >
    {{-- <input type="hidden" name="recaptcha" id="recaptcha"> --}}
    @csrf
    <div class="messages"></div>
    <div class="row gx-4">
      <div class="col-md-6">
        <div class="form-floating mb-4">
          <input id="form_name" type="text" name="name" class="form-control" placeholder="محمد" required>
          <label for="form_name">الاسم بالكامل *</label>
         
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-floating mb-4">
          <input id="form_lastname" type="text" name="phone" class="form-control" placeholder="على" required>
          <label for="form_lastname">رقم الجوال *</label>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-floating mb-4">
          <input id="form_email" type="email" name="email" class="form-control" placeholder="ahmed@gmail.com" required>
          <label for="form_email">البريد *</label>
         
        </div>
      </div>
      <div class="col-12">
        <div class="form-floating mb-4">
          <textarea id="form_message" name="message" class="form-control" placeholder="محتوى رسالتك" style="height: 150px" required></textarea>
          <label for="form_message">رسالتك *</label>
         
        </div>
      </div>

      <div class="col-12">
        <button class="btn btn-primary btn-send mb-3">ارسل الرسالة</button>
      </div>

    </div>
  </form>
</div>