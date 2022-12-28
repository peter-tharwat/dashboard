import $ from 'jquery';
import favico from 'favico.js';
import toastr from 'toastr';
import { Fancybox } from "@fancyapps/ui";




window.$ = window.jQuery = $;
window.Favico= favico;
window.Fancybox= Fancybox;
window.toastr= toastr;

var favicon = new Favico({
    bgColor: '#dc0000',
    textColor: '#fff',
    animation: 'slide',
    fontStyle: 'bold',
    fontFamily: 'sans',
    type: 'circle'
});