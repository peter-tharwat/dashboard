/**
 * Cards Actions
 */

'use strict';

(function () {
  const collapseElementList = [].slice.call(document.querySelectorAll('.card-collapsible'));
  const expandElementList = [].slice.call(document.querySelectorAll('.card-expand'));
  const closeElementList = [].slice.call(document.querySelectorAll('.card-close'));

  let cardDnD = document.getElementById('sortable-4');

  // Collapsible card
  // --------------------------------------------------------------------
  if (collapseElementList) {
    collapseElementList.map(function (collapseElement) {
      collapseElement.addEventListener('click', event => {
        event.preventDefault();
        // Collapse the element
        new bootstrap.Collapse(collapseElement.closest('.card').querySelector('.collapse'));
        // Toggle collapsed class in `.card-header` element
        collapseElement.closest('.card-header').classList.toggle('collapsed');
        // Toggle class ti-chevron-down & ti-chevron-right
        Helpers._toggleClass(collapseElement.firstElementChild, 'ti-chevron-down', 'ti-chevron-right');
      });
    });
  }

  // Card Toggle fullscreen
  // --------------------------------------------------------------------
  if (expandElementList) {
    expandElementList.map(function (expandElement) {
      expandElement.addEventListener('click', event => {
        event.preventDefault();
        // Toggle class ti-arrows-maximize & ti-arrows-minimize
        Helpers._toggleClass(expandElement.firstElementChild, 'ti-arrows-maximize', 'ti-arrows-minimize');

        expandElement.closest('.card').classList.toggle('card-fullscreen');
      });
    });
  }

  // Toggle fullscreen on esc key
  document.addEventListener('keyup', event => {
    event.preventDefault();
    //Esc button
    if (event.key === 'Escape') {
      const cardFullscreen = document.querySelector('.card-fullscreen');
      // Toggle class ti-arrows-maximize & ti-arrows-minimize

      if (cardFullscreen) {
        Helpers._toggleClass(
          cardFullscreen.querySelector('.card-expand').firstChild,
          'ti-arrows-maximize',
          'ti-arrows-minimize'
        );
        cardFullscreen.classList.toggle('card-fullscreen');
      }
    }
  });

  // Card close
  // --------------------------------------------------------------------
  if (closeElementList) {
    closeElementList.map(function (closeElement) {
      closeElement.addEventListener('click', event => {
        event.preventDefault();
        closeElement.closest('.card').classList.add('d-none');
      });
    });
  }

  // Sortable.js (Drag & Drop cards)
  // --------------------------------------------------------------------
  if (typeof cardDnD !== undefined && cardDnD !== null) {
    Sortable.create(cardDnD, {
      animation: 500,
      handle: '.card'
    });
  }
})();

// Card reload (jquery)
// --------------------------------------------------------------------
$(function () {
  const cardReload = $('.card-reload');
  if (cardReload.length) {
    cardReload.on('click', function (e) {
      e.preventDefault();
      var $this = $(this);
      $this.closest('.card').block({
        message:
          '<div class="sk-fold sk-primary"><div class="sk-fold-cube"></div><div class="sk-fold-cube"></div><div class="sk-fold-cube"></div><div class="sk-fold-cube"></div></div><h5>LOADING...</h5>',

        css: {
          backgroundColor: 'transparent',
          border: '0'
        },
        overlayCSS: {
          backgroundColor: $('html').hasClass('dark-style') ? '#000' : '#fff',
          opacity: 0.55
        }
      });
      setTimeout(function () {
        $this.closest('.card').unblock();
        if ($this.closest('.card').find('.card-alert').length) {
          $this
            .closest('.card')
            .find('.card-alert')
            .html(
              '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><span class="fw-medium">Holy grail!</span> Your success/error message here.</div>'
            );
        }
      }, 2500);
    });
  }
});
