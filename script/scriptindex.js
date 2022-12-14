$(document).ready(function() {
    var navbar = $('.navbar');
    var navbarTextInner = $(navbar).find('.navcontainer');
    var headerSection = $('section.header');
    var imgContainer = $(headerSection).find('.img-container');
    var headerSectionTextInner = $(headerSection).find('.text-inner');

    var headerTimeLine = new TimelineMax({paused: true});
    var animateSpeed = 0.75;
    var easeIn = Circ.easeIn;
    var easeOut = Circ.easeOut;

    headerTimeLine.fromTo(headerSection, animateSpeed, /* ANIMAZIONE HEADER (TUTTO) INDEX*/
        {
            y: '1500', 
            opacity: 0,
            ease: easeIn
        },
        {
            y: '0', 
            opacity: 1,
            ease: easeOut,
            onComplete: function() {}
        }
    ).fromTo(navbarTextInner, animateSpeed, /* ANIMAZIONE NAVBAR INDEX*/
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
    ).fromTo(headerSectionTextInner, animateSpeed, /*ANIMAZIONE TESTO INDEX*/
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
    ).fromTo(imgContainer, animateSpeed, /*ANIMAZIONE IMMAGINE INDEX*/
        {
            opacity: 0,
            ease: easeIn
        },
        {
            opacity: 1,
            ease: easeOut
        }
    );

    headerTimeLine.play();
});