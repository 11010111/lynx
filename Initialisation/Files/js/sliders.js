/**
 * Base Initialisation for Gridelements Slider
 */
(function GridelementsSliders(self) {
    self.list = []

    let sliderContent = document.querySelectorAll('.slider-content')

    if (!sliderContent) {
        return
    }

    sliderContent.forEach(function(slider) {
        let flickity = new Flickity(slider, {
            // options
            cellAlign: 'left',
            cellSelector: '.slider-cell',
            contain: true
        });

        self.list.push(flickity)
    });

})(window.sliders = self);
