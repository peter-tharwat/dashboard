var favicon = new Favico({
    bgColor: '#dc0000',
    textColor: '#fff',
    animation: 'slide',
    fontStyle: 'bold',
    fontFamily: 'sans',
    type: 'circle'
});
$("#validate-form").validate({ignore: [],});
document.addEventListener("DOMContentLoaded", function(event) {
   $.extend( $.validator.messages, {
        required: "برجاء ملئ هذا الحقل",
        remote: "يرجى تصحيح هذا الحقل للمتابعة",
        email: "رجاء إدخال عنوان بريد إلكتروني صحيح",
        url: "رجاء إدخال عنوان موقع إلكتروني صحيح",
        date: "رجاء إدخال تاريخ صحيح",
        dateISO: "رجاء إدخال تاريخ صحيح (ISO)",
        number: "رجاء إدخال عدد بطريقة صحيحة",
        digits: "رجاء إدخال أرقام فقط",
        creditcard: "رجاء إدخال رقم بطاقة ائتمان صحيح",
        equalTo: "رجاء إدخال نفس القيمة",
        extension: "رجاء إدخال ملف بامتداد موافق عليه",
        maxlength: $.validator.format( "الحد الأقصى لعدد الحروف هو {0}" ),
        minlength: $.validator.format( "الحد الأدنى لعدد الحروف هو {0}" ),
        rangelength: $.validator.format( "عدد الحروف يجب أن يكون بين {0} و {1}" ),
        range: $.validator.format( "رجاء إدخال عدد قيمته بين {0} و {1}" ),
        max: $.validator.format( "رجاء إدخال عدد أقل من أو يساوي {0}" ),
        min: $.validator.format( "رجاء إدخال عدد أكبر من أو يساوي {0}" )
    });
});
Fancybox.bind("[data-fancybox]", {});
Fancybox.bind("img.data-fancybox", {});
Fancybox.bind(".data-fancybox img", {});
$('.asideToggle').on('click', function() {
    $('.aside').toggleClass('active');
    $('.aside').toggleClass('in-active');
    $('.main-content').toggleClass('active');
    $('.main-content').toggleClass('in-active');
});
$("a[href='" + window.location.href + "'] >div").addClass('active');
$('.alert-click-hide').on('click', function() {
    $(this).fadeOut();
});
toastr.options = {progressBar:true,preventDuplicates:true,newestOnTop:true,positionClass:'toast-top-left',timeOut:10000}
let smart_alert = toastr;