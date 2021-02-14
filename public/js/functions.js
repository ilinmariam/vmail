 synth = window.speechSynthesis;
 pitch = 1
 rate = 0.9

function say(message) {

     synth.cancel();
    recognition.stop();

    var utterThis = new SpeechSynthesisUtterance(message);
    utterThis.pitch = pitch;
    utterThis.rate = rate;
    synth.speak(utterThis);

    return;
}

 window.SpeechRecognition = window.webkitSpeechRecognition || window.SpeechRecognition;
 const recognition = new SpeechRecognition();

function listenEmailBody(element) {

    synth.cancel();
    recognition.stop();
    bodyText = element.val();

    recognition.continuous = true;

     if (!bodyText || bodyText.length < 1 || speechToText === '') {
         bodyText = '';
     } else {
         bodyText += ' ';
     }

     recognition.start();

     recognition.onresult = (event) => {

         current = event.resultIndex;

        transcript = event.results[current][0].transcript;

        bodyText += transcript;

         element.val(bodyText);
     }

    recognition.onspeechend = function () {
        say('End of message');
    }

    recognition.onerror = function () {
        say('Try again');
        emailBody.val('');
        emailBody.focus();
    }

 }

 function listenInput(element) {

     synth.cancel();
     recognition.stop();
     speechToText = '';

     recognition.start();

     recognition.onresult = (event) => {

          current = event.resultIndex;

          transcript = event.results[0][0].transcript;

         speechToText = transcript;

         if (!speechToText || speechToText.length < 1 || speechToText === '') {
             say('Try again.');
             element.focus();
         } else {
             element.val(speechToText);
             say('Your input was : ' + speechToText);
         }

     }

     recognition.onspeechend = function () {

         say('Your input was : ' + element.val());
     }

     recognition.onerror = function () {
         say('Try again.');
         element.focus();
     }
 }
