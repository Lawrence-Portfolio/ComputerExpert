export class ProductQuantity {
    selector: String
    constructor() {
        this.selector = 'input.product-quantity'
        this.init()
    }
    init() {
        document.querySelectorAll(`${this.selector}`).forEach(input => {
            if (input) {
                input.addEventListener('input', (e:any) => {
                    let value = e.target.value
                    if(value < 1 || value == '') {
                        e.target.value = '1'
                    }
                })
            }
        })
    }
}
