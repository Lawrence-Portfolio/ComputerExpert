import Swiper, { Navigation, Thumbs, EffectFade } from 'swiper'
Swiper.use([Navigation, Thumbs, EffectFade]);

export class ProductSlider {
    sliderSelector: String
    thumbSliderSelector: String
    constructor() {
        this.sliderSelector = '.product-slider'
        this.thumbSliderSelector = '.product-slider-thumb'
        this.init()
    }
    init() {
        let thumbSlider = new Swiper(this.thumbSliderSelector, {
            direction: "vertical",
            slidesPerView: 4,
            preventInteractionOnTransition: true,
            navigation: {
                nextEl: `${this.thumbSliderSelector} .swiper-button-next`,
                prevEl: `${this.thumbSliderSelector} .swiper-button-prev`
            },
        });
        let slider = new Swiper(this.sliderSelector, {
            effect: "fade",
            spaceBetween: 10,
            thumbs: {
                swiper: thumbSlider,
            },
        });
    }
}
