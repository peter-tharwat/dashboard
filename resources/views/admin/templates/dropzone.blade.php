<script>
    $('{{ (isset($selector)&&!is_null($selector)) ? $selector : '#file-uploader-nafezly'}} .file-uploader-files').fileuploader({
        addMore: true,
        limit: {{ (isset($max_files)&&!is_null($max_files)) ? $max_files : '100'}},
        maxSize: {{ (isset($max_file_size)&&!is_null($max_file_size)) ? $max_file_size : '250'}},
        inputNameBrackets:false, 
        enableApi: true,
        extensions:
        @if((isset($accepted_files)&&!is_null($accepted_files)))
        {!!$accepted_files!!}
        @else 
        @php
        $accepted_files=explode(',', str_replace('.', '', view('admin.templates.allowed-files')) );
        @endphp
        {!!json_encode($accepted_files)!!}
        @endif
         ,
        changeInput: '<div class="fileuploader-input mb-2">' +
                          '<div class="fileuploader-input-inner">' +
                              '<div class="fileuploader-icon-main"></div>' +
                              '<h3 class="fileuploader-input-caption"><span>قم بإرفاق الملفات</span></h3>' +
                              '<p>${captions.or}</p>' +
                              '<button type="button" class="fileuploader-input-button"><span>${captions.button}</span></button>' +
                          '</div>' +
                      '</div>',
        theme: 'dragdrop',
        

        captions: {
            button: function(options) {
                return 'تصفح ' + (options.limit == 1 ? 'ملف' : 'ملفات');
            },
            feedback: function(options) {
                return 'اختر ' + (options.limit == 1 ? '1' : 'ملف') + ' للرفع';
            },
            feedback2: function(options) {
                return options.length + ' ' + (options.length > 1 ? 'ملفات هنا' : 'ملفات كانت') + ' مختارة';
            },
            confirm: 'تأكيد',
            cancel: 'الغاء',
            name: 'الاسم',
            type: 'النوع',
            size: 'الحجم',
            dimensions: 'الأبعاد',
            duration: 'المدة',
            crop: 'اقتصاص',
            rotate: 'تدوير',
            sort: 'ترتيب',
            download: 'تحميل',
            remove: 'حذف',
            drop: 'قم بافلات الملفات هنا للرفع',
            paste: '<div class="fileuploader-pending-loader"></div> ملف تالف اضغط للحذف.',
            removeConfirmation: 'هل أنت متأكد من حذف الملف ?',
            errors: {
                filesLimit: function(options) {
                    return 'فقط ${limit} ' + (options.limit == 1 ? 'ملف' : 'ملفات') + ' يمكن رفعها.'
                },
                filesType: 'فقط ${extensions} الانواع السابقة من الملفات التي يمكن رفعها.',
                fileSize: '${name} حجمه كبير جداً! يمكن رفع ملفات لحد أقصى ${fileMaxSize}MB.',
                filesSizeAll: 'الملفات المستخدمة كبيرة للغاية! من فضلك قم بإختيار ملفات لحد اقصى ${maxSize} MB.',
                fileName: 'الملف بالاسم ${name} مستخدم من قبل.',
                remoteFile: 'دوران الملف غير مسموح به.',
                folderUpload: 'ملفات غير مدعومة.'
            }
        },


        upload: {
            url: '{{ (isset($url)&&!is_null($url)) ? $url : '/test-upload-url'}}',
            data: { _token:'{{csrf_token()}}' ,user_id:'{{\Auth::check()?auth()->id():null}}'},
            type: '{{ (isset($method)&&!is_null($method)) ? $method : 'POST'}}',
            enctype: 'multipart/form-data',
            start: true,
            synchron: true,
            beforeSend: null,
            onSuccess: function(result, item) {


                $("{{ (isset($enable_selector_after_upload)&&!is_null($enable_selector_after_upload)) ? $enable_selector_after_upload : '#upload-button'}}").attr("disabled", false);
                   $('.pace-inactive').fadeOut('fast');
                var data = {};
                // get data
                if (result && result.files)
                    data = result;
                else
                    data.hasWarnings = true;
                
                // if success
                if (data.isSuccess && data.files[0]) {
                    item.name = data.files[0].name;
                    item.html.find('.column-title > div:first-child').text(data.files[0].name).attr('title', data.files[0].name);
                }
                
                // if warnings
                if (data.hasWarnings) {
                    for (var warning in data.warnings) {
                        alert(data.warnings[warning]);
                    }
                    
                    item.html.removeClass('upload-successful').addClass('upload-failed');
                    return this.onError ? this.onError(item) : null;
                }
                
                item.html.find('.fileuploader-action-remove').addClass('fileuploader-action-success');
                setTimeout(function() {
                    item.html.find('.progress-bar2').fadeOut(400);
                }, 400);
            },
            onError: function(item) {

                $("{{ (isset($enable_selector_after_upload)&&!is_null($enable_selector_after_upload)) ? $enable_selector_after_upload : '#upload-button'}}").attr("disabled", false);
                   $('.pace-inactive').fadeOut('fast');


                var progressBar = item.html.find('.progress-bar2');
                
                if(progressBar.length) {
                    progressBar.find('span').html(0 + "%");
                    progressBar.find('.fileuploader-progressbar .bar').width(0 + "%");
                    item.html.find('.progress-bar2').fadeOut(400);
                }
                
                item.upload.status != 'cancelled' && item.html.find('.fileuploader-action-retry').length == 0 ? item.html.find('.column-actions').prepend(
                    '<button type="button" class="fileuploader-action fileuploader-action-retry text-center" style="background:#03A9F4;border-radius:50%;margin-left:10px;" title="اعادة المحاولة"><i class="far fa-redo-alt font-1" style="color:#fff;position: relative;left: 0px;top: -5px;padding: 1px;"></i></button>'
                ) : null;
            },
            onProgress: function(data, item) {

                $("{{ (isset($enable_selector_after_upload)&&!is_null($enable_selector_after_upload)) ? $enable_selector_after_upload : '#upload-button'}}").attr("disabled", true);
                   $('.pace-inactive').fadeIn('fast');



                var progressBar = item.html.find('.progress-bar2');
                
                if(progressBar.length > 0) {
                    progressBar.show();
                    progressBar.find('span').html(data.percentage + "%");
                    progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
                }
            },
            onComplete: null,
        },
        onRemove: function(item) {
            $.ajax({
                url:'{{ (isset($remove_url)&&!is_null($remove_url)) ? $remove_url : '/test-upload-url'}}',
                method:'{{ (isset($remove_method)&&!is_null($remove_method)) ? $remove_method : 'POST'}}',
                data:{name:item.name,'_token':'{{csrf_token()}}',type :'{{ (isset($parent_id)&&!is_null($parent_id)) ? 'old' : 'new'}}',parent_id:item.name}
            }).done(function(msg){
                console.log(msg);
            });
        },
        captions: $.extend(true, {}, $.fn.fileuploader.languages['en'], {
            feedback: 'اضغط او قم بالسحب و الافلات هنا',
            feedback2: 'رفع المزيد',
            drop: 'قم بإفلات الملفات',
            or: 'او',
            button: 'تصفح الملفات',
        })

    }); 
</script>