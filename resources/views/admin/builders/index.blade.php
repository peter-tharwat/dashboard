@extends('layouts.app',['page_title'=>"تصميم ". $page->title])
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style type="text/css">
.main-nav,
.copy-rights-footer,
footer {
    display: none !Important;
}

body {
    margin: 0px !important;
}

/*.hoverable-components-builder {
    border: 3px dashed transparent;
}*/
.accordion-button {
    box-shadow: none !important;
}

.accordion-button:after {
    margin-right: auto;
    margin-left: 0px;
}

.content-block:hover .show-on-hover {
    display: block !important;
}

.highlight-block {
    /*border:2px dashed #d8d8d8!important;*/
    background: #ffefd9 !important;
    opacity: 0.9;
}


/*.hoverable-components-builder:hover {
    opacity: 0.9;
    background: rgb(96 125 139 / 11%);
    border-radius: 9px;
    cursor: pointer;
}
*/
.sortable-chosen {
    border: unset;
    /*  box-sizing:border-box; 
    border: 3px dashed #d1d1d1 !important;
    border-radius: 5px !important;
*/
}

.sortable-chosen.sortable-ghost {
    border: 3px dashed #d1d1d1 !important;
    /*transform:rotate(-1deg)!important;*/
}

/*.content-block{
    box-sizing:border-box;
    border: 3px solid transparent;
}*/
.content-block:hover .show-on-hover .append-plus-start,
.content-block:hover .show-on-hover .append-plus-end {
    display: flex;
}

.append-plus-end,
.append-plus-start {
    position: absolute;
    font-size: 17px;
    background: #272727;
    color: #fff;
    width: 36px;
    height: 36px;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    left: -50%;
    right: 50%;
    display: none;
    cursor: pointer;
}

.append-plus-end {
    bottom: -15px;
}

.append-plus-start {
    top: -21px;
}


.nav-tabs .nav-link {
    background: transparent;
    font-size: 14px;
}

.nav-tabs .nav-link.active {
    color: #303030;
}


.form-control {
    font-size: 14px;
    border-radius: 3px !important;
}
@media(max-width: 800px){
    #builder-aside{
        width:100%!important;
        position:fixed;
        margin-right:-100%!important;
        top: 65px;

    }
    #builder-aside:not(.aside-closed){
        width: 100%;
        position:fixed!important;
        margin-right:-100%;
        top: 65px!important;
    }
    #site-main-container:not(.full-width){
        width:100%!important;
    }
    #site-main-container > div:nth-of-type(1){
        padding:0px!important;
    }
}


