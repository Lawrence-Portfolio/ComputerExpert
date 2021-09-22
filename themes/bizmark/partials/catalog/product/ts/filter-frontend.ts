import noUiSlider from 'nouislider'
export class FilterFrontend {
    constructor() {
        this.initDropdownCategories()
        this.initFullListCategories()
        this.initRangeSlider()
        this.initBtnShowCategory()
    }
    initDropdownCategories() {
        let container = document.querySelector('.filter-container')
        let items = container.querySelectorAll('.filter-item')
        items.forEach(item => {
            let button = item.querySelector('.item-trigger')
            button.addEventListener('click', () => {
                item.classList.toggle('active')
            })
        })
    }
    initFullListCategories () {
        let hiddenRadioButtons = document.querySelectorAll('.radio-group.hidden-group')
        let button = document.querySelector('.btn-filter-show-more')
        let span = button.querySelector('span')
        let buttonShowText = button.getAttribute('data-show-text')
        let buttonHiddenText = button.getAttribute('data-hidden-text')

        button.addEventListener('click', () => {
            let spanText = span.textContent
            span.innerText = spanText == buttonShowText ? buttonHiddenText : buttonShowText
            hiddenRadioButtons.forEach(item => {
                item.classList.toggle('show')
            })
        })
    }
    initRangeSlider () {
        let inputMin : HTMLInputElement = document.querySelector('#input-min-value')
        let inputMax : HTMLInputElement = document.querySelector('#input-max-value')

        let range : any = document.querySelector('.price-range')
        let minValue : number = Number(document.querySelector('.price-range-wrap').getAttribute('data-min-value'))
        let maxValue : number = Number(document.querySelector('.price-range-wrap').getAttribute('data-max-value'))

        let rangeSlider = noUiSlider.create(range, {
            start: [minValue, maxValue],
            connect: true,
            range: {
                min: minValue,
                max: maxValue
            }
        })

        rangeSlider.on('update', (values, handle) => {
            let minValue = String(values[0])
            let maxValue = String(values[1])
            inputMin.value = minValue.substring(0, minValue.length-3)
            inputMax.value = maxValue.substring(0, maxValue.length-3)
        });
        inputMin.addEventListener('change', () => {
            let inputMinValue = Number(inputMin.value)
            let inputMaxValue = Number(inputMax.value)
            range.noUiSlider.updateOptions({
                start: [inputMinValue, inputMaxValue]
            });
        })
        inputMax.addEventListener('change', () => {
            let inputMinValue = Number(inputMin.value)
            let inputMaxValue = Number(inputMax.value)
            range.noUiSlider.updateOptions({
                start: [inputMinValue, inputMaxValue]
            });
        })
        let filterForm : HTMLFormElement = document.querySelector('.filter-form')
        filterForm.reset()
    }
    initBtnShowCategory () {
        let allCheckBoxInput = document.querySelectorAll('.filter-form input[type="checkbox"]')
        let btnShowCategory : any = document.querySelector('.btn-show-category')
        let container = document.querySelector('.filter-container')
        allCheckBoxInput.forEach(item => {
            item.addEventListener('input', (e: any) => {
                let containerTopDistance = container.getBoundingClientRect().top
                let elementTopDistance = e.target.getBoundingClientRect().top
                let buttonHeight = btnShowCategory.offsetHeight
                let scrollDistance = Math.abs(containerTopDistance - elementTopDistance + 6);
                btnShowCategory.style.top = scrollDistance + 'px'
                btnShowCategory.classList.add('show')
            })
        })
        document.addEventListener('click', (e: any) => {
            let isClickOutside : boolean = !btnShowCategory.contains(e.target)
            if(isClickOutside) {
                btnShowCategory.classList.remove('show')
            }
        })
    }
}
