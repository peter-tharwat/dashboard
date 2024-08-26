import $ from 'jquery';
import favico from 'favico.js';
import toastr from 'toastr';
import { Fancybox } from "@fancyapps/ui";



import * as FilePond from 'filepond';
import 'filepond/dist/filepond.css';
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


import '/public/js/bootstrap.bundle.min.js';
/*import '/public/js/validatorjs.min.js';*/
import '/public/js/main.js';
/*import '/public/assets/js/theme.js';
import '/public/assets/js/plugins.js';*/



window.$ = window.jQuery = $;
window.Favico= favico;
window.Fancybox= Fancybox;
window.toastr= toastr;