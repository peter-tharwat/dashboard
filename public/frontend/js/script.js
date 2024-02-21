
$(document).ready(function(){ 
   

    $('.counter').counterUp();
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        } 
    }); 
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
    (function(d,e,s){if(d.getElementById("likebtn_wjs"))return;a=d.createElement(e);m=d.getElementsByTagName(e)[0];a.async=1;a.id="likebtn_wjs";a.src=s;m.parentNode.insertBefore(a, m)})(document,"script","//w.likebtn.com/js/w/widget.js");
   
    function getSelected() {
        if (window.getSelection) { return window.getSelection(); }
        else if (document.getSelection) { return document.getSelection(); }
        else {
            var selection = document.selection && document.selection.createRange();
            if (selection.text) { return selection.text; }
            return false;
        }
        return false;
    }
    var elements = document.getElementsByClassName("post-text");
    Array.from(elements).forEach(function(element) {
        element.addEventListener('copy', (event) => {
        const pagelink = `\n\n تم نسخ هذا المنشور من موقع المركز المدني لقراءة المقال كاملا ، اضغط على الرابط : ${document.location.href}`;
      event.clipboardData.setData('text', document.getSelection() + pagelink);
        event.preventDefault();
        if(element.id.search("post")!=-1){
         var id=element.id.replace('post-text-','');
         var u='/copy_increment/'+id;
        }
        else if(element.id.search("res")!=-1){
            var id=element.id.replace('res-text-','');
            var u='/rescopy_increment/'+id;
        }
       else{
        var id=element.id.replace('subject-text-','');
        var u='/subcopy_increment/'+id;
       }
       $.ajax({
            type:'get',
            url:u ,
            success:function() {
                console.log('successed');
                $('#nquote-'+id).text(($('#nquote-'+id).text()*1)+1);
            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
              
              }  
         });
      });
    });
      
      function showShare() {
        
        var selection = getSelected();
        var e = window.event;
        var posX = e.clientX;
        var posY = e.clientY;
        posX = posX + 1;
        posY = posY + 8;
        if (selection != "") {
          
         $('.social-div').css({ 'left': posX+'px', 'top': posY+'px','opacity': '1','display':'block' }); }
        
         else
         {
            $('.social-div').css({ 'left': posX+'px', 'top': posY+'px', 'opacity': '0' });
         }
        //                if (selection && (selection = new String(selection).replace(/^\s+|\s+$/g, ''))) {
        //                    $.ajax({
        //                        type: 'post',
        //                        url: 'translate-plugin.aspx/Translate',
        //                        data: 'selection=' + encodeURI(selection)
        //
        //                    });

        //                }

        
    }
    $('.post-text').mouseup(showShare);
    $('.share').click(function(){
       
    });


    $('.post-bar a').click(function(){
        $('.post-bar a').removeClass('selected'); 
        $(this).addClass('selected');
    });

});

function downloadDocument(id,type){

    var currentDownloads=parseInt($("#"+type+"-download-"+id).text());
   $('#'+type+'-download-'+id).text(currentDownloads+1)
    
   $.ajax({
        type:'get',
        url:'/download_increment/'+id+'/'+type ,
        success:function(data) {
        console.log(data);
        },
        error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            console.log(err.Message);
          }  
    });
    
}

function like(id,type){
  
    $('#slike-'+id).toggleClass('liked');
    if($('#like-'+id).hasClass('liked')){
        $('#nlike-'+id).text(($('#nlike-'+id).text()*1)-1);       
    }
    else{
    $('#nlike-'+id).text(($('#nlike-'+id).text()*1)+1);
    }
    $('#like-'+id).toggleClass('liked');
  if(type=='post')
  var u= '/like_increment/'+id ;
  else if(type=='res')
  var u= '/reslike_increment/'+id ;
  else if(type=='idea')
  var u= '/idealike_increment/'+id ;
  else
  var u= '/sublike_increment/'+id ;
  
   $.ajax({
        type:'get',
        url:u ,
        success:function() {
        console.log('succ');
        },
        error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            console.log(err.Message);
            window.location='../login';
          }  
     });
    
}

function favorite(id,type){

    if($('#favorite-'+id).hasClass('liked')){
        $('#nfavorite-'+id).text(($('#nfavorite-'+id).text()*1)-1);       
    }
    else{
    $('#nfavorite-'+id).text(($('#nfavorite-'+id).text()*1)+1);
    }
    $('#favorite-'+id).toggleClass('liked');
    $('#sfavorite-'+id).toggleClass('liked');
    if(type=='post')
    var u= '/favorite_increment/'+id;
    else if(type=='res')
    var u= '/resfavorite_increment/'+id ;
    else if(type=='idea')
    var u= '/ideafavorite_increment/'+id ;
    else
    var u= '/subfavorite_increment/'+id ;
    $.ajax({
        type:'get',
        url:u ,
        success:function() {
            console.log('succ'); 
        },
        error:function(){
           window.location='../login';
        }  
     });
}
function copyres(id){
    var $temp = $("<input>");
    $("body").append($temp);
    const pagelink = `\n\n تم نسخ هذا المنشور من موقع المركز المدني لقراءة المقال كاملا ، اضغط على الرابط :\n ${document.location.href}`;
    $temp.val($('#res-text-'+id).text()+pagelink).select();
    document.execCommand("copy");
    $temp.remove();
}

// ***************************************************************























function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
    $('.social-div').css({ 'left': posX+'px', 'top': posY+'px', 'opacity': '0' });
  }
  function printDiv(id) 
  {
  
    var divToPrint=document.getElementById("res-text-"+id);
    newWin= window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();
  
  }


