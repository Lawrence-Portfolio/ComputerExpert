import { ProductSlider } from "../../../element/slider/ts/product";
import { VideoModal } from "../../../../build/js/classes/video-modal";

new ProductSlider()
new VideoModal().init()

class ProductCard {
    selector: string
    data: { title: string, price: number }[]
    renderContainerSelector: string
    inputEvent: any
    constructor() {
        this.selector = '.related-card-checkbox'
        this.renderContainerSelector = '.render-checkbox-container'
        this.data = []
        this.inputEvent = new Event('input')
        this.init()
    }
    init() {
        calculateDate()
        let _self = this
        document.querySelectorAll(`${this.selector}`).forEach(item => {
            let checkbox = item.querySelector('button.checkbox')
            let choiceBtn = item.querySelector('button.choice')
            checkbox.addEventListener('click', () => {
                choiseCard(item)
            })
            choiceBtn.addEventListener('click', () => {
                choiseCard(item)
            })
        })
        document.querySelector('input.product-quantity').addEventListener('input', (e: any) => {
            let quantity = Number(e.target.value)

            let productPrice : number = Number(e.target.getAttribute('data-product-price'))
            let productDiscountPrice : number = Number(e.target.getAttribute('data-product-discount-price'))

            let productPriceRenderElement : HTMLElement = document.querySelector('.product-price-render')
            let productDiscountPriceRenderElement : HTMLElement = document.querySelector('.product-price-discount-render')

            let productPriceElement : HTMLInputElement = document.querySelector('input.product-price')
            let productPriceDiscountElement : HTMLInputElement = document.querySelector('input.product-price-discount')

            productPriceElement.value = ''
            productPriceDiscountElement.value = ''

            productPriceElement.value = String(productPrice * quantity)
            productPriceDiscountElement.value = String(productDiscountPrice * quantity)

            productPriceRenderElement.innerHTML = String(productPrice * quantity)
            productDiscountPriceRenderElement.innerHTML = String(productDiscountPrice * quantity)

            calculateDate()
        })
        function choiseCard(card) {
            card.classList.toggle('active')
            updateData()
        }
        function updateData() {
            _self.data = []
            document.querySelectorAll(`${_self.selector}`).forEach(item => {
                if(item.classList.contains('active')) {
                    let title : string = item.getAttribute('data-title')
                    let price = Number(item.getAttribute('data-price'))
                    _self.data.push({
                        title,
                        price
                    })
                }
            })
            render()
        }
        function render() {
            let container = document.querySelector(_self.renderContainerSelector)
            container.innerHTML = ''
            _self.data.forEach(item => {
                let div = document.createElement('div')
                div.className = 'flex justify-between font-bold pb-15  related-product'

                let spanTitle = document.createElement('span')
                spanTitle.textContent = item.title
                spanTitle.className = 'mr-20'

                let spanPrice = document.createElement('span')
                spanPrice.className = 'min-w-max'
                spanPrice.textContent = String('€ ' + item.price)

                let inputTitle = document.createElement('input')
                inputTitle.type = 'hidden'
                inputTitle.name = 'title'
                inputTitle.value = item.title
                inputTitle.className = 'related-product-title'

                let inputPrice = document.createElement('input')
                inputPrice.type = 'hidden'
                inputPrice.name = 'price'
                inputPrice.value = String(item.price)
                inputPrice.className = 'related-product-price'

                div.appendChild(spanTitle)
                div.appendChild(spanPrice)
                div.appendChild(inputTitle)
                div.appendChild(inputPrice)
                container.appendChild(div)
            })
            calculateDate()
        }
        function calculateDate() {
            let relatedProductElements = document.querySelectorAll('.related-product')

            let discountInputElement : HTMLInputElement = document.querySelector('input.total-discount')

            let productPriceElement : HTMLInputElement = document.querySelector('input.product-price')
            let productPriceDiscountElement : HTMLInputElement = document.querySelector('input.product-price-discount')

            let totalPriceRenderElement : HTMLElement = document.querySelector('.total-price-render')
            let totalDiscountPriceRenderElement : HTMLElement = document.querySelector('.total-discount-price-render')
            let totalPriceInputElement : HTMLInputElement = document.querySelector('input.total-price-input')
            let totalDiscountPriceInputElement : HTMLInputElement = document.querySelector('input.total-discount-price-input')



            let additionalPrice = 0
            let discount : number = Number(discountInputElement.value) / 100
            let productPrice = Number(productPriceElement.value)
            let productPriceDiscount = Number(productPriceDiscountElement.value)

            relatedProductElements.forEach((item: any) => {
                let price = Number(item.querySelector('.related-product-price').value)
                additionalPrice += price
            })

            calculate(
                additionalPrice,
                productPrice,
                productPriceDiscount,
                discount,
                totalPriceRenderElement,
                totalDiscountPriceRenderElement,
                totalPriceInputElement,
                totalDiscountPriceInputElement
            )
        }
        function calculate(
            additionalPrice,
            productPrice,
            productPriceDiscount,
            discount,

            totalPriceOutput,
            totalPriceDiscountOutput,
            totalPriceOutputInput,
            totalPriceDiscountOutputInput,
        ) {
            let totalPrice = productPrice + additionalPrice
            totalPrice = totalPrice - (totalPrice * discount)

            let totalDiscountPrice = productPriceDiscount + additionalPrice
            totalDiscountPrice = totalDiscountPrice - (totalDiscountPrice * discount)

            totalPriceOutput.innerText = totalPrice
            totalPriceOutputInput.value = totalPrice

            totalPriceDiscountOutput.innerText = totalDiscountPrice
            totalPriceDiscountOutputInput.value = totalDiscountPrice
        }
    }
}
new ProductCard()
