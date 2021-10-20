$(document).ready(function() {
    $('.cameras').slick({
        infinite: true,
        slidesToShow: 8,
        slidesToScroll: 2,
        arrows: false,
        responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }
        ]
    });
});

// CUSTOM RANGE SLIDERS
// First find all our sliders
const slidersPurple = document.querySelectorAll('.range-slider-purple');
const slidersRed = document.querySelectorAll('.range-slider-red');

function initRange(sliderName, fillColor) {
    const settings = {
        fill: fillColor,
        background: '#e1e4e9'
    };

    const sliders = sliderName;
    // Iterate through that list of sliders
    Array.prototype.forEach.call(sliders, (slider) => {
        // Look inside our slider for our input add an event listener
        // the input inside addEventListener() is looking for the input action, we could change it to something like change
        var el = slider.querySelector('input');
        if (el) {
            el.addEventListener('input', (event) => {
                // 1. apply our value to the span
                slider.querySelector('span').innerHTML = event.target.value;
                // 2. apply our fill to the input
                applyFill(event.target);

                slider.querySelector('span').style.left = (event.target.value - 2.5) + '%';
            });
        }
        // Don't wait for the listener, apply it now!
        applyFill(slider.querySelector('input'));
    });

    // This function applies the fill to our sliders by using a linear gradient background
    function applyFill(slider) {
        // Let's turn our value into a percentage to figure out how far it is in between the min and max of our input
        if (slider) {
            const percentage = 100 * (slider.value - slider.min) / (slider.max - slider.min);
            // Our background color will change here
            const bg = `linear-gradient(90deg, ${settings.fill} ${percentage}%, ${settings.background} ${percentage + 0.1}%)`;
            slider.style.background = bg;
        }
    }
}

initRange(slidersPurple, "#9327a5");
initRange(slidersRed, "#ed5565");


var cw = $('.avatar-status').width();
$('.avatar-status').css({ 'height': cw + 'px' });