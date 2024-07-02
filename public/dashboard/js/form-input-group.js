/**
 * Form Input Groups
 */

'use strict';

(function () {
  const speechToText = $('.speech-to-text'); // ! jQuery dependency for speech to text

  // Speech To Text
  if (speechToText.length) {
    var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
    if (SpeechRecognition !== undefined && SpeechRecognition !== null) {
      var recognition = new SpeechRecognition(),
        listening = false;
      speechToText.on('click', function () {
        const $this = $(this);
        recognition.onspeechstart = function () {
          listening = true;
        };
        if (listening === false) {
          recognition.start();
        }
        recognition.onerror = function (event) {
          listening = false;
        };
        recognition.onresult = function (event) {
          $this.closest('.form-send-message').find('.message-input').val(event.results[0][0].transcript);
        };
        recognition.onspeechend = function (event) {
          listening = false;
          recognition.stop();
        };
      });
    }
  }
})();
