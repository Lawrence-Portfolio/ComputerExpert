const ModalVideo = require('modal-video');

export class VideoModal {
    selector : string
    constructor(selector = '.video-modal-btn') {
        this.selector = selector
    }
    init() {
        document.querySelectorAll(`${this.selector}`).forEach((item, index) => {
            new ModalVideo(`[data-video-count="${index}"]`)
        })
    }
    initOne() {
        new ModalVideo(this.selector)
    }
}
