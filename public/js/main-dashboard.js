document.addEventListener("DOMContentLoaded", () => {
$('.asideToggle').on('click', function() {
    $('.aside').toggleClass('active');
    $('.aside').toggleClass('in-active');
    $('.main-content').toggleClass('active');
    $('.main-content').toggleClass('in-active');
});
$('.settings-tab-opener').on('click',function(){
    $('.settings-tab-opener').removeClass('active');
    $(this).addClass('active');
    var open_id = $(this).attr('data-opentab');
    $('.taber').removeClass('active');
    $('.taber#'+open_id).addClass('active');
});
var getUrl = window.location;
$(".aside a[href='" + getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/" +getUrl.pathname.split('/')[2] + "']").closest('.item').find('.item-container').addClass('active');
$(".aside a[href='" + getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/" +getUrl.pathname.split('/')[2] + "']").closest('.item').find('.sub-item').addClass('active');
$(".aside a[href='" + getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/" +getUrl.pathname.split('/')[2] + "']").closest('.item').find('.sub-item').find("a[href='" + getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/" +getUrl.pathname.split('/')[2] + "']").addClass('active');
$(".aside a[href='" + getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/" +getUrl.pathname.split('/')[2] + "'] >div").addClass('active');
$(".aside a[href='" + window.location.href + "'] >div").addClass('active');
$(".aside a[href='" + window.location.href + "']").addClass('active');

$('input[required],select[required],textarea[required]').parent().parent().find('>div:nth-of-type(1)').append('<span style="color:red;font-size:16px">*</span>');
$("[name='title'],[name='slug'],[name='meta_description']").on('keypress',function(){
    $(this).parent().find('.last_appended_counter').remove();
    $(this).parent().append('<div class="col-12 p-2 last_appended_counter"><span class="d-inline-block" style="font-size:13px">عدد الحروف <span style="font-weight:bolder;color:#007469;font-size:15px">'+$(this).val().length+'</span> حرفاً</span></div>');
});

$("[name='title'],[name='slug'],[name='description_ar'],[name='description_en'],[name='meta_description']").append(function(){
    $(this).parent().find('.last_appended_counter').remove();
    $(this).parent().append('<div class="col-12 p-2 last_appended_counter"><span class="d-inline-block" style="font-size:13px">عدد الحروف <span style="font-weight:bolder;color:#007469;font-size:15px">'+$(this).val().length+'</span> حرفاً</span></div>');
}); 
$(document).ready(function() {
    $('.select2-select').select2();
});
setTimeout(function(){
    $('#loading-image-container').fadeOut();
},500);
$('input[type="file"]').on('change',function(e){ 
    $('#upload_'+$(this).attr('rand_key')).remove();
    var rand_key = (Math.random() + 1).toString(36).substring(7);
    $(this).attr('rand_key',rand_key);
    if(e.target.files.length){
        $(this).attr('rand_key',rand_key);
        $('<div class="col-12 py-2 px-0" id="upload_'+rand_key+'"></div>').insertAfter(this);
        $.each(e.target.files,(key,value)=>{
            $('#upload_'+rand_key).append('<div class="row d-flex m-0   btn" style="border:1px solid rgb(136 136 136 / 17%);max-width: 100%;padding: 5px;width: 220px;background: rgb(142 142 142 / 6%);margin-bottom:10px!important"><div style="max-height: 35px;overflow: hidden;display:flex;flex-flow: nowrap;" class="p-0 align-items-center">\
                <span class="d-inline-block font-small " style="line-height: 1.2;opacity: 0.7;border-radius: 12px;overflow:hidden;width:71px">\
                    <span class="fal fa-cloud-download p-2 font-2 me-2" style="background:rgb(129 129 129 / 24%);border-radius: 12px;"></span>\
                </span>\
                <span style="direction: ltr;position: relative;top: -2px;height:14px;overflow:hidden" class="d-inline-block naskh font-small"> '+value.name+' </span>\
                    <span class="d-inline-block font-small px-2" style="position: relative;font-weight: bold;"> '+(Math.round(value.size/1000000 * 100) / 100).toFixed(2)+'M </span>\
                </div>\
            </div>')});
    }
});
$('.item-container').on('click',function(){
    $(this).siblings().find('.sub-item').slideToggle('fast');
});
$('#home-dashboard-divider').css('width','40%');
});