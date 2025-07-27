@if($general_popup_plugin = $website_plugins->where('activated')->where('slug','general_popup')->first())
<div class="p-3 svg-animation general_popup_plugin_{{data_get($general_popup_plugin->settings,'popup_id',null )}}" style="position: fixed; left: 20px; bottom: -2000px; width: 450px; max-width: calc(-50px + 100vw); background: rgb(255, 255, 255); z-index: 10000; border-radius: 10px; box-shadow: rgba(10, 14, 29, 0.26) 0px 8px 13px 0px, rgba(119, 119, 119, 0.16) 0px 8px 64px 0px;transition: 0.5s all ease-in-out;">
    <style type="text/css">
        .general_popup_plugin_{{data_get($general_popup_plugin->settings,'popup_id',null )}}.show{
            bottom:20px!important;
        }
    </style>

    <div class="col-12 px-2 row d-flex align-items-center justify-content-center">
        <div class="col-10 px-0" style="color:#232323;font-size: 20px;font-weight: bold;">{{$general_popup_plugin->settings['title']??""}}</div>
        <div class="col-2 d-flex align-items-center px-0 justify-content-end" onclick="close_general_popup_plugin()" style="cursor:pointer;">
            <span class="fal fa-times-circle font-4" style="color: #bbb;"></span>
        </div>
    </div>

    <div class="col-12 p-2" style="color:#444;text-align: justify;font-size: 16px;">
        {{$general_popup_plugin->settings['description']??""}}
    </div>

    <div class="col-12 p-0">
        @if($genetal_popup_plugin_html_content = data_get($general_popup_plugin->settings,'html_content',null) )
            @if(is_countable(json_decode($genetal_popup_plugin_html_content,true)))
                @foreach(\MainHelper::arrayToObject(json_decode($genetal_popup_plugin_html_content,true)) as $component)
                    @include('components.component-render',['component'=>$component])
                @endforeach
            @endif
        @endif
    </div>
    
    @if($general_popup_plugin->settings['btn_url']??"" != "")
    <div class="col-12 p-2 d-flex align-items-end ">

        <a class="btn px-6 rounded col-12 general_popup_plugin_btn" onclick="close_general_popup_plugin()" href="{{$general_popup_plugin->settings['btn_url']??""}}" 

            onclick="close_general_popup_plugin()" 

            @if(data_get($general_popup_plugin->settings,'btn_url_in_new_tab',null))
            target="_blank" 
            @endif

             style="background: {{$settings['main_color']}};border-color: {{$settings['main_color']}};border-radius: 10px;color:#fff">
            {{$general_popup_plugin->settings['btn_text']??""}}
        </a>
    </div>
    @endif
</div>

<script type="text/javascript">
const popupId = '{{data_get($general_popup_plugin->settings,'popup_id',null )}}';
const popupKey = `popup_closed_${popupId}`;
const popupTimestampKey = `popup_closed_time_${popupId}`;
const reopenAfterHours = {{data_get($general_popup_plugin->settings,'reopen_after_hours',24 )}}; // Set the number of hours to reopen the popup



function close_general_popup_plugin() {
    localStorage.setItem(popupKey, 'true');
    localStorage.setItem(popupTimestampKey, Date.now());
    document.querySelector(`.general_popup_plugin_${popupId}`).style.display = 'none';
}

function shouldShowPopup() {
    const popupClosed = localStorage.getItem(popupKey) === 'true';
    const closedTimestamp = parseInt(localStorage.getItem(popupTimestampKey), 10);
    const hoursSinceClosed = (Date.now() - closedTimestamp) / (1000 * 60 * 60);
    return !popupClosed || hoursSinceClosed >= reopenAfterHours;
}

setTimeout(function() {
    if (shouldShowPopup()) {
        const popup = document.querySelector(`.general_popup_plugin_${popupId}`);
        if (popup) {
            popup.classList.add('show'); // Show the popup if it should be visible
            localStorage.removeItem(popupKey); // Reset state for future closures
        }
    }
}, {{data_get($general_popup_plugin->settings,'delay_to_show',3000 )}});
</script>


@endif
