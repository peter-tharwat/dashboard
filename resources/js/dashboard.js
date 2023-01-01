import $ from 'jquery';
import favico from 'favico.js';
import toastr from 'toastr';
import { Fancybox } from "@fancyapps/ui";
import select2 from 'select2';
select2();

window.$ = $;
window.Favico= favico;
window.toastr= toastr;
window.Fancybox= Fancybox;


import 'jquery-validation';
import '/public/js/bootstrap.bundle.min.js';
import '/public/js/main.js';
import '/public/js/main-dashboard.js';