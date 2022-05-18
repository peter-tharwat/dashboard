<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/js/tinymce/ar.js"></script>
<script>
@if(auth()->check())
    tinymce.init({
        selector: '.editor,#editor',
        plugins: ' advlist image media autolink code codesample directionality table wordcount quickbars link lists numlist bullist',


        images_upload_url:"{{route('admin.upload.image',['_token' => csrf_token() ])}}",
        file_picker_types: 'file image media',
        image_caption: true,
        image_dimensions:true,
        directionality : 'rtl',
        language:'ar',
        quickbars_selection_toolbar: 'bold italic |h1 h2 h3 h4 h5 h6| formatselect | quicklink blockquote | numlist bullist',
        entity_encoding : "raw",
        verify_html : false ,
        object_resizing : 'img',
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
