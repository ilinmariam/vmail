$(document).ready(function () {

    // sleep time expects milliseconds
    function sleep (time) {
        return new Promise((resolve) => setTimeout(resolve, time));
    }

    $('.nav-link').on('focus', function () {
       say($(this).text());
    });

    $('.dashboardLinks a').on('focus', function () {
        say($(this).text());
    });

    $('#dashboard').on('click', function () {
        say('Welcome to dashboard!');
    });

    $('input[name="name"]').on('focus', function () {
        say('Name');
        sleep(2000).then(() => {
            listenInput($(this));
        });
    });

    $('button, a.btn').on('focus', function () {
        say($(this).text());
    });

    $('#logOut').on('focus', function () {
        say('Log Out');
    });

    $('input[name="email"]').on('focus', function () {
        say('email user name');
        sleep(2000).then(() => {
            listenInput($(this));
        });
    });

    $('input[name="password"]').on('focus', function () {
        say('password');
        sleep(2000).then(() => {
            listenInput($(this));
        });
    });

    $('input[name="password_confirmation"]').on('focus', function () {
        say('password confirmation');
        // Usage!
        sleep(2000).then(() => {
            listenInput($(this));
        });

    });

    $('#emailBody').on('focus', function () {
        say('Email Body: ');
        sleep(2000).then(() => {
            listenEmailBody($(this));
        });

    });

    $('#emailSubject').on('focus', function () {
        say('Email subject: ');
        sleep(2000).then(() => {
            listenInput($(this));
        });

    });

    $('#emailTo').on('focus', function () {
        say('Email to username: ');
        sleep(2000).then(() => {
            listenInput($(this));
        });
    });

    $('.emailDetails').on('click', function () {
       let email = $('.card-body').text();
       say(email);
    });

    $('.emailRow').on('focus', function () {

        let from = $(this).children('td').eq(1).text();
        let subject = $(this).children('td').eq(2).text();

        say('Email from ' + from + ' about ' + subject);
    });

    $('.contactEmail').on('focus', function () {
       $email = $(this).text();
       say($email);
    });

    $('h3').on('focus', function () {
       say($(this).text());
    });
});
