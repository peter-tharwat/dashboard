import $ from 'jquery';
window.$ = window.jQuery = $;


import favico from 'favico.js';
import toastr from 'toastr';
import { Fancybox } from "@fancyapps/ui";
import select2 from 'select2';
/*import validate from 'jquery-validation';*/


import * as FilePond from 'filepond';
import 'filepond/dist/filepond.min.css';
import ar_AR from 'filepond/locale/ar-ar.js';
FilePond.setOptions(ar_AR);
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';

import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateType,
    FilePondPluginFileValidateSize
);
window.FilePond = FilePond;



window.Favico= favico;
window.toastr= toastr;
window.Fancybox= Fancybox;
select2();


import '/public/js/bootstrap.bundle.min.js';
import '/public/js/main.js';
import '/public/js/main-dashboard.js';