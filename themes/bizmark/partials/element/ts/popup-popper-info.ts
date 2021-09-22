import { createPopper } from "@popperjs/core";

export class PopupPopperInfo {
    constructor() {
        this.init()
    }
    init() {
        document.querySelectorAll('.popper-container').forEach((item: any) => {
            let popcorn = item.querySelector('.popcorn');
            let tooltip = item.querySelector('.tooltip');
            popcorn.addEventListener('click', () => {
                popcorn.classList.toggle('active')
                tooltip.classList.toggle('show')
            })
            tooltip.addEventListener('mouseleave', (e: any) => {
                popcorn.classList.remove('active')
                tooltip.classList.remove('show')
            })
            document.addEventListener('click', (e: any) => {
                let isClickOutside : boolean = !tooltip.contains(e.target) && !popcorn.contains(e.target)
                if(isClickOutside) {
                    popcorn.classList.remove('active')
                    tooltip.classList.remove('show')
                }
            })
            createPopper(popcorn, tooltip, {
                placement: 'right',
            });
        })
    }
}
