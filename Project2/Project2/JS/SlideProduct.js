
var owl = $('.owl-carousel');
owl.owlCarousel({
    items: 5,
    loop:true,
    margin:20,
    autoplay:true,
    autoplayTimeout:4000,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
            nav:false
        },
        601:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:false,
            loop:true
        }
    }
});

