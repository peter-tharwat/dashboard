import $ from 'jquery';
window.$ = window.jQuery = $;


import favico from 'favico.js';
import toastr from 'toastr';
import { Fancybox } from "@fancyapps/ui";
import select2 from 'select2';
/*import validate from 'jquery-validation';*/

window.Favico= favico;
window.toastr= toastr;
window.Fancybox= Fancybox;
select2();


import '/public/js/bootstrap.bundle.min.js';
import '/public/js/main.js';
import '/public/js/main-dashboard.js';