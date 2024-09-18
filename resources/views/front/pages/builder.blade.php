@extends('layouts.app',['page_title'=>"بانئ الصفحات"])
@section('content')
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

.hoverable-components-builder:hover {
    opacity: 0.9;
    background: rgb(96 125 139 / 11%);
    border-radius: 9px;
    cursor: pointer;
}

.sortable-chosen {
    /*transform:rotate(-1deg)!important;*/
    border: 3px dashed #d1d1d1 !important;
    border-radius: 5px !important;
}

.hoverable-components-builder:hover .append-plus-start,
.hoverable-components-builder:hover .append-plus-end {
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
    z-index: 15;
}

.append-plus-end {
	bottom:-15px;
}
.append-plus-start {
	top:-21px;
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

</style>
<div class="p-0 " style="min-height:70vh" id="builder-main-container">
    <div class="col-12 p-0 row">
        <div class="col-12 p-0" style="overflow:auto">
            <div class="col-12 p-0" style="min-height: 80dvh;">
                <div class="col-12 p-0 row">
                    <div class="col-auto p-0 builder-aside" style="position:sticky;top: 0;width: 360px">
                        <div style="min-height:80dvh;" class="p-3 col-12 add-component aside-wedgit">
                            <div class="col-12 p-0 font-4">
                                <h2 class="p-3">أضف قسم جديد</h2>
                            </div>
                            <div class="col-12 p-0 row " id="items">
                                <div class="col-12 p-0 component mb-2" v-on:click="template_generator('home','','component_text')" data-id="component_text" style="cursor: pointer;">
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
                                <div class="col-12 p-0 component mb-2" v-on:click="template_generator('home','','component_text_with_image')" data-id="component_text_with_image" style="cursor: pointer;">
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
                                <div class="col-12 p-0 component mb-2" v-on:click="template_generator('home','','component_text_with_video')" data-id="component_text_with_video" style="cursor: pointer;">
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
                            </div>
                        </div>
                        <div style="min-height:80dvh;display: none;max-height: 100dvh;overflow: auto;" class="p-2 col-12 edit-component aside-wedgit">
                            <div class="col-12 p-0 row">
                                <div class="col-auto d-flex align-items-center justify-content-center" v-on:click="change_aside_view('add_component')">
                                    <span class="btn btn-light" style="width: 40px;height: 40px;display: inline-block;padding: 0px;display: flex;align-items: center;justify-content: center;border:1px solid #eeeeee;border-radius:50%;color:inherit;"><span class="fas fa-chevron-right" style="font-size:18px;"></span></span>
                                </div>
                                <div class="col p-0">
                                    <h2 class="p-3"> تعديل القسم</h2>
                                </div>
                            </div>
                            <div class="col-12 p-0">
                                <div class="col-12 p-1">
                                    <nav style="background:#d9e2ef!important;border-radius: 5px;">
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <div class="col p-1">
                                                <button style="padding: 5px;border-radius: 5px;" class="col-12 text-center nav-link active" id="content-tab" data-bs-toggle="tab" data-bs-target="#nav-content" type="button" role="tab" aria-controls="nav-content" aria-selected="true">المحتوى</button>
                                            </div>
                                            <div class="col p-1">
                                                <button style="padding: 5px;border-radius: 5px;" class="col-12 text-center nav-link" id="design-tab" data-bs-toggle="tab" data-bs-target="#nav-design" type="button" role="tab" aria-controls="nav-design" aria-selected="false">التصميم</button>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-content" role="tabpanel" aria-labelledby="content-tab">
                                        <div v-if="('content_title' in (contents[selected_page]?.[selected_unique_id]?.[selected_type] || {}))" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                العنوان
                                            </div>
                                            <div class="col-12 px-2 mb-3">
                                                <input class="form-control" type="" name="" v-model="contents[selected_page][selected_unique_id][selected_type].content_title" style="font-size:14px;border-radius: 2px;">
                                            </div>
                                        </div>
                                        <div v-if="('content_sub_title' in (contents[selected_page]?.[selected_unique_id]?.[selected_type] || {}))" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                العنوان الفرعي
                                            </div>
                                            <div class="col-12 px-2 mb-3">
                                                <input class="form-control" type="" name="" v-model="contents[selected_page][selected_unique_id][selected_type].content_sub_title" style="font-size:14px;border-radius: 2px;">
                                            </div>
                                        </div>
                                        <div v-if="('content_image_url' in (contents[selected_page]?.[selected_unique_id]?.[selected_type] || {}))" class="col-12 p-0">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                الصورة
                                            </div>
                                            <div class="col-12 px-2 mb-3">

                                            	<div v-if="contents[selected_page][selected_unique_id][selected_type].content_image_url == null" class="col-12 p-0 row d-flex align-items-center">
                                                        <div style="width: 100px;padding: 0px;position: relative;height: 50px;overflow: hidden;background: #f1f1f1;cursor: pointer;" class="d-flex align-items-center justify-content-center">
                                                            <span style="font-size:13px"> <span class="fal fa-upload"></span> ارفع أو</span>
                                                            <input type="file" style="width:100%;opacity: 0;height: 100%;position: absolute;right: 0px;top: 0px;" @change="upload_image" data-input="content_image_url">
                                                        </div>
                                                        <div style="width: calc(100% - 100px);padding: 0px;">
                                                            <input class="form-control preview-url" type="" name="" v-model="contents[selected_page][selected_unique_id][selected_type].content_image_url" style="font-size:14px;border-radius: 2px;" placeholder="ألصق الرابط هنا">
                                                        </div>
                                                    </div>
                                                    <div  v-if="contents[selected_page][selected_unique_id][selected_type].content_image_url != null" class="col-12 p-2" style="border:1px solid #f1f1f1">
														<div class="col-12 p-0 mb-3">
                                                            <div style="width:100%;position: relative;">
                                                                <span class="fal fa-times" style="width: 25px;height: 25px;display: flex;align-items: center;justify-content: center;position: absolute;left: 10px;color: white;top: 10px;border-radius: 50%;background: rgb(255 0 0 / 55%);cursor: pointer;font-size: 12px;" v-on:click="contents[selected_page][selected_unique_id][selected_type].content_image_url = null;"></span>
                                                                <img :src="contents[selected_page][selected_unique_id][selected_type].content_image_url" style="width: 100%;border-radius: 10px;">
                                                            </div>
                                                        </div>
                                                    </div>

 
                                            </div>
                                        </div>
                                        <div v-if="('content_description' in (contents[selected_page]?.[selected_unique_id]?.[selected_type] || {}))" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                الوصف
                                            </div>
                                            <div class="col-12 px-2 mb-3">
                                                <textarea class="form-control" v-model="contents[selected_page][selected_unique_id][selected_type].content_description" style="border-radius: 2px;min-height: 150px;"></textarea>
                                            </div>
                                        </div>
                                        <div v-if="('buttons' in (contents[selected_page]?.[selected_unique_id]?.[selected_type] || {}))" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                الأزرار
                                            </div>
                                            <div class="col-12 px-2 mb-3">
                                            	<div v-for="button,index in contents[selected_page][selected_unique_id][selected_type]['buttons']" :key="button">

                                            		<div  class="col-12 px-0 my-2 py-2">
			                                            <div class="col-12 px-3 mb-2 font-1">
			                                                عنوان الزر
			                                            </div>
			                                            <div class="col-12 px-2 mb-3">
			                                                <input class="form-control" type="" name="" v-model="contents[selected_page][selected_unique_id][selected_type]['buttons'][index].btn_text" style="font-size:14px;border-radius: 2px;">
			                                            </div>
			                                        </div>
			                                        
                                            	</div>
                                                <div class="col-12 p-0" >
                                                	<span v-on:click="add_new_button(selected_page,selected_unique_id,selected_type)" class="btn btn-outline-primary py-1 px-5" style="border-width: 1px;"><span class="fas fa-plus ms-2"></span> أضف زر جديد</span>
                                                	
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-design" role="tabpanel" aria-labelledby="design-tab">
                                        <div v-if="('design_background_url' in (contents[selected_page]?.[selected_unique_id]?.[selected_type] || {}))" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                صورة الخلفية
                                            </div>
                                            <div class="col-12 px-2 mb-3 row d-flex align-items-center ">
                                                <div class="col-12 p-0">
                                                    <div v-if="contents[selected_page][selected_unique_id][selected_type].design_background_url == null" class="col-12 p-0 row d-flex align-items-center">
                                                        <div style="width: 100px;padding: 0px;position: relative;height: 50px;overflow: hidden;background: #f1f1f1;cursor: pointer;" class="d-flex align-items-center justify-content-center">
                                                            <span style="font-size:13px"> <span class="fal fa-upload"></span> ارفع أو</span>
                                                            <input type="file" style="width:100%;opacity: 0;height: 100%;position: absolute;right: 0px;top: 0px;" @change="upload_image" data-input="design_background_url">
                                                        </div>
                                                        <div style="width: calc(100% - 100px);padding: 0px;">
                                                            <input class="form-control preview-url" type="" name="" v-model="contents[selected_page][selected_unique_id][selected_type].design_background_url" style="font-size:14px;border-radius: 2px;" placeholder="ألصق الرابط هنا">
                                                        </div>
                                                    </div>
                                                    <div  v-if="contents[selected_page][selected_unique_id][selected_type].design_background_url != null" class="col-12 p-2" style="border:1px solid #f1f1f1">
                                                        <div class="col-12 p-0 mb-3">
                                                            <div style="width:100%;position: relative;">
                                                                <span class="fal fa-times" style="width: 25px;height: 25px;display: flex;align-items: center;justify-content: center;position: absolute;left: 10px;color: white;top: 10px;border-radius: 50%;background: rgb(255 0 0 / 55%);cursor: pointer;font-size: 12px;" v-on:click="contents[selected_page][selected_unique_id][selected_type].design_background_url = null;contents[selected_page][selected_unique_id][selected_type].design_background_opacity = 100;contents[selected_page][selected_unique_id][selected_type].design_background_blur = 0;contents[selected_page][selected_unique_id][selected_type].design_background_grayscale = 0;contents[selected_page][selected_unique_id][selected_type].design_background_contrast = 100"></span>
                                                                <img :src="contents[selected_page][selected_unique_id][selected_type].design_background_url" style="width: 100%;border-radius: 10px;">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 px-0 py-1">
                                                            <div class="col-12 py-0 px-0" style="font-size:13px">الشفافية</div>
                                                            <input type="range" v-model="contents[selected_page][selected_unique_id][selected_type].design_background_opacity" class="form-range col-12 p-0" min="0.01" step="0.01" max="1" style="background: rgb(205 205 205);border-radius: 20px;height: 7px;cursor: pointer;border: 2px solid rgb(159 19159);">
                                                        </div>
                                                        <div class="col-12 px-0 py-1">
                                                            <div class="col-12 py-0 px-0" style="font-size:13px">التغبيش</div>
                                                            <input type="range" v-model="contents[selected_page][selected_unique_id][selected_type].design_background_blur" class="form-range col-12 p-0" min="0" max="100" style="background: rgb(205 205 205);border-radius: 20px;height: 7px;cursor: pointer;border: 2px solid rgb(159 159 159);">
                                                        </div>
                                                        <div class="col-12 px-0 py-1">
                                                            <div class="col-12 py-0 px-0" style="font-size:13px">تدرج اللون الرمادي</div>
                                                            <input type="range" v-model="contents[selected_page][selected_unique_id][selected_type].design_background_grayscale" class="form-range col-12 p-0" min="0" max="100" style="background: rgb(205 205 205);border-radius: 20px;height: 7px;cursor: pointer;border: 2px solid rgb(159 159 159);">
                                                        </div>
                                                        <div class="col-12 px-0 py-1">
                                                            <div class="col-12 py-0 px-0" style="font-size:13px">التباين</div>
                                                            <input type="range" v-model="contents[selected_page][selected_unique_id][selected_type].design_background_contrast" class="form-range col-12 p-0" min="0" max="100" style="background: rgb(205 205 205);border-radius: 20px;height: 7px;cursor: pointer;border: 2px solid rgb(159 159 159);">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="('design_text_color' in (contents[selected_page]?.[selected_unique_id]?.[selected_type] || {}))" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                لون النص
                                            </div>
                                            <div class="col-12 px-2 mb-3 row">
                                                <span v-for="color in colors" v-bind:style="{ background: color }" :key="color" class="d-flex m-1" style="width: 25px;height:25px;padding: 2px;border-radius: 50%;cursor: pointer;overflow: hidden;">
                                                    <input type="radio" name="design_text_color" v-bind:value="color" v-model="contents[selected_page][selected_unique_id][selected_type].design_text_color" style="width:100%;cursor: pointer;height: 100%;border-radius: inherit;opacity: 0;">
                                                </span>
                                                <span v-bind:style="{ border: '2px solid ' + contents[selected_page][selected_unique_id][selected_type].design_text_color }" class="d-flex align-items-center justify-content-between m-1" style="width: 25px;height:25px;padding: 2px;border-radius: 50%;cursor: pointer;overflow: hidden;position: relative;">
                                                    <span class="far fa-paint-brush-alt" style="font-size:12px;margin:auto;"></span>
                                                    <input type="color" name="design_text_color" v-model="contents[selected_page][selected_unique_id][selected_type].design_text_color" style="width:100%;cursor: pointer;height: 100%;border-radius: inherit;position: absolute;opacity: 0;">
                                                </span>
                                            </div>
                                        </div>
                                        <div v-if="('design_background_color' in (contents[selected_page]?.[selected_unique_id]?.[selected_type] || {}))" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                لون الخلفية
                                            </div>
                                            <div class="col-12 px-2 mb-3 row">
                                                <span v-for="color in colors" v-bind:style="{ background: color }" :key="color" class="d-flex m-1" style="width: 25px;height:25px;padding: 2px;border-radius: 50%;cursor: pointer;overflow: hidden;">
                                                    <input type="radio" name="design_background_color" v-bind:value="color" v-model="contents[selected_page][selected_unique_id][selected_type].design_background_color" style="width:100%;cursor: pointer;height: 100%;border-radius: inherit;opacity: 0;">
                                                </span>
                                                <span v-bind:style="{ border: '2px solid ' + contents[selected_page][selected_unique_id][selected_type].design_background_color }" class="d-flex align-items-center justify-content-between m-1" style="width: 25px;height:25px;padding: 2px;border-radius: 50%;cursor: pointer;overflow: hidden;position: relative;">
                                                    <span class="far fa-paint-brush-alt" style="font-size:12px;margin:auto;"></span>
                                                    <input type="color" name="design_background_color" v-model="contents[selected_page][selected_unique_id][selected_type].design_background_color" style="width:100%;cursor: pointer;height: 100%;border-radius: inherit;position: absolute;opacity: 0;">
                                                </span>
                                            </div>
                                        </div>
                                        <div v-if="('design_text_alignment' in (contents[selected_page]?.[selected_unique_id]?.[selected_type] || {}))" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                محاذاة النصوص
                                            </div>
                                            <div class="col-12 px-2 mb-3 row d-flex justify-content-between ">
                                                <span v-for="(alignment,alignment_index) in text_alignments" :key="alignment_index" class="d-flex align-items-center justify-content-center m-1" style="width: 40px;height:40px;padding: 2px;cursor: pointer;position: relative;" :style="alignment_index == contents[selected_page][selected_unique_id][selected_type].design_text_alignment ? { 'border-bottom': '5px solid #03a9f4' } : {'border-bottom': '5px solid transparent'}">
                                                    <span :class="alignment" class="font-4"></span>
                                                    <input type="radio" v-model="contents[selected_page][selected_unique_id][selected_type].design_text_alignment" :value="alignment_index" style="width: 100%;height: 100%;position: absolute;">
                                                </span>
                                            </div>
                                        </div>
                                        <div v-if="('design_content_alignment' in (contents[selected_page]?.[selected_unique_id]?.[selected_type] || {}))" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                ترتيب القطع
                                            </div>
                                            <div class="col-12 px-2 mb-3 row d-flex justify-content-between ">
                                                <span v-for="(alignment,alignment_index) in content_alignments" :key="alignment_index" class="d-flex align-items-center justify-content-center m-1" style="width: 40px;height:40px;padding: 2px;cursor: pointer;position: relative;" :style="alignment_index == contents[selected_page][selected_unique_id][selected_type].design_content_alignment ? { 'border-bottom': '5px solid #03a9f4' } : {'border-bottom': '5px solid transparent'}">
                                                    <span :class="alignment" class="font-4"></span>
                                                    <input type="radio" v-model="contents[selected_page][selected_unique_id][selected_type].design_content_alignment" :value="alignment_index" style="width: 100%;height: 100%;position: absolute;">
                                                </span>
                                            </div>
                                        </div>
                                        <div v-if="('design_custom_css' in (contents[selected_page]?.[selected_unique_id]?.[selected_type] || {}))" class="col-12 px-0 my-2 py-2">
                                            <div class="col-12 px-3 mb-2 font-1">
                                                كود css مخصص
                                            </div>
                                            <div class="col-12 px-2 mb-3">
                                                <textarea class="form-control code-highlight" style="min-height: 200px;direction: ltr;background: #002b36!important;color:#fff!important" v-model="contents[selected_page][selected_unique_id][selected_type].design_custom_css"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col p-0" style="width:calc(100% - 360px);">
                        <div style="background: #f7f7f7;height:100dvh;overflow: auto;" class="p-2 col-12">
                            <div class="col-12 p-2 " id="response-contaienr">
                                <div v-for="(page,page_index) in contents[selected_page]" :key="page_index" class="content-block" :class="'block_' + page_index">
                                	
                                    <div v-for="(unique_ids, unique_ids_index) in page" :key="unique_ids_index">
                                        <div v-if="unique_ids_index=='component_text'" :class="[unique_ids.design_text_alignment,'block_' + page_index]" class='position-relative  border-0 hoverable-components-builder appened-component'  v-on:click="change_selected_component(selected_page,page_index,'component_text')" :style="{'color': unique_ids.design_text_color}">
                                        	<div v-html="unique_ids.design_custom_css"></div>
                                            <div style="width: 100%;height: 100%;position: absolute;top: 0px;right: 0px;z-index: 1;" :style="{'background-color': unique_ids.design_background_color,'background-image': unique_ids.design_background_url?'url('+unique_ids.design_background_url+')' :'none','background-size':'cover','background-repeat':'no-repeat','background-position':'center','opacity': unique_ids.design_background_opacity,'filter':'blur('+ unique_ids.design_background_blur +'px) contrast('+ unique_ids.design_background_contrast +'%) grayscale('+ unique_ids.design_background_grayscale +'%)'
			                                        	}"></div>
                                            <span class='fal fa-plus append-plus-start' ></span>
                                            <div class='row py-9' style="z-index: 2;position: relative;">
                                                <div :class="unique_ids.design_text_alignment" class='col-12 col-lg-9 mx-auto '>
                                                    <h3 :class="unique_ids.design_text_alignment" class='display-5 mb-3 ' style="color:inherit;">@{{unique_ids.content_title}}</h3>
                                                    <p :class="unique_ids.design_text_alignment" class=' mb-6  font-1 font-lg-2' style="margin:5px 0px 8px!important;opacity: 0.9">@{{unique_ids.content_sub_title}}</p>
                                                    <p :class="unique_ids.design_text_alignment" class=' mb-6  font-1 font-lg-2' style="white-space: pre-line">@{{unique_ids.content_description}}</p>
                                                </div>
                                            </div>
                                            <span class='fal fa-plus append-plus-end'></span>
                                        </div>
                                        <div v-if="unique_ids_index=='component_text_with_image'" :class="unique_ids.design_text_alignment" class='position-relative   hoverable-components-builder appened-component'  v-on:click="change_selected_component(selected_page,page_index,'component_text_with_image')" :style="{'color': unique_ids.design_text_color}">
                                        	<div v-html="unique_ids.design_custom_css"></div>
                                            <div style="width: 100%;height: 100%;position: absolute;top: 0px;right: 0px;z-index: 1;" :style="{'background-color': unique_ids.design_background_color,'background-image': unique_ids.design_background_url?'url('+unique_ids.design_background_url+')' :'none','background-size':'cover','background-repeat':'no-repeat','background-position':'center','opacity': unique_ids.design_background_opacity,'filter':'blur('+ unique_ids.design_background_blur +'px) contrast('+ unique_ids.design_background_contrast +'%) grayscale('+ unique_ids.design_background_grayscale +'%)'
			                                        	}"></div>
                                            <span class='fal fa-plus append-plus-start' ></span>
                                            <div class='row py-9' style="z-index: 2;position: relative;">
                                                <div :class="[unique_ids.design_text_alignment,unique_ids.design_content_alignment]" class='col-12 col-lg-10 mx-auto row '>
                                                    <div class="col-12 col-lg-6 mx-auto">
                                                        <img :src="unique_ids.content_image_url" style="width:100%;border-radius: 8px;">
                                                    </div>
                                                    <div class="col-12 col-lg-6 d-flex align-items-center row mx-auto">
                                                        <div class="col-12 px-0 py-3 row ">
                                                            <h3 :class="unique_ids.design_text_alignment" class='display-5 mb-3 '>@{{unique_ids.content_title}}</h3>
                                                            <p :class="unique_ids.design_text_alignment" class=' mb-6  font-1 font-lg-2' style="margin:5px 0px 8px!important;opacity: 0.9">@{{unique_ids.content_sub_title}}</p>
                                                            <p :class="unique_ids.design_text_alignment" class=' mb-6  font-1 font-lg-2' style="white-space: pre-line">@{{unique_ids.content_description}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class='fal fa-plus append-plus-end'></span>
                                            </div>
                                        </div>
                                        <div v-if="unique_ids_index=='component_text_with_video'" :class="unique_ids.design_text_alignment" class='position-relative   hoverable-components-builder appened-component'  v-on:click="change_selected_component(selected_page,page_index,'component_text_with_video')">
                                        	<div v-html="unique_ids.design_custom_css"></div>
                                        	<div style="width: 100%;height: 100%;position: absolute;top: 0px;right: 0px;z-index: 1;" :style="{'background-color': unique_ids.design_background_color,'background-image': unique_ids.design_background_url?'url('+unique_ids.design_background_url+')' :'none','background-size':'cover','background-repeat':'no-repeat','background-position':'center','opacity': unique_ids.design_background_opacity,'filter':'blur('+ unique_ids.design_background_blur +'px) contrast('+ unique_ids.design_background_contrast +'%) grayscale('+ unique_ids.design_background_grayscale +'%)'
			                                        	}"></div>
                                            <span class='fal fa-plus append-plus-start' ></span>
                                            <div class='row py-9' style="z-index: 2;position: relative;">
                                                <div :class="[unique_ids.design_text_alignment,unique_ids.design_content_alignment]" class='col-12 col-lg-10 mx-auto row '>
                                                    <div class="col-12 col-lg-6 mx-auto">
                                                        <iframe :src="convert_to_embed(unique_ids.content_video_url)" style="width:100%;height: 100%;border-radius: 10px;"></iframe>
                                                    </div>
                                                    <div class="col-12 col-lg-6 d-flex align-items-center row mx-auto">
                                                        <div class="col-12 px-0 py-3 row ">
                                                            <h3 :class="unique_ids.design_text_alignment" class='display-5 mb-3'>@{{unique_ids.content_title}}</h3>
                                                            <p :class="unique_ids.design_text_alignment" class=' mb-6  font-1 font-lg-2' style="margin:5px 0px 8px!important;opacity: 0.9">@{{unique_ids.content_sub_title}}</p>
                                                            <p :class="unique_ids.design_text_alignment" class=' mb-6  font-1 font-lg-2' style="white-space: pre-line">@{{unique_ids.content_description}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class='fal fa-plus append-plus-end'></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.5.4/vue.global.prod.min.js"></script>
{{--
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
--}}
<script type="module">
    const { createApp, ref, onMounted } = Vue;
	new Sortable(document.getElementById('response-contaienr'), {
	    animation: 150,
	    ghostClass: 'blue-background-class'
	});
 
    const app = 	createApp({
  	data(){
  		return {
  			component_append_selector:"response-contaienr",
			component_append_type:"after",
			contents:{},
			selected_page:null,
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
				'text-end':"fal fa-align-right",
				'text-center':"fal fa-align-center",
				'text-start':"fal fa-align-right",
			},
			content_alignments:{
				'flex-row':"fal fa-indent",
				'flex-row-reverse':"fal fa-outdent",
				'flex-column':"fal fa-sort-size-up",
				'flex-column-reverse':"fal fa-sort-size-down"
				
			},
  		}
  	},
  	methods:{
  		template_editor:function(page,unique_id,type,options={}){
  			this.change_selected_component(page,unique_id,type);
  		},
  		template_generator: function(page,unique_id,type,options={}){

  			if(unique_id==""){
  				unique_id=Math.random().toString(16).slice(2);
  			}else{
  				unique_id=unique_id;
  			}
  			//console.log(unique_id);

  			if (!this.contents[page]) 
    			this.contents[page] = {};
			if (!this.contents[page][unique_id]) 
			    this.contents[page][unique_id] = {};
			if (!this.contents[page][unique_id][type]) 
			    this.contents[page][unique_id][type] = {};


			this.selected_page=page;
  			this.selected_unique_id=unique_id;
  			this.selected_type=type;
  			

  			var options = {...{
  				"design_text_color":"inherit",
				"design_background_color":"",
				"design_background_url":null,
				"design_background_opacity":1,
				"design_background_blur":0,
				"design_background_grayscale":0,
				"design_background_contrast":100,
				"design_text_alignment":"text-end",
				"design_custom_css":"<style>\n.block_"+unique_id+" {\n\n}\n</style>\n",
  			},...options};

  		 
			if(type == "component_text"){
				var options = {...{
	  				//"id":Math.random().toString(16).slice(2),
					"content_title":"هنا عنوان رئيسي",
					"content_sub_title":"هنا عنوان فرعي",
					"content_description":"إذا ﻛﻨﺖ ﺗﺤﺘﺎج إﻟﻰ ﻋﺪد أﻛﺒﺮ ﻣﻦ اﻟﻔﻘﺮات ﻳﺘﻴﺢ ﻟﻚ ﻣﻮﻟﺪ اﻟﻨﺺ اﻟﻌﺮﺑﻰ زﻳﺎدة ﻋﺪد اﻟﻔﻘﺮات ﻛﻤﺎ ﺗﺮﻳﺪ، اﻟﻨﺺ ﻟﻦ ﻳﺒﺪو ﻣﻘﺴﻤﺎ وﻟﺎ ﻳﺤﻮي أﺧﻄﺎء ﻟﻐﻮﻳﺔ، ﻣﻮﻟﺪ اﻟﻨﺺ اﻟﻌﺮﺑﻰ ﻣﻔﻴﺪ ﻟﻤﺼﻤﻤﻲ اﻟﻤﻮاﻗﻊ ﻋﻠﻰ وﺟﻪ اﻟﺨﺼﻮص، ﺣﻴﺚ ﻳﺤﺘﺎج اﻟﻌﻤﻴﻞ ﻓﻰ ﻛﺜﻴﺮ ﻣﻦ اﻟﺄﺣﻴﺎن أن ﻳﻄﻠﻊ ﻋﻠﻰ ﺻﻮرة ﺣﻘﻴﻘﻴﺔ ﻟﺘﺼﻤﻴﻢ اﻟﻤﻮﻗﻊ."
	  			},...options};
	  			for (var index in options)this.contents[page][unique_id][type][index]= options[index];
	  			this.contents[page][unique_id][type]['buttons']=[];
			  	this.template_editor(page,unique_id,type);
			}else if(type == "component_text_with_image"){
				var options = {...{
					"content_title":"هنا عنوان رئيسي",
					"content_sub_title":"هنا عنوان فرعي",
					"content_description":"إذا ﻛﻨﺖ ﺗﺤﺘﺎج إﻟﻰ ﻋﺪد أﻛﺒﺮ ﻣﻦ اﻟﻔﻘﺮات ﻳﺘﻴﺢ ﻟﻚ ﻣﻮﻟﺪ اﻟﻨﺺ اﻟﻌﺮﺑﻰ زﻳﺎدة ﻋﺪد اﻟﻔﻘﺮات ﻛﻤﺎ ﺗﺮﻳﺪ، اﻟﻨﺺ ﻟﻦ ﻳﺒﺪو ﻣﻘﺴﻤﺎ وﻟﺎ ﻳﺤﻮي أﺧﻄﺎء ﻟﻐﻮﻳﺔ، ﻣﻮﻟﺪ اﻟﻨﺺ اﻟﻌﺮﺑﻰ ﻣﻔﻴﺪ ﻟﻤﺼﻤﻤﻲ اﻟﻤﻮاﻗﻊ ﻋﻠﻰ وﺟﻪ اﻟﺨﺼﻮص، ﺣﻴﺚ ﻳﺤﺘﺎج اﻟﻌﻤﻴﻞ ﻓﻰ ﻛﺜﻴﺮ ﻣﻦ اﻟﺄﺣﻴﺎن أن ﻳﻄﻠﻊ ﻋﻠﻰ ﺻﻮرة ﺣﻘﻴﻘﻴﺔ ﻟﺘﺼﻤﻴﻢ اﻟﻤﻮﻗﻊ.",
					"content_image_url":"https://img.freepik.com/free-photo/3d-cartoon-back-school_23-2151676634.jpg?t=st=1726573390~exp=1726576990~hmac=0eff7dd295515bd64eb1feb1062cd8417e27890e6272e64b9f5c687ecc6e383f&w=1380",
					"design_content_alignment":"flex-row"
	  			},...options};
	  			for (var index in options)this.contents[page][unique_id][type][index]= options[index];
			  	this.template_editor(page,unique_id,type);
			}else if(type == "component_text_with_video"){
				var options = {...{
					"content_title":"هنا عنوان رئيسي",
					"content_sub_title":"هنا عنوان فرعي",
					"content_description":"إذا ﻛﻨﺖ ﺗﺤﺘﺎج إﻟﻰ ﻋﺪد أﻛﺒﺮ ﻣﻦ اﻟﻔﻘﺮات ﻳﺘﻴﺢ ﻟﻚ ﻣﻮﻟﺪ اﻟﻨﺺ اﻟﻌﺮﺑﻰ زﻳﺎدة ﻋﺪد اﻟﻔﻘﺮات ﻛﻤﺎ ﺗﺮﻳﺪ، اﻟﻨﺺ ﻟﻦ ﻳﺒﺪو ﻣﻘﺴﻤﺎ وﻟﺎ ﻳﺤﻮي أﺧﻄﺎء ﻟﻐﻮﻳﺔ، ﻣﻮﻟﺪ اﻟﻨﺺ اﻟﻌﺮﺑﻰ ﻣﻔﻴﺪ ﻟﻤﺼﻤﻤﻲ اﻟﻤﻮاﻗﻊ ﻋﻠﻰ وﺟﻪ اﻟﺨﺼﻮص، ﺣﻴﺚ ﻳﺤﺘﺎج اﻟﻌﻤﻴﻞ ﻓﻰ ﻛﺜﻴﺮ ﻣﻦ اﻟﺄﺣﻴﺎن أن ﻳﻄﻠﻊ ﻋﻠﻰ ﺻﻮرة ﺣﻘﻴﻘﻴﺔ ﻟﺘﺼﻤﻴﻢ اﻟﻤﻮﻗﻊ.",
					"content_align_text":"text-end",
					"content_video_url":"https://www.youtube.com/watch?v=Ve8MLhxB31k",
					"design_content_alignment":"flex-row"
	  			},...options};
	  			for (var index in options)this.contents[page][unique_id][type][index]= options[index];
			  	this.template_editor(page,unique_id,type);
			}

		},
		init_sortable: function(){
			console.log(document.getElementById('response-contaienr'));
			//var sortable = Sortable.create(document.getElementById('response-contaienr'));
		},
		change_aside_view: function(type){
			
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
		change_selected_component: function(page,unique_id,type){
			this.selected_page = page;
			this.selected_unique_id = unique_id;
			this.selected_type = type;
			this.selected_edit_wedgit=type;
			this.change_aside_view("edit_component");

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
		add_new_button: function(page,unique_id,type,button={
				'btn_type':'custom',
				'btn_text':"هنا عنوان الزر",
				'btn_color':'#0194fe',
				'btn_url':'',
				'btn_open':''
			}){
			this.change_selected_component(page,unique_id,type);
			this.contents[this.selected_page][this.selected_unique_id][this.selected_type]['buttons'].push(button);
		},
		upload_image: function(event){
			const the_event = event;
			var data_url =event.currentTarget.dataset.input;
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
				this.contents[this.selected_page][this.selected_unique_id][this.selected_type][data_url]= data.url;
		    });
		}
  	},
  	created: function(){
  		this.init_sortable();
  	}
  });

  app.mount('#builder-main-container');

</script>
@endsection
