document.addEventListener("DOMContentLoaded", () => {
    Fancybox.bind("[data-fancybox]", {});
    Fancybox.bind("img.data-fancybox", {});
    Fancybox.bind(".data-fancybox img", {});
    $('.alert-click-hide').on('click', function() {
        $(this).fadeOut();
    });
    toastr.options = {progressBar:true,preventDuplicates:true,newestOnTop:true,positionClass:'toast-top-left',timeOut:10000}
    let smart_alert = toastr;
    var favicon = new Favico({
        bgColor: '#dc0000',
        textColor: '#fff',
        animation: 'slide',
        fontStyle: 'bold',
        fontFamily: 'sans',
        type: 'circle'
    });
});