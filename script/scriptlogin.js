$(document).ready(function() {
    var navbar = $('.navbar');
    var navbarTextInner = $(navbar).find('.navcontainer');
    var headerSection = $('section.bg');
    var formContainer = $(headerSection).find('.form-container');

    var headerTimeLine = new TimelineMax({paused: true});
    var animateSpeed = 0.75;
    var easeIn = Circ.easeIn;
    var easeOut = Circ.easeOut;

    headerTimeLine.fromTo(headerSection, animateSpeed, /* ANIMAZIONE HEADER LOGIN*/
        {
            opacity: 0,
            ease: easeIn
        },
        {
            opacity: 1,
            ease: easeOut
        }
    ).fromTo(navbarTextInner, animateSpeed, /* ANIMAZIONE NAVBAR LOGIN*/
        {
            y: '100%',
            opacity: 0,
            ease: easeIn
        },
        {
            y: '0%',
            opacity: 1,
            ease: easeOut
        }
    ).fromTo(formContainer, animateSpeed, 
        {
            x: '-100%',
            opacity: 0,
            ease: easeIn
        },
        {
            x: '0%',
            opacity: 1,
            ease: easeOut
        }
    );

    headerTimeLine.play();
});