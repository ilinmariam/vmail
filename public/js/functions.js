 synth = window.speechSynthesis;
 pitch = 1
 rate = 0.9
 beep = new Audio('/beep.mp3');

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

     if (!bodyText || bodyText.length < 1 || bodyText === '') {
         bodyText = '';
     } else bodyText += ' ';

    beep.play();
     recognition.start();

     recognition.onresult = (event) => {

         current = event.resultIndex;

        transcript = event.results[current][0].transcript;

        bodyText += transcript;

         if (!bodyText || bodyText.length < 1 || bodyText === '') {
             say('Try again');
             emailBody.focus();
         } else {
             element.val(bodyText);
         }
     }

    recognition.onspeechend = function () {
        beep.play();
        say('Your message was: ' + element.val());
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

    beep.play();

     recognition.start();

     recognition.onresult = (event) => {

          current = event.resultIndex;

          transcript = event.results[0][0].transcript;

         speechToText = transcript;

         if (!speechToText || speechToText.length < 1 || speechToText === '') {
             say('Try again.');
             element.focus();
         } else {
             beep.play();
             element.val(speechToText);
             say('Your input was : ' + speechToText);
         }

     }

     recognition.onspeechend = function () {
         beep.play();
         say('Your input was : ' + element.val());
     }

     recognition.onerror = function () {
         say('Try again.');
         element.focus();
     }
 }