#site-main-container.full-width{
    width:100%!important;
}
#site-main-container.full-width > div:nth-of-type(1){
    padding:0px!important
}
#builder-aside.aside-closed{
    width: 360px!important;
    position:fixed!important;
    margin-right:-400px!important;
    top:65px!important;
}
#builder-aside{
    margin-right:0px!important;
}
</style>
<div class="p-0 " style="min-height:70vh" id="builder-main-container">
    <div class="col-12 p-0 row">
        <div class="col-12 p-0" style="overflow:hidden">

            <div class="col-12 row py-1 px-3 d-flex align-items-center" style="background:#fff;border-block: 1px solid #f1f1f1;height: 65px;">
                <div class="col px-1 row d-flex align-items-center" style="height: 100%;">

                    <div class="col-auto px-0 d-flex justify-content-center align-items-center " style="width: 55px;cursor: pointer;height: 100%;" @click="aside_toggle()">
                        <span class="fal fa-bars font-4"></span>
                    </div>
                    <div class="d-inline-block text-truncate" style="max-width: calc(100% - 55px);">
                        {{$page->title}}
                    </div>
                   
                </div>
                <div class="col-auto px-1">
                    <a class="btn btn-light py-1 px-3 mx-1 font-1 border" href="{{request()->url()}}">الغاء التعديلات</a>
                    <button class="btn btn-primary py-1 px-3 mx-1 font-1" v-on:click="submit_page_updates()">حفظ التعديلات</button>
                    
                </div>
            </div>

            <div class="col-12 p-0" style="min-height: 80dvh;">
                <div class="col-12 p-0 row">
                    <div class="col-auto p-0 " style="top: 0;width: 360px;margin-right: 0px;z-index: 10000;position: relative;background: #fff;" id="builder-aside">
                        
                        <div style="height:calc( 100dvh - 65px );overflow: hidden;" class="p-0 col-12 add-component aside-wedgit">

                            <div class="col-12 px-3 mb-2 row">
                                <div class="col-auto p-0 d-flex align-items-center justify-content-center" v-on:click="aside_toggle()">
                                    <span class="btn btn-light" style="width: 40px;height: 40px;display: inline-block;padding: 0px;display: flex;align-items: center;justify-content: center;border:1px solid #eeeeee;border-radius:50%;color:inherit;"><span class="fas fa-chevron-right" style="font-size:18px;"></span></span>
                                </div>
                                <div class="col p-0 font-3">
                                    <h3 class="p-3 m-0 d-flex justify-content-between align-items-center">
                                        <span>أضف قسم جديد</span>
                               
                                    </h3>
                                </div>
                            </div>



                            {{-- <div class="col-12 px-3 mb-2 row">
                                <h3 class="p-3 m-0">أضف قسم جديد</h3>
                            </div> --}}
                            <div class="col-12 p-3 row " id="items" style="height:calc(100dvh - 150px);overflow: auto;">
                                <div class="col-12 p-0 component mb-2" v-on:click="template_generator('component_banner')" data-id="component_text" style="cursor: pointer;">
                                    <div class="p-1" style="background:#f1f1f1;border-radius:10px">
                                        <img src="/images/components/component_banner.png" style="width:100%;border-radius: 10px;" class="p-1">
                                        <div class="col-12 font-2 px-2 d-flex">
                                            <div class="col px-0">
                                                بانر
                                            </div>
                                            <div class="col-auto px-0">
                                                <i class="far fa-chevron-left"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 p-0 component mb-2" v-on:click="template_generator('component_text')" data-id="component_text" style="cursor: pointer;">
                                    <div class="p-1" style="background:#f1f1f1;border-radius:10px">
                                        <img src="/images/components/component_text.png" style="width:100%;border-radius: 10px;" class="p-1">
                                        <div class="col-12 font-2 px-2 d-flex">
                                            <div class="col px-0">
                                                نص
                                            </div>
                                            <div class="col-auto px-0">
                                                <i class="far fa-chevron-left"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 p-0 component mb-2" v-on:click="template_generator('component_text_with_image')" data-id="component_text_with_image" style="cursor: pointer;">
                                    <div class="p-1" style="background:#f1f1f1;border-radius:10px">
                                        <img src="/images/components/component_text_with_image.png" style="width:100%;border-radius: 10px;" class="p-1">
                                        <div class="col-12 font-2 px-2 d-flex">
                                            <div class="col px-0">
                                                نص مع صورة
                                            </div>
                                            <div class="col-auto px-0">
                                                <i class="far fa-chevron-left"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 p-0 component mb-2" v-on:click="template_generator('component_text_with_video')" data-id="component_text_with_video" style="cursor: pointer;">
                                    <div class="p-1" style="background:#f1f1f1;border-radius:10px">
                                        <img src="/images/components/component_text_with_video.png" style="width:100%;border-radius: 10px;" class="p-1">
                                        <div class="col-12 font-2 px-2 d-flex">
                                            <div class="col px-0">
                                                نص مع فيديو
                                            </div>
                                            <div class="col-auto px-0">
                                                <i class="far fa-chevron-left"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 p-0 component mb-2" v-on:click="template_generator('component_cta')" data-id="component_text" style="cursor: pointer;">
                                    <div class="p-1" style="background:#f1f1f1;border-radius:10px">
                                        <img src="/images/components/component_cta.png" style="width:100%;border-radius: 10px;" class="p-1">
                                        <div class="col-12 font-2 px-2 d-flex">
                                            <div class="col px-0">
                                                اتخاذ اجراء
                                            </div>
                                            <div class="col-auto px-0">
                                                <i class="far fa-chevron-left"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 p-0 component mb-2" v-on:click="template_generator('component_features')" data-id="component_features" style="cursor: pointer;">
                                    <div class="p-1" style="background:#f1f1f1;border-radius:10px">
                                        <img src="/images/components/component_features.png" style="width:100%;border-radius: 10px;" class="p-1">
                                        <div class="col-12 font-2 px-2 d-flex">
                                            <div class="col px-0">
                                                المميزات
                                            </div>
                                            <div class="col-auto px-0">
                                                <i class="far fa-chevron-left"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 p-0 component mb-2" v-on:click="template_generator('component_faqs')" data-id="component_faqs" style="cursor: pointer;">
                                    <div class="p-1" style="background:#f1f1f1;border-radius:10px">
                                        <img src="/images/components/component_faqs.png" style="width:100%;border-radius: 10px;" class="p-1">
                                        <div class="col-12 font-2 px-2 d-flex">
                                            <div class="col px-0">
                                                الأسئلة الشائعة
                                            </div>
                                            <div class="col-auto px-0">
                                                <i class="far fa-chevron-left"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 p-0 component mb-2" v-on:click="template_generator('component_html')" data-id="component_html" style="cursor: pointer;">
                                    <div class="p-1" style="background:#f1f1f1;border-radius:10px">
                                        <img src="/images/components/component_html.png" style="width:100%;border-radius: 10px;" class="p-1">
                                        <div class="col-12 font-2 px-2 d-flex">
                                            <div class="col px-0">
                                                كود HTML مخصص
                                            </div>
                                            <div class="col-auto px-0">
                                                <i class="far fa-chevron-left"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 p-0 component mb-2" v-on:click="template_generator('component_contact')" data-id="contact_form" style="cursor: pointer;">
                                    <div class="p-1" style="background:#f1f1f1;border-radius:10px">
                                        <img src="/images/components/component_contact.png" style="width:100%;border-radius: 10px;" class="p-1">
                                        <div class="col-12 font-2 px-2 d-flex">
                                            <div class="col px-0">
                                                نموذج تواصل معنا
                                            </div>
                                            <div class="col-auto px-0">
                                                <i class="far fa-chevron-left"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 p-0 component mb-2" v-on:click="template_generator('component_slider')" data-id="component_slider" style="cursor: pointer;">
                                    <div class="p-1" style="background:#f1f1f1;border-radius:10px">
                                        <img src="/images/components/component_slider.png" style="width:100%;border-radius: 10px;" class="p-1">
                                        <div class="col-12 font-2 px-2 d-flex">
                                            <div class="col px-0">
                                                صور متعددة
                                            </div>
                                            <div class="col-auto px-0">
                                                <i class="far fa-chevron-left"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 p-0 component mb-2" v-on:click="template_generator('component_content')" data-id="contact_form" style="cursor: pointer;">
                                    <div class="p-1" style="background:#f1f1f1;border-radius:10px">
                                        <img src="/images/components/component_content.png" style="width:100%;border-radius: 10px;" class="p-1">
                                        <div class="col-12 font-2 px-2 d-flex">
                                            <div class="col px-0">
                                                محتويات الموقع
                                            </div>
                                            <div class="col-auto px-0">
                                                <i class="far fa-chevron-left"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display: none;height: calc( 100dvh - 65px );overflow: hidden;" class="p-0 col-12 edit-component aside-wedgit">
                            <div class="col-12 px-3 mb-2 row">
                                <div class="col-auto p-0 d-flex align-items-center justify-content-center" v-on:click="change_aside_view('add_component')">
                                    <span class="btn btn-light" style="width: 40px;height: 40px;display: inline-block;padding: 0px;display: flex;align-items: center;justify-content: center;border:1px solid #eeeeee;border-radius:50%;color:inherit;"><span class="fas fa-chevron-right" style="font-size:18px;"></span></span>
                                </div>
                                <div class="col p-0 font-3">
                                    <h3 class="p-3 m-0 d-flex justify-content-between align-items-center">
                                        <span>تعديل القسم</span>
                                        <span class="far fa-trash ms-2" v-on:click="change_aside_view('add_component');contents[selected_page]?.splice(contents[selected_page]?.findIndex(block => block.id === selected_unique_id), 1);" style="color:#f44336;font-size: 18px;cursor: pointer;"></span>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-12 p-3 " id="builder-editor" style="height:calc(100dvh - 150px);overflow: auto;">
                                <div class="col-12 p-0">
                                    <nav style="background:#d9e2ef!important;border-radius: 5px;">
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <div class="col p-1">
                                                <button style="padding: 5px;border-radius: 5px;" :class="{'active': current_edit_tab === 'content'}" class="col-12 text-center nav-link " id="content-tab" data-bs-toggle="tab" data-bs-target="#nav-content" type="button" role="tab" aria-controls="nav-content" aria-selected="true" v-on:click="change_edit_tab('content')">المحتوى</button>
                                            </div>
                                            <div class="col p-1">
                                                <button style="padding: 5px;border-radius: 5px;" :class="{'active': current_edit_tab === 'design'}" class="col-12 text-center nav-link" id="design-tab" data-bs-toggle="tab" data-bs-target="#nav-design" type="button" role="tab" aria-controls="nav-design" aria-selected="false" v-on:click="change_edit_tab('design')">التصميم</button>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div v-if="selected_unique_id">
                                        {{-- <draggable v-model="dums" handle=".handle" :group="{ name: 'people', pull: 'clone', put: false }" ghost-class="ghost" :sort="false" @change="log">
                                        </draggable> --}}
                                        {{-- <draggable :list="dums" :item-key="order" draggable=".item">
                                            <div v-for="element in dums" :key="element.order" class="item">
                                                @{{element.order}}
                                            </div>
                                            <button slot="footer" @click="addPeople">Add</button>
                                        </draggable> --}}
                                        {{-- <draggable :list="dums" group="people" @end="onEnd">
                                            <div v-for="element in dums" :key="element.key">@{{element.key}}</div>
                                        </draggable> --}}
                                    </div>
                                    <div :class="{'show active': current_edit_tab === 'content'}" class="tab-pane fade" id="nav-content" role="tabpanel" aria-labelledby="content-tab">
                                        <div v-if="('content_title' in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}) )" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                العنوان
                                            </div>
                                            <div class="col-12 px-2 mb-3">
                                                <input class="form-control" type="" name="" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).content_title" style="font-size:14px;border-radius: 2px;">
                                            </div>
                                        </div>
                                        <div v-if="('content_sub_title' in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}) )" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                العنوان الفرعي
                                            </div>
                                            <div class="col-12 px-2 mb-3">
                                                <input class="form-control" type="" name="" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).content_sub_title" style="font-size:14px;border-radius: 2px;">
                                            </div>
                                        </div>
                                        <div v-if="('content_image_url' in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}) )" class="col-12 p-0">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                الصورة
                                            </div>
                                            <div class="col-12 px-2 mb-3">
                                                <div v-if="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).content_image_url == null" class="col-12 p-0 row d-flex align-items-center">
                                                    <div style="width: 100px;padding: 0px;position: relative;height: 50px;overflow: hidden;background: #f1f1f1;cursor: pointer;" class="d-flex align-items-center justify-content-center">
                                                        <span style="font-size:13px"> <span class="fal fa-upload"></span> ارفع أو</span>
                                                        <input type="file" style="width:100%;opacity: 0;height: 100%;position: absolute;right: 0px;top: 0px;" @change="upload_image" :data-input="JSON.stringify(['contents',selected_page,contents[selected_page]?.findIndex(block => block.id === selected_unique_id),'fields','content_image_url'])">
                                                    </div>
                                                    <div style="width: calc(100% - 100px);padding: 0px;">
                                                        <input class="form-control preview-url" type="" name="" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).content_image_url" style="font-size:14px;border-radius: 2px;" placeholder="ألصق الرابط هنا">
                                                    </div>
                                                </div>
                                                <div v-if="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).content_image_url != null" class="col-12 p-2" style="border:1px solid #f1f1f1">
                                                    <div class="col-12 p-0 mb-3">
                                                        <div style="width:100%;position: relative;">
                                                            <span class="fal fa-times" style="width: 25px;height: 25px;display: flex;align-items: center;justify-content: center;position: absolute;left: 10px;color: white;top: 10px;border-radius: 50%;background: rgb(255 0 0 / 55%);cursor: pointer;font-size: 12px;" v-on:click="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).content_image_url = null;"></span>
                                                            <img :src="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).content_image_url" style="width: 100%;border-radius: 10px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="('content_description' in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}) )" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                الوصف
                                            </div>
                                            <div class="col-12 px-2 mb-3">
                                                <textarea class="form-control" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).content_description" style="border-radius: 2px;min-height: 150px;"></textarea>
                                            </div>
                                        </div>
                                        <div v-if="('content' in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}) )" class="col-12 p-0 row">
                                            {{-- <div class="col-12 px-3 mb-2 font-1">
                                                التحكم
                                            </div> --}}
                                            {{--
                                            selected_ids
                                            --}}
                                            <div class="col-6 px-0 my-1">
                                                <div class="col-12 px-3 mb-2 font-1">
                                                    النوع
                                                </div>
                                                <div class="col-12 px-2 mb-3">
                                                    <select v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).content.type" class="form-control" >
                                                        <option value="" disabled hidden >اختر</option>
                                                        <option value="categories" >عرض جميع الأقسام</option>
                                                        <option value="articles">عرض أحدث المقالات</option>
                                                        <option value="categories_articles">مقالات الأقسام</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div v-if="loaded_content_type" class="col-6 px-0 my-1">
                                                <div class="col-12 px-3 mb-2 font-1">
                                                    اختر
                                                </div>
                                                <div class="col-12 px-2 mb-3"> 
                                                    <div class="dropdown col-12 p-0">
                                                      <a class="  col-12 form-control" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                                        
                                                       <span v-if="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).content.selected_ids.length == 0 ">الكل</span>

                                                       <span  v-for="selected_id in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).content.selected_ids"  class="d-inline-block" style="max-width:100%" >
                                                   
                                                            <span class="text-truncate d-inline-block px-1" style="max-width:100%">@{{loaded_content_type.find(item=> item.id === selected_id)?.title}}، </span>
                                                       
                                                        </span>

                                                      </a>
                                                      <ul v-if="loaded_content_type" class="dropdown-menu px-3" style="max-width:130px;max-height: 200px;overflow: auto;">
                                                        <li 
                                                            v-for="loaded_item in loaded_content_type" 
                                                            :key="loaded_item.id"
                                                        >
                                                        <div class="col-12 p-0 row d-flex font-1 py-1" style="color:#000">
                                                            <div class="col-auto px-1" style="cursor:pointer;width: 25px;">
                                                                <input class="form-check-input" type="checkbox" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).content.selected_ids" :value="loaded_item.id" :id="selected_unique_id + 'select' + loaded_item.id " style="cursor: pointer;" @change="refresh_loaded_content()">
                                                                
                                                            </div>
                                                            <div class="col p-0 text-truncate" style="cursor:pointer;width:calc(100% - 25px)">
                                                                
                                                                <label class="form-check-label px-2 text-truncate" :for="selected_unique_id + 'select' + loaded_item.id " style="cursor:pointer;">
                                                                    <img :src="loaded_item.image" style="width:20px;max-height: 20px;">
                                                                @{{loaded_item.title}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                            
                                                            
                                                            

                                                            {{-- <input type="checkbox" name="" :value="loaded_item.id" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).content.selected_ids"> @{{loaded_item.title}} --}}
                                                           {{--  <a class="dropdown-item" href="#">Action</a> --}}
                                                        
                                                        </li>
                                                      </ul>
                                                    </div>

                                                 
                                                </div>
                                            </div>

                                            <div class="col-6 px-0 my-1">
                                                <div class="col-12 px-3 mb-2 font-1">
                                                    نوع العرض
                                                </div>
                                                <div class="col-12 px-2 mb-3">
                                                    <select v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).content.view_type" class="form-control" @change="refresh_loaded_content()">
                                                        <option value="standard">اعتيادي</option>
                                                        <option value="slider">متحرك</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 px-0 my-1">
                                                <div class="col-12 px-3 mb-2 font-1">
                                                    عدد العناصر
                                                </div>
                                                <div class="col-12 px-2 mb-3">
                                                    <input type="" name="" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).content.items_count" class="form-control" @change="refresh_loaded_content()">
                                                </div>
                                            </div>
                                            <div class="col px-0 my-1">
                                                <div class="col-12 px-3 mb-2 font-1">
                                                    تنقل بين الصفحات
                                                </div>
                                                <div class="col-12 px-2 mb-3">
                                                    <select v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).content.paginate" @change="refresh_loaded_content()" class="form-control">
                                                        <option value="true">نعم</option>
                                                        <option value="false">لا</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="('buttons' in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}) )" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                الأزرار
                                            </div>
                                            <div class="col-12 px-2 mb-3 accordion">
                                                <draggable :list="contents[selected_page].find(block => block.id === selected_unique_id).fields.buttons" item-key="id">
                                                    <template #item="{ element }">
                                                        <div class="accordion-item mb-1">
                                                            <h2 class="accordion-header">
                                                                <button class="accordion-button p-2 collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse_'+ element.id" :aria-controls="'#collapse_'+ element.id" style="font-size:13px" aria-expanded="false">
                                                                    <span class="fas fa-trash ms-2" v-on:click="contents[selected_page].find(block => block.id === selected_unique_id).fields.buttons = contents[selected_page].find(block => block.id === selected_unique_id).fields.buttons.filter(button => button.id !== element.id);" style="color:#f44336"></span>
                                                                    @{{element.fields.title}}
                                                                </button>
                                                            </h2>
                                                            <div :id="'collapse_'+ element.id" class="accordion-collapse collapse">
                                                                <div class="accordion-body px-2 py-3 row">
                                                                    <div class="col-6 px-0 my-1">
                                                                        <div class="col-12 px-3 mb-2 font-1">
                                                                            عنوان الزر
                                                                        </div>
                                                                        <div class="col-12 px-2 mb-3">
                                                                            <input class="form-control" type="" name="" v-model="element.fields.title" style="font-size:14px;border-radius: 2px;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6 px-0 my-1">
                                                                        <div class="col-12 px-3 mb-2 font-1">
                                                                            نوع فتح الرابط
                                                                        </div>
                                                                        <div class="col-12 px-2 mb-3">
                                                                            <select class="form-control" v-model="element.fields.url_open_type">
                                                                                <option value="">نفس الصفحة</option>
                                                                                <option value="_blank">صفحة أخرى</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6 px-0 my-1">
                                                                        <div class="col-12 px-3 mb-2 font-1">
                                                                            رابط الزر
                                                                        </div>
                                                                        <div class="col-12 px-2 mb-3">
                                                                            <input class="form-control" type="" name="" v-model="element.fields.url" style="font-size:14px;border-radius: 2px;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6 px-0 my-1">
                                                                        <div class="col-12 px-3 mb-2 font-1">
                                                                            شكل الزر
                                                                        </div>
                                                                        <div class="col-12 px-2 mb-3">
                                                                            <select class="form-control" v-model="element.fields.class">
                                                                                <option value="btn-success">رئيسي ناجح</option>
                                                                                <option value="btn-primary">رئيسي معلومة</option>
                                                                                <option value="btn-secondary">ثانوي</option>
                                                                                <option value="btn-light">خفيف</option>
                                                                                <option value="btn-outline-success">رئيسي ناجح خارجي</option>
                                                                                <option value="btn-outline-primary">رئيسي معلومة خارجي</option>
                                                                                <option value="btn-outline-secondary">ثانوي خارجي</option>
                                                                                <option value="btn-outline-light">خفيف خارجي</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </template>
                                                </draggable>
                                                <div class="col-12 p-0">
                                                    <span v-on:click="add_new_button(selected_unique_id,selected_type)" class="col-12 btn btn-outline-primary py-1 px-5"><span class="fas fa-plus ms-2"></span> أضف زر جديد</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="('features' in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}) )" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                الميزات
                                            </div>
                                            <div class="col-12 px-2 mb-3 accordion">
                                                <draggable :list="contents[selected_page].find(block => block.id === selected_unique_id).fields.features" item-key="id">
                                                    <template #item="{ element }">
                                                        <div class="col-12 p-0 ">
                                                            <div class="accordion-item mb-1">
                                                                <h2 class="accordion-header">
                                                                    <button class="accordion-button p-2 collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse_'+ element.id" :aria-controls="'#collapse_'+ element.id" style="font-size:13px" aria-expanded="false">
                                                                        <span class="fas fa-trash ms-2" v-on:click="contents[selected_page].find(block => block.id === selected_unique_id).fields.features = contents[selected_page].find(block => block.id === selected_unique_id).fields.features.filter(feature => feature.id !== element.id);" style="color:#f44336"></span>
                                                                        @{{element.fields.title}}
                                                                    </button>
                                                                </h2>
                                                                <div :id="'collapse_'+ element.id" class="accordion-collapse collapse">
                                                                    <div class="accordion-body px-2 py-3 row">
                                                                        <div class="col-12 px-0 my-1">
                                                                            <div class="col-12 px-3 mb-2 font-1">
                                                                                العنوان
                                                                            </div>
                                                                            <div class="col-12 px-2 mb-3">
                                                                                <input class="form-control" type="" name="" v-model="element.fields.title" style="font-size:14px;border-radius: 2px;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 px-0 my-1">
                                                                            <div class="col-12 px-3 mb-2 font-1">
                                                                                الصورة
                                                                            </div>
                                                                            <div class="col-12 px-2 mb-3">
                                                                                <div v-if="element.fields?.image_url == null" class="col-12 p-0 row d-flex align-items-center">
                                                                                    <div style="width: 100px;padding: 0px;position: relative;height: 50px;overflow: hidden;background: #f1f1f1;cursor: pointer;" class="d-flex align-items-center justify-content-center">
                                                                                        <span style="font-size:13px"> <span class="fal fa-upload"></span> ارفع أو</span>
                                                                                        <input type="file" style="width:100%;opacity: 0;height: 100%;position: absolute;right: 0px;top: 0px;" @change="upload_image" :data-input="JSON.stringify(['contents',selected_page,contents[selected_page]?.findIndex(block => block.id === selected_unique_id),'fields','features',contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields?.features.findIndex(obj => obj.id === element.id),'fields','image_url'])">
                                                                                    </div>
                                                                                    <div style="width: calc(100% - 100px);padding: 0px;">
                                                                                        <input class="form-control preview-url" type="" name="" v-model="element.fields.image_url" style="font-size:14px;border-radius: 2px;" placeholder="ألصق الرابط هنا">
                                                                                    </div>
                                                                                </div>
                                                                                <div v-if="element.fields.image_url != null" class="col-12 p-2" style="border:1px solid #f1f1f1">
                                                                                    <div class="col-12 p-0 mb-3">
                                                                                        <div style="width:100%;position: relative;">
                                                                                            <span class="fal fa-times" style="width: 25px;height: 25px;display: flex;align-items: center;justify-content: center;position: absolute;left: 10px;color: white;top: 10px;border-radius: 50%;background: rgb(255 0 0 / 55%);cursor: pointer;font-size: 12px;" v-on:click="element.fields.image_url = null;"></span>
                                                                                            <img :src="element.fields.image_url" style="width: 100%;border-radius: 10px;">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 px-0 my-1">
                                                                            <div class="col-12 px-3 mb-2 font-1">
                                                                                المحتوى
                                                                            </div>
                                                                            <div class="col-12 px-2 mb-3">
                                                                                <textarea class="form-control" v-model="element.fields.content" style="border-radius: 2px;min-height: 150px;"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 px-0 my-1">
                                                                            <div class="col-12 px-3 mb-2 font-1">
                                                                                الرابط
                                                                            </div>
                                                                            <div class="col-12 px-2 mb-3">
                                                                                <input class="form-control" type="" name="" v-model="element.fields.url" style="font-size:14px;border-radius: 2px;direction: ltr;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 px-0 my-1">
                                                                            <div class="col-12 px-3 mb-2 font-1">
                                                                                نوع فتح الرابط
                                                                            </div>
                                                                            <div class="col-12 px-2 mb-3">
                                                                                <select class="form-control" v-model="element.fields.url_open_type">
                                                                                    <option value="">نفس الصفحة</option>
                                                                                    <option value="_blank">صفحة أخرى</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </template>
                                                </draggable>
                                                <div class="col-12 p-0">
                                                    <span v-on:click="add_new_feature(selected_unique_id,selected_type)" class="col-12 btn btn-outline-primary py-1 px-5"><span class="fas fa-plus ms-2"></span> أضف ميزة جديدة</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="('faqs' in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}) )" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                الأسئلة
                                            </div>
                                            <div class="col-12 px-2 mb-3 accordion">
                                                <draggable :list="contents[selected_page].find(block => block.id === selected_unique_id).fields.faqs" item-key="id">
                                                    <template #item="{ element }">
                                                        <div class="accordion-item mb-1">
                                                            <h2 class="accordion-header">
                                                                <button class="accordion-button p-2 collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse_'+ element.id" :aria-controls="'#collapse_'+ element.id" style="font-size:13px" aria-expanded="false">
                                                                    <span class="fas fa-trash ms-2" v-on:click="contents[selected_page].find(block => block.id === selected_unique_id).fields.faqs = contents[selected_page].find(block => block.id === selected_unique_id).fields.faqs.filter(button => button.id !== element.id);" style="color:#f44336"></span>
                                                                    @{{element.fields.title}}
                                                                </button>
                                                            </h2>
                                                            <div :id="'collapse_'+ element.id" class="accordion-collapse collapse">
                                                                <div class="accordion-body px-2 py-3 row">
                                                                    <div class="col-12 px-0 my-1">
                                                                        <div class="col-12 px-3 mb-2 font-1">
                                                                            العنوان
                                                                        </div>
                                                                        <div class="col-12 px-2 mb-3">
                                                                            <input class="form-control" type="" name="" v-model="element.fields.title" style="font-size:14px;border-radius: 2px;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 px-0 my-1">
                                                                        <div class="col-12 px-3 mb-2 font-1">
                                                                            المحتوى
                                                                        </div>
                                                                        <div class="col-12 px-2 mb-3">
                                                                            <textarea class="form-control" v-model="element.fields.content" style="min-height: 150px;"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </template>
                                                </draggable>
                                                <div class="col-12 p-0">
                                                    <span v-on:click="add_new_faq(selected_unique_id,selected_type)" class="col-12 btn btn-outline-primary py-1 px-5"><span class="fas fa-plus ms-2"></span> أضف جديد</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="('content_html' in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}) )" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                كود html,css,js مخصص
                                            </div>
                                            <div class="col-12 px-2 mb-3">
                                                <textarea class="form-control code-highlight" style="min-height: 200px;direction: ltr;background: #002b36!important;color:#fff!important" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).content_html"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div :class="{'show active': current_edit_tab === 'design'}" class="tab-pane fade" id="nav-design" role="tabpanel" aria-labelledby="design-tab">
                                        <div v-if="('design_columns' in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}) )" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                حدد العرض
                                            </div>
                                            <div class="col-12 px-2 mb-3 row d-flex justify-content-between ">
                                                <span v-for="(column,column_index) in design_columns" :key="column_index" class="d-flex align-items-center justify-content-center m-1" style="width: 40px;height:40px;padding: 2px;cursor: pointer;position: relative;" :style="column_index == (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_columns ? { 'border-bottom': '5px solid #03a9f4' } : {'border-bottom': '5px solid transparent'}">
                                                    <span :class="column" class="font-4"></span>
                                                    <input type="radio" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_columns" :value="column_index" style="width: 100%;height: 100%;position: absolute;" @change="refresh_loaded_content()">
                                                </span>
                                            </div>
                                        </div>
                                        <div v-if="('design_background_url' in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}) )" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                صورة الخلفية
                                            </div>
                                            <div class="col-12 px-2 mb-3 row d-flex align-items-center ">
                                                <div class="col-12 p-0">
                                                    <div v-if="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_background_url == null" class="col-12 p-0 row d-flex align-items-center">
                                                        <div style="width: 100px;padding: 0px;position: relative;height: 50px;overflow: hidden;background: #f1f1f1;cursor: pointer;" class="d-flex align-items-center justify-content-center">
                                                            <span style="font-size:13px"> <span class="fal fa-upload"></span> ارفع أو</span>
                                                            <input type="file" style="width:100%;opacity: 0;height: 100%;position: absolute;right: 0px;top: 0px;" @change="upload_image" :data-input="JSON.stringify(['contents',selected_page,contents[selected_page]?.findIndex(block => block.id === selected_unique_id),'fields','design_background_url'])">
                                                        </div>
                                                        <div style="width: calc(100% - 100px);padding: 0px;">
                                                            <input class="form-control preview-url" type="" name="" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_background_url" style="font-size:14px;border-radius: 2px;" placeholder="ألصق الرابط هنا">
                                                        </div>
                                                    </div>
                                                    <div v-if="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_background_url != null" class="col-12 p-2" style="border:1px solid #f1f1f1">
                                                        <div class="col-12 p-0 mb-3">
                                                            <div style="width:100%;position: relative;">
                                                                <span class="fal fa-times" style="width: 25px;height: 25px;display: flex;align-items: center;justify-content: center;position: absolute;left: 10px;color: white;top: 10px;border-radius: 50%;background: rgb(255 0 0 / 55%);cursor: pointer;font-size: 12px;" v-on:click="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_background_url = null;(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_background_opacity = 100;(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_background_blur = 0;(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_background_grayscale = 0;(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_background_black = 0"></span>
                                                                <img :src="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_background_url" style="width: 100%;border-radius: 10px;">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 px-0 py-1">
                                                            <div class="col-12 py-0 px-0" style="font-size:13px">الشفافية</div>
                                                            <input type="range" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_background_opacity" class="form-range col-12 p-0" min="0.01" step="0.01" max="1" style="background: rgb(205 205 205);border-radius: 20px;height: 7px;cursor: pointer;border: 2px solid rgb(159 19159);">
                                                        </div>
                                                        <div class="col-12 px-0 py-1">
                                                            <div class="col-12 py-0 px-0" style="font-size:13px">التغبيش</div>
                                                            <input type="range" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_background_blur" class="form-range col-12 p-0" min="0" max="100" style="background: rgb(205 205 205);border-radius: 20px;height: 7px;cursor: pointer;border: 2px solid rgb(159 159 159);">
                                                        </div>
                                                        <div class="col-12 px-0 py-1">
                                                            <div class="col-12 py-0 px-0" style="font-size:13px">تدرج اللون الرمادي</div>
                                                            <input type="range" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_background_grayscale" class="form-range col-12 p-0" min="0" max="100" style="background: rgb(205 205 205);border-radius: 20px;height: 7px;cursor: pointer;border: 2px solid rgb(159 159 159);">
                                                        </div>
                                                        <div class="col-12 px-0 py-1">
                                                            <div class="col-12 py-0 px-0" style="font-size:13px">تعتيم</div>
                                                            <input type="range" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_background_black" class="form-range col-12 p-0" min="0.01" max="1" step="0.01" style="background: rgb(205 205 205);border-radius: 20px;height: 7px;cursor: pointer;border: 2px solid rgb(159 159 159);">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="('design_text_color' in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}) )" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                لون النص
                                            </div>
                                            <div class="col-12 px-2 mb-3 row">
                                                <span v-for="color in colors" v-bind:style="{ background: color }" :key="color" class="d-flex m-1" style="width: 25px;height:25px;padding: 2px;border-radius: 50%;cursor: pointer;overflow: hidden;">
                                                    <input type="radio" name="design_text_color" v-bind:value="color" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_text_color" style="width:100%;cursor: pointer;height: 100%;border-radius: inherit;opacity: 0;">
                                                </span>
                                                <span v-bind:style="{ border: '2px solid ' + (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_text_color }" class="d-flex align-items-center justify-content-between m-1" style="width: 25px;height:25px;padding: 2px;border-radius: 50%;cursor: pointer;overflow: hidden;position: relative;">
                                                    <span class="far fa-paint-brush-alt" style="font-size:12px;margin:auto;"></span>
                                                    <input type="color" name="design_text_color" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_text_color" style="width:100%;cursor: pointer;height: 100%;border-radius: inherit;position: absolute;opacity: 0;">
                                                </span>
                                            </div>
                                        </div>
                                        <div v-if="('design_background_color' in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}) )" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                لون الخلفية
                                            </div>
                                            <div class="col-12 px-2 mb-3 row">
                                                <span v-for="color in colors" v-bind:style="{ background: color }" :key="color" class="d-flex m-1" style="width: 25px;height:25px;padding: 2px;border-radius: 50%;cursor: pointer;overflow: hidden;">
                                                    <input type="radio" name="design_background_color" v-bind:value="color" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_background_color" style="width:100%;cursor: pointer;height: 100%;border-radius: inherit;opacity: 0;">
                                                </span>
                                                <span v-bind:style="{ border: '2px solid ' + (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_background_color }" class="d-flex align-items-center justify-content-between m-1" style="width: 25px;height:25px;padding: 2px;border-radius: 50%;cursor: pointer;overflow: hidden;position: relative;">
                                                    <span class="far fa-paint-brush-alt" style="font-size:12px;margin:auto;"></span>
                                                    <input type="color" name="design_background_color" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_background_color" style="width:100%;cursor: pointer;height: 100%;border-radius: inherit;position: absolute;opacity: 0;">
                                                </span>
                                            </div>
                                        </div>
                                        <div v-if="('design_text_alignment' in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}) )" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                محاذاة النصوص
                                            </div>
                                            <div class="col-12 px-2 mb-3 row d-flex justify-content-between ">
                                                <span v-for="(alignment,alignment_index) in text_alignments" :key="alignment_index" class="d-flex align-items-center justify-content-center m-1" style="width: 40px;height:40px;padding: 2px;cursor: pointer;position: relative;" :style="alignment_index == (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_text_alignment ? { 'border-bottom': '5px solid #03a9f4' } : {'border-bottom': '5px solid transparent'}">
                                                    <span :class="alignment" class="font-4"></span>
                                                    <input type="radio" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_text_alignment" :value="alignment_index" style="width: 100%;height: 100%;position: absolute;">
                                                </span>
                                            </div>
                                        </div>
                                        <div v-if="('design_content_alignment' in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}) )" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                ترتيب القطع
                                            </div>
                                            <div class="col-12 px-2 mb-3 row d-flex justify-content-between ">
                                                <span v-for="(alignment,alignment_index) in content_alignments" :key="alignment_index" class="d-flex align-items-center justify-content-center m-1" style="width: 40px;height:40px;padding: 2px;cursor: pointer;position: relative;" :style="alignment_index == (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_content_alignment ? { 'border-bottom': '5px solid #03a9f4' } : {'border-bottom': '5px solid transparent'}">
                                                    <span :class="alignment" class="font-4"></span>
                                                    <input type="radio" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_content_alignment" :value="alignment_index" style="width: 100%;height: 100%;position: absolute;">
                                                </span>
                                            </div>
                                        </div>
                                        <div v-if="('design_min_height' in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}) )" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                ارتفاع القسم
                                            </div>
                                            <div class="col-12 px-2 mb-3 row d-flex justify-content-between ">
                                                <input type="range" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_min_height" class="form-range col-12 p-0" min="0" max="100" style="background: rgb(205 205 205);border-radius: 20px;height: 7px;cursor: pointer;border: 2px solid rgb(159 159 159);">
                                            </div>
                                        </div>
                                        <div v-if="('design_custom_code' in (contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}) )" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                كود html,css,js مخصص
                                            </div>
                                            <div class="col-12 px-2 mb-3">
                                                <textarea class="form-control code-highlight" style="min-height: 200px;direction: ltr;background: #002b36!important;color:#fff!important" v-model="(contents[selected_page]?.find(block => block.id === selected_unique_id)?.fields || {}).design_custom_code"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col p-0 " style="width:calc(100% - 360px);" id="site-main-container">
                        <div style="background: #fff;height:calc(100dvh - 73px);overflow: auto;" class="p-2 col-12">
                            <div class=" p-0 " id="response-contaienr">
                                <draggable :list="contents[selected_page]" item-key="id">
                                    <template #item="{ element }">
                                        <div style="position:relative;transition: 0.3s all ease-in-out;" class="content-block" :class="'block_' + element.fields.id" :id="'block_' + element.fields.id" :ref="'block_' + element.fields.id">
                                            <div style="width: 100%;height: 100%;position: absolute;top: 0px;right: 0px;display: none;z-index: 1000;" class="show-on-hover" v-on:click="change_selected_component(element.id,element.fields.block_type)">
                                                <div style="width:100%;height:100%;position: absolute;top: 0px;right: 0px;background: #000;opacity: 0.08;cursor: pointer;z-index: 900;"></div>
                                                {{-- <span class="fas fa-plus append-plus-start" style="z-index:1000;cursor: pointer;" v-on:click="alerter(element.id +  'before');"></span>
                                                <span class="fas fa-plus append-plus-end" style="z-index:1000;cursor: pointer;" v-on:click="alerter(element.id + 'after');"></span> --}}
                                            </div>
                                            <div class='position-relative  border-0 hoverable-elements-builder appened-element' :style="{'color': element.fields.design_text_color}">
                                                <div style="width: 100%;height: 100%;position: absolute;top: 0px;right: 0px;z-index: 0;background-size:cover;background-repeat:no-repeat;background-position:center" :style="{'background-color': element.fields.design_background_color,'background-image': element.fields.design_background_url?'url('+element.fields.design_background_url+')' :'none','opacity': element.fields.design_background_opacity,'filter':'blur('+ element.fields.design_background_blur +'px)  grayscale('+ element.fields.design_background_grayscale +'%)'
                                                        }"></div>
                                                <div style="width: 100%;height: 100%;position: absolute;top: 0px;right: 0px;z-index: 0;background:cover;background: #000;" :style="{'opacity': element.fields.design_background_black}"></div>
                                                <div class='main-content-of-block py-3 py-lg-9 d-flex align-items-center justify-content-center ' style="z-index: 2;position: relative;" :style="{ 'min-height' : element.fields.design_min_height + 'dvh' }">
                                                    <div v-if="element.fields.block_type=='component_cta'" class="container p-3">
                                                        <div :class="element.fields.design_text_alignment" class='col-12 mx-auto '>
                                                            <h2 :class="element.fields.design_text_alignment" class='font-3 font-lg-4 mb-lg-3 mb-1 content_title' style="color:inherit;">@{{element.fields.content_title}}</h2>
                                                            <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 content_sub_title' style="opacity: 0.9">@{{element.fields.content_sub_title}}</p>
                                                            <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 content_description' style="white-space: pre-line;opacity: 0.9">@{{element.fields.content_description}}</p>
                                                            <div class="col-12 px-2 d-flex btns-group" :class="element.fields.design_text_alignment">
                                                                <div v-for="button in element.fields['buttons']">
                                                                    <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5" :class="button.fields.class" :target="button.fields.url_open_type" style="border-radius: 3px;">
                                                                        @{{button.fields.title}}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-html="element.fields.design_custom_code"></div>
                                                    </div>
                                                    <div v-if="element.fields.block_type=='component_banner'" class="container p-3">
                                                        <div :class="element.fields.design_text_alignment" class='col-12 mx-auto '>
                                                            <h2 :class="element.fields.design_text_alignment" class='font-3 font-lg-4 mb-lg-3 mb-1 content_title' style="color:inherit;">@{{element.fields.content_title}}</h2>
                                                            <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 design_text_alignment' style="opacity: 0.9">@{{element.fields.content_sub_title}}</p>
                                                            <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 content_description' style="white-space: pre-line;opacity: 0.9">@{{element.fields.content_description}}</p>
                                                            <div class="col-12 px-2 d-flex btns-group" :class="element.fields.design_text_alignment">
                                                                <div v-for="button in element.fields['buttons']">
                                                                    <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5" :class="button.fields.class" :target="button.fields.url_open_type" style="border-radius: 3px;">
                                                                        @{{button.fields.title}}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-html="element.fields.design_custom_code"></div>
                                                    </div>
                                                    <div v-if="element.fields.block_type=='component_text'" class="container p-3">
                                                        <div :class="element.fields.design_text_alignment" class='col-12 mx-auto '>
                                                            <h2 :class="element.fields.design_text_alignment" class='font-3 font-lg-4 mb-lg-3 mb-1 content_title' style="color:inherit;">@{{element.fields.content_title}}</h2>
                                                            <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 content_sub_title' style="opacity: 0.9">@{{element.fields.content_sub_title}}</p>
                                                            <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 content_description' style="white-space: pre-line;opacity: 0.9">@{{element.fields.content_description}}</p>
                                                            <div class="col-12 px-2 d-flex btns-group" :class="element.fields.design_text_alignment">
                                                                <div v-for="button in element.fields['buttons']">
                                                                    <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5" :class="button.fields.class" :target="button.fields.url_open_type" style="border-radius: 3px;">
                                                                        @{{button.fields.title}}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-html="element.fields.design_custom_code"></div>
                                                    </div>
                                                    <div v-if="element.fields.block_type=='component_text_with_image'" class="container p-3">
                                                        <div :class="[element.fields.design_text_alignment,element.fields.design_content_alignment]" class=' mx-auto row '>
                                                            <div class="col-12 col-lg-6 mx-auto text-center">
                                                                <img :src="element.fields.content_image_url" style="max-width:100%;border-radius: 8px;">
                                                            </div>
                                                            <div class="col-12 col-lg-6 d-flex align-items-center row mx-auto">
                                                                <div class="col-12 px-0 py-3 row ">
                                                                    <h2 :class="element.fields.design_text_alignment" class='font-3 font-lg-4 mb-lg-3 mb-1 content_title' style="color:inherit;">@{{element.fields.content_title}}</h2>
                                                                    <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 content_sub_title' style="opacity: 0.9">@{{element.fields.content_sub_title}}</p>
                                                                    <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 content_description' style="white-space: pre-line;opacity: 0.9">@{{element.fields.content_description}}</p>
                                                                    <div class="col-12 px-2 d-flex btns-group" :class="element.fields.design_text_alignment">
                                                                        <div v-for="button in element.fields['buttons']">
                                                                            <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5" :class="button.fields.class" :target="button.fields.url_open_type" style="border-radius: 3px;">
                                                                                @{{button.fields.title}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-html="element.fields.design_custom_code"></div>
                                                    </div>
                                                    <div v-if="element.fields.block_type=='component_text_with_video'" class="container p-3">
                                                        <div :class="[element.fields.design_text_alignment,element.fields.design_content_alignment]" class=' mx-auto row '>
                                                            <div class="col-12 col-lg-6 mx-auto content_video_url">
                                                                <iframe :src="convert_to_embed(element.fields.content_video_url)" style="width:100%;height: 100%;border-radius: 10px;"></iframe>
                                                            </div>
                                                            <div class="col-12 col-lg-6 d-flex align-items-center row mx-auto">
                                                                <div class="col-12 px-0 py-3 row ">
                                                                    <h2 :class="element.fields.design_text_alignment" class='font-3 font-lg-4 mb-lg-3 mb-1 content_title' style="color:inherit;">@{{element.fields.content_title}}</h2>
                                                                    <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 content_sub_title' style="opacity: 0.9">@{{element.fields.content_sub_title}}</p>
                                                                    <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 content_description' style="white-space: pre-line;opacity: 0.9">@{{element.fields.content_description}}</p>
                                                                    <div class="col-12 px-2 d-flex btns-group" :class="element.fields.design_text_alignment">
                                                                        <div v-for="button in element.fields['buttons']">
                                                                            <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5" :class="button.fields.class" :target="button.fields.url_open_type" style="border-radius: 3px;">
                                                                                @{{button.fields.title}}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-html="element.fields.design_custom_code"></div>
                                                    </div>
                                                    <div v-if="element.fields.block_type=='component_features'" class="container p-3">
                                                        <div :class="[element.fields.design_text_alignment,element.fields.design_content_alignment]" class=''>
                                                            <h2 :class="element.fields.design_text_alignment" class='font-3 font-lg-4 mb-lg-3 mb-1 content_title' style="color:inherit;">@{{element.fields.content_title}}</h2>
                                                            <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 content_description' style="opacity: 0.9;white-space: pre;">@{{element.fields.content_description}}</p>
                                                            <div class="col-12 px-0 py-5 d-flex features-group row" :class="[element.fields.design_text_alignment,element.fields.design_content_alignment]">
                                                                <div v-for="feature in element.fields['features']" :class="'col-12 col-md-6 col-lg-' + 12/element.fields.design_columns" class="p-3 mx-auto my-3">
                                                                    <div class="col-12 mb-1 px-2 text-center">
                                                                        <img :src="feature.fields.image_url" style="width:100px">
                                                                    </div>
                                                                    <div class="col-12 mb-1 px-2 text-center">
                                                                        @{{feature.fields.title}}
                                                                    </div>
                                                                    <div class="col-12 px-2 text-center" style="font-size:13px;opacity:0.9;white-space: pre-line;">@{{feature.fields.content}}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-html="element.fields.design_custom_code"></div>
                                                    </div>
                                                    <div v-if="element.fields.block_type=='component_faqs'" class="container p-3">
                                                        <div :class="element.fields.design_text_alignment" class=''>
                                                            <h2 :class="element.fields.design_text_alignment" class='font-3 font-lg-4 mb-lg-3 mb-1 content_title' style="color:inherit;">@{{element.fields.content_title}}</h2>
                                                            <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 content_sub_title' style="opacity: 0.9;white-space:pre-line;">@{{element.fields.content_sub_title}}</p>
                                                            <div class="col-12 px-0 py-5 d-flex faqs-group row" :class="element.fields.design_text_alignment">
                                                                <div class="col-12 px-2 mb-3 accordion">
                                                                    <div v-for="faq,index in element.fields['faqs']" :class="element.fields.design_columns" class="p-1">
                                                                        <div class="accordion-item mb-1" style="border:1px solid #e7e7ec!important;background: transparent;box-shadow: 0 .5rem .937rem #8c98a41a!important;">
                                                                            <h2 class="accordion-header">
                                                                                <button class="accordion-button font-2 font-lg-3" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse_'+ faq.id" :aria-controls="'#collapse_'+ faq.id" style="background-color:transparent;padding: 20px;font-weight: bold;text-align: start;" :style="{color: element.fields.design_text_color}">
                                                                                    @{{faq.fields.title}}
                                                                                </button>
                                                                            </h2>
                                                                            <div :id="'collapse_'+ faq.id" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="border-top:1px solid #e7e7ec!important;background-color: transparent;">
                                                                                <div class="accordion-body p-3 row">
                                                                                    <div class="col-12 px-2 font-1 font-lg-2" style="opacity:0.9" :style="{color: element.fields.design_text_color}">
                                                                                        @{{faq.fields.content}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-html="element.fields.design_custom_code"></div>
                                                    </div>
                                                    <div v-if="element.fields.block_type=='component_html'" class="container p-3">
                                                        <h2 :class="element.fields.design_text_alignment" class='font-3 font-lg-4 mb-lg-3 mb-1 content_title' style="color:inherit;">@{{element.fields.content_title}}</h2>
                                                        <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 content_sub_title' style="opacity: 0.9">@{{element.fields.content_sub_title}}</p>
                                                        <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 content_description' style="white-space: pre-line;opacity: 0.9">@{{element.fields.content_description}}</p>
                                                        <div v-html="element.fields.design_custom_code"></div>
                                                        <div v-html="element.fields.content_html"></div>
                                                    </div>
                                                    <div v-if="element.fields.block_type=='component_contact'" class="container p-3">
                                                        <div :class="[element.fields.design_text_alignment,element.fields.design_content_alignment]" class='row'>
                                                            <h2 :class="element.fields.design_text_alignment" class='font-3 font-lg-4 mb-lg-3 mb-1 content_title' style="color:inherit;">@{{element.fields.content_title}}</h2>
                                                            <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 content_sub_title' style="opacity: 0.9;white-space:pre-line;">@{{element.fields.content_sub_title}}</p>
                                                            <div class="col-12 col-lg-8 py-5 px-1">
                                                                @include("components.contact")
                                                            </div>
                                                        </div>
                                                        <div v-html="element.fields.design_custom_code"></div>
                                                    </div>
                                                    <div v-if="element.fields.block_type=='component_slider'" class="container p-3">
                                                        <div :class="[element.fields.design_text_alignment,element.fields.design_content_alignment]" class='row'>
                                                            <h2 :class="element.fields.design_text_alignment" class='font-3 font-lg-4 mb-lg-3 mb-1 content_title' style="color:inherit;">@{{element.fields.content_title}}</h2>
                                                            <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 content_sub_title' style="opacity: 0.9;white-space:pre-line;">@{{element.fields.content_sub_title}}</p>
                                                            <div class="col-12 col-lg-12 px-1">
                                                                <div class="col-12 px-0  d-flex features-group row" :class="[element.fields.design_text_alignment,element.fields.design_content_alignment]" style="flex-wrap: nowrap;overflow: hidden;">
                                                                    <div v-for="feature in element.fields['features']" :class="'col-12 col-md-6 col-lg-' + 12/element.fields.design_columns" class="p-3">
                                                                        <div class="col-12 mb-1 px-0 text-center d-flex align-items-center justify-content-center row" :style="{'background-image': 'url(' + feature.fields.image_url + ')' , 'max-height':  element.fields.design_min_height + 'dvh' }" style="background-repeat: no-repeat;background-position: center;background-size: cover;border-radius: 8px;position: relative;">
                                                                            <div style="position: absolute;top: 0px;bottom: 0px;width: 100%;right: 0px;left: 0px;background: rgb(0 0 0 / 10%);" class="d-flex align-items-center justify-content-center row">
                                                                                <div class="col-12 p-3">
                                                                                    <div class="font-3 font-lg-4 col-12 p-1 text-center" style="color:#fff">@{{feature.fields.title}}</div>
                                                                                    <div class="col-12 p-1 text-center" style="color:#fff">@{{feature.fields.content}}</div>
                                                                                </div>
                                                                            </div>
                                                                            <img :src="feature.fields.image_url" style="width:100%;border-radius: 10px;opacity: 0;" class="p-0">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 px-2 d-flex btns-group" :class="element.fields.design_text_alignment">
                                                                    <div v-for="button in element.fields['buttons']">
                                                                        <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5" :class="button.fields.class" :target="button.fields.url_open_type" style="border-radius: 3px;">
                                                                            @{{button.fields.title}}
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-html="element.fields.design_custom_code"></div>
                                                    </div>
                                                    <div v-if="element.fields.block_type=='component_content'" class="container p-3">
                                                        <div :class="[element.fields.design_text_alignment,element.fields.design_content_alignment]" class='row'>
                                                            <h2 :class="element.fields.design_text_alignment" class='font-3 font-lg-4 mb-lg-3 mb-1 content_title' style="color:inherit;">@{{element.fields.content_title}}</h2>
                                                            <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 content_sub_title' style="opacity: 0.9;white-space:pre-line;">@{{element.fields.content_sub_title}}</p>
                                                            <p :class="element.fields.design_text_alignment" class=' mb-3 mb-lg-5  font-1 font-lg-2 content_description' style="white-space: pre-line;opacity: 0.9">@{{element.fields.content_description}}</p>
                                                            <div class="col-12 col-lg-12 py-5 px-1">
                                                                <div v-html="element.fields.content.rendered_html"></div>
                                                            </div>
                                                            <div class="col-12 px-2 d-flex btns-group" :class="element.fields.design_text_alignment">
                                                                <div v-for="button in element.fields['buttons']">
                                                                    <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5" :class="button.fields.class" :target="button.fields.url_open_type" style="border-radius: 3px;">
                                                                        @{{button.fields.title}}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-html="element.fields.design_custom_code"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </draggable>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts') 


<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuedraggable@4.1.0/dist/vuedraggable.umd.min.js"></script>
<script type="module">
    const { createApp, ref, onMounted } = Vue;
    const app =     createApp({
    data(){
        return {
            current_edit_tab:"contet",
            component_append_selector:"response-contaienr",
            component_append_type:"after",
            contents: @if($page->content != null ){'{{$page->slug}}': {!!$page->content!!} } @else [] @endif,
            selected_page:'{{$page->slug}}',
            selected_type:null,
            selected_unique_id:null,
            selected_edit_wedgit:"",
         
            colors:[
                '#202020',
                '#555555',
                '#ffffff',
                '#cee4ff',
                '#ffe9ce',
                '#03a9f4',
                '#ff9800',
            ], 
            text_alignments:{
                'text-end justify-content-start':"fal fa-align-right",
                'text-center justify-content-center':"fal fa-align-center",
                'text-start justify-content-end':"fal fa-align-left",
            },
            content_alignments:{
                'flex-row':"fal fa-indent",
                'flex-row-reverse':"fal fa-outdent",
                'flex-column':"fal fa-sort-size-up",
                'flex-column-reverse':"fal fa-sort-size-down"
                
            },
            design_columns:{
                "1":'far fa-dice-one',
                "2":'far fa-dice-two',
                "3":'far fa-dice-three',
                "4":'far fa-dice-four',
                "6":'far fa-dice-six',
            },

            loaded_content_type:null,
        }
    },
    computed: {
        reload_loaded_content_type() {
          return this.contents[this.selected_page]?.find(
            (block) => block.id === this.selected_unique_id
          )?.fields?.content?.type;
        },
      },
      watch: {
        reload_loaded_content_type(new_value, old_value) {
          if (new_value !== undefined) {

                const formData = new FormData();
                formData.append("type", new_value);
                formData.append("_token", "{{csrf_token()}}");

                fetch('{{route('admin.data.index')}}', {
                    method: 'post',
                    body: formData,
                }).then((response) => {
                    return response.json();
                }).then((data) => {

                    if(data.loaded == null || Object.keys(data.content).length === 0)
                        this.loaded_content_type = null
                    else
                        this.loaded_content_type = data.content ;
                });


                this.refresh_loaded_content();

            }
        }
    },
    components: {
      draggable: window.vuedraggable
    },
    methods:{
        refresh_loaded_content(){
            var content = this.contents[this.selected_page]?.find(
                (block) => block.id === this.selected_unique_id
              )?.fields?.content;
            if(content != null){
                const formData = new FormData();
                formData.append("type", content.type);
                formData.append("selected_ids", [content.selected_ids]);
                formData.append("items_count", content.items_count);
                formData.append("view_type", content.view_type);
                formData.append("paginate", content.paginate);
                formData.append("design_columns", this.contents[this.selected_page]?.find((block) => block.id === this.selected_unique_id)?.fields?.design_columns);
                formData.append("id", this.contents[this.selected_page]?.find((block) => block.id === this.selected_unique_id)?.fields?.id);
                formData.append("design_text_alignment", this.contents[this.selected_page]?.find((block) => block.id === this.selected_unique_id)?.fields?.design_text_alignment);
                formData.append("design_min_height", this.contents[this.selected_page]?.find((block) => block.id === this.selected_unique_id)?.fields?.design_min_height);
                formData.append("_token", "{{csrf_token()}}");

                fetch('{{route('admin.data.load')}}', {
                    method: 'post',
                    body: formData,
                }).then((response) => {
                    return response.json();
                }).then((data) => {
                    this.contents[this.selected_page].find(
                        (block) => block.id === this.selected_unique_id
                      ).fields.content.rendered_html = data.html;
                });
            }

        },
        template_editor:function(unique_id,type,options={}){
            this.highlight_block('block_'+unique_id);
            this.change_selected_component(unique_id,type);
        },
        generate_id(){
            return Math.random().toString(16).slice(2);
        },
        template_generator: function(type,options={}){
            console.log(this.contents);
         

            var unique_id=Math.random().toString(16).slice(2);
            //console.log(unique_id);

         
            if (!this.contents[this.selected_page]) 
                this.contents[this.selected_page] = [];
            //if (!this.contents[this.selected_page][unique_id]) 
            //    this.contents[this.selected_page][unique_id] = {};

            this.selected_page=this.selected_page;
            this.selected_unique_id=unique_id;
            this.selected_type=type;
            

            var options = {...{
                "id":this.selected_unique_id,
                "block_type":type,
                "design_text_color":"inherit",
                "design_background_color":"",
                "design_background_url":null,
                "design_background_opacity":1,
                "design_background_blur":0,
                "design_background_grayscale":0,
                "design_background_black":0,
                "design_text_alignment":"text-end justify-content-start",
                "design_custom_code":"<style>\n#block_"+this.selected_unique_id+" {\n\n}\n</style>\n",
                "design_min_height":50,

            },...options};

            if(type == "component_banner"){
                var options = {...options,...{
                    "content_title":"استمتع بأفضل خدمة تعليم عن بعد",
                    "content_sub_title":"",
                    "content_description":"منصة تعليمية تفاعلية تجمع بين التعلم المخصص والتفاعل المستمر لتمكينك من تحقيق أهدافك",
                    "design_background_url":"{{env('APP_URL')}}/images/components/demo/image.jpg",
                    "design_background_black":"0.50",
                    "design_min_height":"50",
                    "design_text_color":"#ffffff",
                    "design_text_alignment":"text-end justify-content-start",
                }};

                var object = { 'id' : this.selected_unique_id, 'fields': [] };
                object.fields = options;
                object.fields['buttons']=[];
                object.fields['buttons'].push(
                    {
                        'id': this.generate_id(),
                        'fields':{
                            "type":"custom",
                            "title":"ابدأ الآن",
                            "class":"btn-outline-light",
                            "url":"#",
                            "url_open_type":""
                        }
                    }
                );
                this.contents[this.selected_page].push(object);
                this.template_editor(unique_id,type);
                /*this.contents[this.selected_page][unique_id]['buttons']=[];
                this.contents[this.selected_page][unique_id]['buttons'];
                this.template_editor(unique_id,type);*/

            }else if(type == "component_text"){
                var options = {...options,...{
                    "content_title":"تجربة رائعة ستحبها",
                    "content_sub_title":"",
                    "content_description":"تساعد تقاريرنا المتقدمة المدرسين على فهم تقدم الطلاب بشكل دقيق من خلال تحليلات الأداء الذكية. تُمكّن هذه الميزة من تتبع الأنشطة الفردية لكل طالب، مثل الدرجات، مستوى التفاعل، واكتمال المهام. كما توفر رؤى فورية حول مدى تقدم كل مجموعة من الطلاب، مما يسمح للمدرسين باتخاذ قرارات مدروسة لتحسين جودة التعليم، سواء عبر تخصيص المزيد من الموارد للمفاهيم الصعبة أو تحسين تجربة المستخدم التعليمية بشكل عام",
                    "design_text_alignment":"text-center justify-content-center",
                }};
                var object = { 'id' : this.selected_unique_id, 'fields': [] };
                object.fields = options;
                object.fields['buttons']=[];
                this.contents[this.selected_page].push(object);
                this.template_editor(unique_id,type);
            }else if(type == "component_text_with_image"){
                var options = {...options,...{
                    "content_title":"مجتمع تعليمي تفاعلي",
                    "content_sub_title":"بتجربة مثالية ورائعة",
                    "content_description":"توفر منصتنا مجتمعًا تعليميًا تفاعليًا يسمح للطلاب والمدرسين بالتفاعل بشكل مستمر خارج حدود الحصص الدراسية. يمكن للطلاب طرح الأسئلة ومشاركة الأفكار وتكوين مجموعات دراسية إلكترونية تساعدهم في التعلم المشترك. يوفر المجتمع أيضًا فرصًا للتواصل مع الخبراء من مختلف المجالات للحصول على إرشادات ونصائح قيّمة. من خلال أدوات المنتديات والمحادثات المخصصة، يظل الطلاب متصلين دائمًا مع زملائهم، مما يعزز الشعور بالانتماء ويحفز على التعاون المستمر",
                    "content_image_url":"{{env('APP_URL')}}/images/components/demo/image.jpg",
                    "design_content_alignment":"flex-row"
                }};
                var object = { 'id' : this.selected_unique_id, 'fields': [] };
                object.fields = options;
                object.fields['buttons']=[];
                this.contents[this.selected_page].push(object);
                this.template_editor(unique_id,type);
            }else if(type == "component_text_with_video"){
                var options = {...options,...{
                    "content_title":"هنا عنوان رئيسي",
                    "content_sub_title":"هنا عنوان فرعي",
                    "content_description":"توفر منصتنا مجتمعًا تعليميًا تفاعليًا يسمح للطلاب والمدرسين بالتفاعل بشكل مستمر خارج حدود الحصص الدراسية. يمكن للطلاب طرح الأسئلة ومشاركة الأفكار وتكوين مجموعات دراسية إلكترونية تساعدهم في التعلم المشترك. يوفر المجتمع أيضًا فرصًا للتواصل مع الخبراء من مختلف المجالات للحصول على إرشادات ونصائح قيّمة. من خلال أدوات المنتديات والمحادثات المخصصة، يظل الطلاب متصلين دائمًا مع زملائهم، مما يعزز الشعور بالانتماء ويحفز على التعاون المستمر",
                    "content_align_text":"text-end",
                    "content_video_url":"https://www.youtube.com/watch?v=JLGS4fP3DLM",
                    "design_content_alignment":"flex-row"
                }};
                var object = { 'id' : this.selected_unique_id, 'fields': [] };
                object.fields = options;
                object.fields['buttons']=[];
                this.contents[this.selected_page].push(object);
                this.template_editor(unique_id,type);
            }else if(type == "component_features"){
                var options = {...options,...{
                    
                    "content_title":"لماذا دوراتنا",
                    "content_description":"اكتشف أفضل الميزات التي تقدمها دوراتنا",
                    "design_text_alignment":"text-center justify-content-center",
                    "design_columns":"3",
                    "design_content_alignment":"flex-row"
                }};
                var object = { 'id' : this.selected_unique_id, 'fields': [] };
                object.fields = options;
                object.fields['features']=[];
                object.fields['features'].push(
                    {
                        "id":this.generate_id(),
                        "fields":{
                            "title": "تجربة تعليمية مخصصة",
                            "content": "تقدم منصتنا تجربة تعليمية مخصصة لكل طالب، حيث يتمكن المدرسون من تخصيص المحتوى والمسارات التعليمية بناءً على احتياجات الطلاب، مما يعزز من قدرتهم على التفوق.",
                            'url':'',
                            'url_open_type':'',
                            "image_url": "{{env('APP_URL')}}/images/components/images/learning.png"
                        }
                    },
                    {
                        "id":this.generate_id(),
                        "fields":{
                            "title": "إدارة شاملة للدورات",
                            "content": "تتيح المنصة للمدرسين إدارة جميع جوانب دوراتهم بسهولة، بما في ذلك إنشاء المحتوى، جدولة الحصص، وتتبع تقدم الطلاب. كل ذلك من خلال واجهة مستخدم بسيطة ومتكاملة.",
                            'url':'',
                            'url_open_type':'',
                            "image_url": "{{env('APP_URL')}}/images/components/images/courses.png"
                        }
                    },
                    {
                        "id":this.generate_id(),
                        "fields":{
                            "title": "التفاعل في الوقت الفعلي",
                            "content": "من خلال الأدوات المتقدمة للفيديو المباشر والدردشة، يمكن للمدرسين والطلاب التواصل في الوقت الفعلي، مما يجعل من السهل مشاركة المعرفة وحل الأسئلة بسرعة.",
                            'url':'',
                            'url_open_type':'',
                            "image_url": "{{env('APP_URL')}}/images/components/images/active.png"
                        }
                    },
                    {
                        "id":this.generate_id(),
                        "fields":{
                            "title": "الاختبارات والواجبات التفاعلية",
                            "content": "تتيح المنصة إنشاء اختبارات وواجبات تفاعلية تقيس تقدم الطلاب، مع تقارير تفصيلية تساعد المدرسين في تحسين الأداء التعليمي.",
                            'url':'',
                            'url_open_type':'',
                            "image_url": "{{env('APP_URL')}}/images/components/images/quiz.png"
                        }
                    },
                    {
                        "id":this.generate_id(),
                        "fields":{
                            "title": "شهادات معتمدة إلكترونيًا",
                            "content": "بعد إتمام الدورة، يمكن للطلاب الحصول على شهادات إلكترونية معتمدة يمكن مشاركتها عبر الإنترنت وإضافتها إلى ملفاتهم المهنية بسهولة.",
                            'url':'',
                            'url_open_type':'',
                            "image_url": "{{env('APP_URL')}}/images/components/images/certificate.png"
                        }
                    },
                    {
                        "id":this.generate_id(),
                        "fields":{
                            "title": "دعم كامل للأجهزة المحمولة",
                            "content": "يمكن للطلاب الوصول إلى دوراتهم في أي وقت ومن أي مكان عبر تطبيقات الجوال المخصصة، مما يمنحهم المرونة للتعلم حسب جدولهم الخاص.",
                            'url':'',
                            'url_open_type':'',
                            "image_url": "{{env('APP_URL')}}/images/components/images/mobile.png"
                        }
                    }
                );
                

                this.contents[this.selected_page].push(object);
                this.template_editor(unique_id,type);
            }else if(type == "component_faqs"){
                var options = {...options,...{
                    "content_title":"الأسئلة الشائعة",
                    "content_sub_title":"نرد على كافة الأسئلة التي قد تدور في ذهنك",
                    "design_text_alignment":"text-center justify-content-center",
                }};
                var object = { 'id' : this.selected_unique_id, 'fields': [] };
                object.fields = options;
                object.fields['faqs']=[];
                object.fields['faqs'].push(
                    {
                        "id":this.generate_id(),
                        "fields":{
                            "title":"عنوان السؤال يمكن كتابته هنا",
                            "content":"ابدأ الآن واستمتع بكامل ميزات المنصة بشكل مباشر من خلالك"
                        }
                    }
                );
                this.contents[this.selected_page].push(object);
                this.template_editor(unique_id,type);
            }else if(type == "component_cta"){
                var options = {...options,...{
                    "content_title":"هل أنت جاهز لتجربتك",
                    "content_sub_title":"",
                    "content_description":"ابدأ الآن واستمتع بكامل ميزات المنصة بشكل مباشر من خلالك",
                    "design_text_color":"#ffffff",
                    "design_background_color":"#0194fe",
                    "design_text_alignment":"text-center justify-content-center",
                }};
                var object = { 'id' : this.selected_unique_id, 'fields': [] };
                object.fields = options;
                object.fields['buttons']=[];
                object.fields['buttons'].push(
                    {
                        'id': this.generate_id(),
                        'fields':{
                            "type":"custom",
                            "title":"أعرف المزيد",
                            "class":"btn-outline-light",
                            "url":"#",
                            "url_open_type":""
                        }
                    }
                );
                this.contents[this.selected_page].push(object);
                this.template_editor(unique_id,type);
            }else if(type == "component_html"){
                var options = {...options,...{
                    "content_title":"",
                    "content_sub_title":"",
                    "content_description":"",
                    "design_min_height":0,
                    "content_html":""
                }};
                var object = { 'id' : this.selected_unique_id, 'fields': [] };
                object.fields = options;
                this.contents[this.selected_page].push(object);
                this.template_editor(unique_id,type);
            }else if(type == "component_contact"){
                var options = {...options,...{
                    "content_title":"تواصل معنا",
                    "content_sub_title":"يمكنك التواصل معنا عبر النموذج التالي",
                    "content_description":"توفر منصتنا مجتمعًا تعليميًا تفاعليًا يسمح للطلاب والمدرسين بالتفاعل بشكل مستمر خارج حدود الحصص الدراسية. يمكن للطلاب طرح الأسئلة ومشاركة الأفكار وتكوين مجموعات دراسية إلكترونية تساعدهم في التعلم المشترك. يوفر المجتمع أيضًا فرصًا للتواصل مع الخبراء من مختلف المجالات للحصول على إرشادات ونصائح قيّمة. من خلال أدوات المنتديات والمحادثات المخصصة، يظل الطلاب متصلين دائمًا مع زملائهم، مما يعزز الشعور بالانتماء ويحفز على التعاون المستمر",
                    "design_text_alignment":"text-center justify-content-center",
                    //"design_content_alignment":"flex-row"
                }};
                var object = { 'id' : this.selected_unique_id, 'fields': [] };
                object.fields = options;
                this.contents[this.selected_page].push(object);
                this.template_editor(unique_id,type);
            }else if(type == "component_slider"){
                var options = {...options,...{
                    "content_title":"أحدث المنتجات",
                    "content_sub_title":"استمتع بأفضل المنتجات على موقعنا",
                    "design_columns":"3"
                }};
                var object = { 'id' : this.selected_unique_id, 'fields': [] };
                object.fields = options;
                object.fields['buttons']=[];
                object.fields['buttons'].push(
                    {
                        'id': this.generate_id(),
                        'fields':{
                            "type":"custom",
                            "title":"أعرف المزيد",
                            "class":"btn-outline-secondary",
                            "url":"#",
                            "url_open_type":""
                        }
                    }
                );
                object.fields['features']=[];
                object.fields['features'].push(
                    {
                        "id":this.generate_id(),
                        "fields":{
                            "title": "",
                            "content": "",
                            'url':'',
                            'url_open_type':'',
                            "image_url": "{{env('APP_URL')}}/images/components/demo/banner1.webp"
                        }
                    },
                    {
                        "id":this.generate_id(),
                        "fields":{
                            "title": "",
                            "content": "",
                            'url':'',
                            'url_open_type':'',
                            "image_url": "{{env('APP_URL')}}/images/components/demo/banner2.webp"
                        }
                    },
                    {
                        "id":this.generate_id(),
                        "fields":{
                            "title": "",
                            "content": "",
                            'url':'',
                            'url_open_type':'',
                            "image_url": "{{env('APP_URL')}}/images/components/demo/banner3.webp"
                        }
                    },
                    {
                        "id":this.generate_id(),
                        "fields":{
                            "title": "",
                            "content": "",
                            'url':'',
                            'url_open_type':'',
                            "image_url": "{{env('APP_URL')}}/images/components/demo/banner4.webp"
                        }
                    },
                );
                
                this.contents[this.selected_page].push(object);
                this.template_editor(unique_id,type);
            }else if(type == "component_content"){
                var options = {...options,...{
                    "content_title":"أحدث الأحداث",
                    "content_sub_title":"يمكنك الاطلاع على الجديد",
                    "content_description":"",
                    "design_text_alignment":"text-center justify-content-center",
                    "design_columns":"4"
                    //"design_content_alignment":"flex-row"
                }};
                var object = { 'id' : this.selected_unique_id, 'fields': [] };
                object.fields = options;
                object.fields['content']={
                    'type':"categories",
                    'selected_ids':[],
                    'items_count':12,
                    'view_type':"standard", /*or slider*/
                    'paginate':false,
                    'rendered_html':''
                };
                object.fields['buttons']=[];

                this.contents[this.selected_page].push(object);
                this.template_editor(unique_id,type);
            }
            console.log(this.contents['home']);
        },
        highlight_block(id){
            setTimeout(function(){
                const element = document.getElementById(id);
                if (element) {
                    element.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    element.classList.add('highlight-block');
                    setTimeout(function(){
                        element.classList.remove('highlight-block');
                    },800);
                }
            },50); 
        },
        init_sortable: function(){
            //console.log(document.getElementById('response-contaienr'));
            //var sortable = Sortable.create(document.getElementById('response-contaienr'));
        },
        change_aside_view: function(type){
            document.getElementById('builder-aside').classList.remove('aside-closed');

            if(type=="edit_component"){
                document.querySelectorAll('.aside-wedgit').forEach(element => {
                    element.style.display = 'none';
                });
                document.querySelectorAll('.edit-component').forEach(element => {
                    element.style.display = 'block';
                });
            }else if(type=="add_component"){
                document.querySelectorAll('.aside-wedgit').forEach(element => {
                    element.style.display = 'none';
                });
                document.querySelectorAll('.add-component').forEach(element => {
                    element.style.display = 'block';
                });
            }else if(type=="show_pages"){

            }
        },
        change_selected_component: function(unique_id,type){
            //console.log(unique_id);
            //console.log(type);
            this.highlight_block('block_'+unique_id);
            this.selected_page = this.selected_page;
            this.selected_unique_id = unique_id;
            this.selected_type = type;
            this.selected_edit_wedgit=type;
            this.change_aside_view("edit_component");
            this.change_edit_tab('content');

        },
        convert_to_embed: function(link) {
          // Check if the link is from YouTube
          const youtubeRegex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
          const match = link.match(youtubeRegex);

          console.log(match);
          if (match) {
            // Extract the video ID and return the embed code
            const videoId = match[1];
            return `https://www.youtube.com/embed/${videoId}`;
          } else {
            // Return the link as it is if it's not a YouTube video
            return link;
          }
        },
        upload_image_from_url: function(event){

        },
        add_new_button: function(unique_id,type,button=
                {
                    'id': this.generate_id(),
                    'fields':{
                        'type':'custom',
                        'title':"هنا عنوان الزر",
                        'class':"btn-success",
                        'url':'#',
                        'url_open_type':''
                    }
                }
            ){
            this.change_selected_component(unique_id,type);
            this.contents[this.selected_page].find(block => block.id === unique_id)?.fields?.buttons.push(button);
        },
        add_new_faq: function(unique_id,type,faq={
                "id":this.generate_id(),
                "fields":{
                    "title": "دعم كامل للأجهزة المحمولة",
                    "content": "يمكن للطلاب الوصول إلى دوراتهم في أي وقت ومن أي مكان عبر تطبيقات الجوال المخصصة، مما يمنحهم المرونة للتعلم حسب جدولهم الخاص."
                }
            }){
            this.change_selected_component(unique_id,type);
            this.contents[this.selected_page].find(block => block.id === unique_id)?.fields?.faqs.push(faq);
        },
        add_new_feature: function(unique_id,type,feature={
                "id":this.generate_id(),
                "fields":{
                    "title": "دعم كامل للأجهزة المحمولة",
                    "content": "يمكن للطلاب الوصول إلى دوراتهم في أي وقت ومن أي مكان عبر تطبيقات الجوال المخصصة، مما يمنحهم المرونة للتعلم حسب جدولهم الخاص.",
                    'url':'',
                    'url_open_type':'',
                    "image_url": "{{env('APP_URL')}}/images/components/images/mobile.png"
                }
            }){
            this.change_selected_component(unique_id,type);
            this.contents[this.selected_page].find(block => block.id === unique_id)?.fields?.features.push(feature);
        },
        appending_new_block(unique_id,location="before"){
            console.log(this.contents[this.selected_page][unique_id]);
        },
        alerter: function(content=""){
            alert(content);
        },
        upload_image: function(event){

            var path =JSON.parse(event.currentTarget.dataset.input);
            const file = event.target.files[0];
            if (!file) {
                console.warn('No file selected');
                return;
            }
            const formData = new FormData();
            formData.append("upload", file);
            formData.append("_token", "{{csrf_token()}}");

            fetch('{{route('admin.upload.image')}}', {
                method: 'POST',
                body: formData,
            }).then((response) => {
                return response.json();
            }).then((data) => {
                console.log(path);
                const obj = path.slice(0, -1).reduce((acc, key) => acc[key], this);
                const key = path[path.length - 1];
                obj[key] = data.url;


                //this.contents[this.selected_page][this.selected_unique_id][data_url]= data.url;
            });
        },
        change_edit_tab: function(type){
            this.current_edit_tab = type;
        },
        submit_page_updates: function(){
            fetch("{{route('admin.pages.builder-update',['page'=>$page])}}", {
              method: 'POST',
              body: JSON.stringify({
                _token:"{{csrf_token()}}",
                contents:JSON.stringify(Object.values(this.contents['{{$page->slug}}']))
              }),
              headers: {
                "Content-Type": "application/json",
              },
            }).then(response => {
                var json_response = response.json();
                return json_response;
            }).then(response => {
                //console.log(response);
                window.location.href= response['redirect_url'];
                //console.log(response['redirect_url']);    
            }).catch(error => {
              alert("Oops! There was a problem submitting your form");
            });
        },
        aside_toggle: function(){
            document.getElementById('site-main-container').classList.toggle('full-width');
            document.getElementById('builder-aside').classList.toggle('aside-closed');
        }
    },
    created: function(){
        this.init_sortable();
    }
  });
  app.mount('#builder-main-container');

</script>

@endsection
