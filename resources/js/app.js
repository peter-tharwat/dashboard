import $ from 'jquery';
import favico from 'favico.js';
import toastr from 'toastr';
import { Fancybox } from "@fancyapps/ui";

import '/public/js/bootstrap.bundle.min.js';
/*import '/public/js/validatorjs.min.js';*/
import '/public/js/main.js';
/*import '/public/assets/js/theme.js';
import '/public/assets/js/plugins.js';*/



window.$ = window.jQuery = $;
window.Favico= favico;
window.Fancybox= Fancybox;
window.toastr= toastr;