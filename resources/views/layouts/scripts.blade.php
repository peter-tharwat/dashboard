<script>
@if(auth()->check())
    var allEditors = document.querySelectorAll('.editor');
    var allEditorsAfterRender=[];
    let i;
    for ( i = 0; i < allEditors.length; i++) {
        $(allEditors[i]).attr('data-id',i);
        ClassicEditor.create(allEditors[i], {
                toolbar: {   
                    shouldNotGroupWhenFull: true
                },
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                }, 
                alignment: {
                    options: ['left', 'right', 'center']
                },
                ckfinder: {
                    uploadUrl: '{{route('admin.upload.image',['_token' => csrf_token() ])}}',
                    options: {
                        resourceType: 'Images'
                    }, 
                },
                image: {
                    toolbar: ['toggleImageCaption', 'imageTextAlternative']
                }
            })
            .catch(error => {
                console.error(error);
            }).then( (editor)=> {  
                 if(editor.sourceElement.classList.contains('with-file-explorer')){
                    allEditorsAfterRender.push(editor);
                    var current_id = allEditorsAfterRender.length-1;
                    $(editor.ui.view.toolbar.element).find('.ck-toolbar__items').append('<span><button class="ck ck-button ck-off" data-exe="open-image-selector-opener" type="button" tabindex="-1" data-bs-toggle="modal" data-bs-target="#open-image-selector-modal"  data-editor-id="'+current_id+'" onClick="set_latest_clicked_ckeditor('+current_id+');"><span class="fas fa-images "  ></span></button></span>');
                }
            }); 
    }
    function set_latest_clicked_ckeditor(id){
        $('#current_selected_editor').val(id);
    }
    $(document).on('click','.open-image-selector-opener',function(){
        alert($(this).data('editor-id'));
        
    });
    function get_website_title(){
        return $('meta[name="title"]').attr('content');
    }
    var notificationDropdown = document.getElementById('notificationDropdown')
    notificationDropdown.addEventListener('show.bs.dropdown', function() {
        $.ajax({
            method: "POST",
            url: "{{route('admin.notifications.see')}}",
            data: { _token: "{{csrf_token()}}" }
        }).done(function(res) {
            $('#dropdown-notifications-icon').fadeOut();
            favicon.badge(0);
        });
    });
    function append_notification_notifications(msg) {
        if (msg.count_unseen_notifications > 0) {
            $('#dropdown-notifications-icon').fadeIn(0);
            $('#dropdown-notifications-icon').text(msg.count_unseen_notifications);
        } else {
            $('#dropdown-notifications-icon').fadeOut(0);
            favicon.badge(0);
        }
        $('.notifications-container').empty();
        $('.notifications-container').append(msg.response);
        $('.notifications-container a').on('click', function() { window.location.href = $(this).attr('href'); });
    } 
    function get_notifications() {
        $.ajax({
            method: "GET",
            url: "{{route('admin.notifications.ajax')}}", 
            success: function(data, textStatus, xhr) {

                favicon.badge(data.notifications.response.count_unseen_notifications);

                if (data.alert) {
                    var audio = new Audio('{{asset("/sounds/notification.wav")}}');
                    audio.play();
                }  
                append_notification_notifications(data.notifications.response); 
                if (data.notifications.response.count_unseen_notifications > 0) {
                    $('title').text('(' + parseInt(data.notifications.response.count_unseen_notifications) + ')' + " " +  
                    get_website_title());

                } else {
                    $('title').text(get_website_title());
                }
            }
        });
    } 
    window.focused = 25000;
    window.onfocus = function() {
        get_notifications(); 
        window.focused = 25000;
    };
    window.onblur = function() {
        window.focused = 60000;
    }; 
    function get_nots() {
        setTimeout(function() { 
            get_notifications();
            get_nots();
        }, window.focused);
    }
    get_nots();

    var open_files_viewer = document.getElementById('open-image-selector-modal');
    open_files_viewer.addEventListener('show.bs.modal', function (event) {
       /* Livewire.emit('toggleOpen');*/
    }); 
    $(document).on('click','.image-file',function(){
        $(this).toggleClass('active');
        $('#checkbox_file_'+$(this).attr('data-id')).attr('checked', function(_, attr){ return !attr});
    }); 
    $('#selected-files-insert-btn').on('click',function(){
        var ek = $('.selected-files:checked').map((_,el) => el.value).get()
        
        var values=[];
        $.each(ek,function(key,value){
            values.push({
                src:value,
                class:'data-fancybox'
            }) 
        });  
        allEditorsAfterRender[$('#current_selected_editor').val()].execute( 'insertImage', {
            source:  values
        });
        $('.selected-files').removeAttr('checked');
        $('.image-file').removeClass('active');
    });
    @if($unreadNotifications!=session('seen_notifications') && $unreadNotifications!=0)
        @php
        session(['seen_notifications'=>$unreadNotifications]);
        @endphp
        var audio = new Audio('{{asset("/sounds/notification.wav")}}');
        audio.play();
    @endif


    
@else 
/* Guest Js */


@endif
</script>
