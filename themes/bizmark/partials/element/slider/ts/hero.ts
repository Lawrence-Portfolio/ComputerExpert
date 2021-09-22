import Swiper, { Navigation, Pagination } from 'swiper'
Swiper.use([Navigation, Pagination]);

export class HeroSlider {
    selector: string
    constructor() {
        this.selector = '.hero-slider'
        this.init()
    }
    init() {
        let slider = new Swiper(this.selector, {
            navigation: {
                nextEl: `${this.selector} .swiper-button-next`,
                prevEl: `${this.selector} .swiper-button-prev`,
            },
            pagination: {
                el: `${this.selector} .swiper-pagination`,
                clickable: true,
            },
        })
    }
}
