<div>
    <div class="col-12 row m-0">
        <div class="col-12 pt-2 row d-flex justify-content-center ">
            @foreach($files as $file)
             <div  style="width:180px;" class="d-inline-block p-2">
                <div class="col-12 p-0 position-relative">
                    <input type="checkbox" name="selected-files" class="position-absolute" style="right: 5px;top: 5px;width: 25px;height: 25px;opacity: .9;z-index: -1" value="{{env('STORAGE_URL')}}{{$file->path}}{{$file->name}}" id="checkbox_file_{{$file->id}}" data-id="{{$file->id}}">
                    <img src="{{env('STORAGE_URL')}}{{$file->path}}{{$file->name}}" style="height: 100px;object-fit: cover;vertical-align: middle;width: 100%;padding: 2px;border-radius: 5px" class="image-file cursor-pointer" data-id="{{$file->id}}">
                </div>
             </div>
            @endforeach
            @if(count($files)==0)
            <div class="col-12 d-flex justify-content-center align-items-center" style="height: 300px;">
                <div class="col-12 d-inline-block text-center">
                    <span class="fal fa-images font-12" style="color:#ff9800"></span><br><br> <span class="fas fa-info-circle"></span> يتم إخفاء الصور حتى لا تؤثر على سرعة تحميل الصفحة <br> لذا يمكنك عرض الصور عبر زر العرض <br><br>
                    <span class="d-inline-block btn btn-success" wire:click="$emit('load_files')">عرض الصور</span>
                </div>
            </div>
            @endif
        </div>
        @if($files instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="col-12 pb-2 px-3 d-flex">
            {{$files->links()}}
        </div>
        @endif
        <div class="col-12 py-2 px-3 d-flex justify-content-end mb-3">
            <span class="d-inline-block btn btn-light btn-sm mx-2" data-bs-dismiss="modal">تراجع</span>
            <span class="d-inline-block btn btn-primary btn-sm"><span class="far fa-check-circle"></span> إختر الملفات</span>
        </div>
    </div>
</div>


