@auth
<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/js/tinymce/ar.js"></script>
@endauth
<script>
@if(auth()->check())
    var temp_file_selector = document.getElementById('temp_file_selector') !== null?document.getElementById('temp_file_selector').value:null;

    tinymce.init({
        selector: '.editor,#editor',
        plugins: ' advlist image media autolink code codesample directionality table wordcount quickbars link lists',
        images_upload_url:"{{route('admin.upload.image',['_token' => csrf_token() ])}}&temp_file_selector="+temp_file_selector,
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
@else 
/* Guest Js */


@endif

</script>
<script type="module">
// Create a multi file upload component
const ponds = document.querySelectorAll('.filepond');

// Loop through each element and create a FilePond instance
ponds.forEach(pondElement => {
    FilePond.create(pondElement, {
        multiple: true, // Allow multiple files
        //name: 'filepond' ,// Set the name attribute for the input field
        allowReorder: true,
        storeAsFile: true,
        onreorderfiles: (files) => {
            var reordered = files.map(file => file);
            //console.log(reordered);
        }
    });
});
/*
const pond = FilePond.create(document.querySelectorAll('.filepond'),{
    multiple: true,
    name: 'filepond'
});*/

toastr.options={"positionClass": "toast-top-left"};
@if($errors->any())
    @foreach($errors->all() as $error)
        toastr.info("{{ $error }}");
    @endforeach
@endif
</script>