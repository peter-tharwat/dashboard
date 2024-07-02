/**
 * app-academy-course Script
 */

'use strict';

// Datatable (jquery)

$(function () {
  // Select2
  var select2 = $('.select2');
  if (select2.length) {
    select2.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>').select2({
        dropdownParent: $this.parent(),
        placeholder: $this.data('placeholder'), // for dynamic placeholder
        dropdownCss: {
          minWidth: '150px' // set a minimum width for the dropdown
        }
      });
    });
    $('.select2-selection__rendered').addClass('w-px-150');
  }
});

//Media player

(function () {
  const videoPlayer = new Plyr('#guitar-video-player');

  const videoPlayer2 = new Plyr('#guitar-video-player-2');

  document.getElementsByClassName('plyr')[0].style.borderRadius = '4px';
  document.getElementsByClassName('plyr')[1].style.borderRadius = '4px';
  document.getElementsByClassName('plyr__poster')[0].style.display = 'none';
  document.getElementsByClassName('plyr__poster')[1].style.display = 'none';
})();
