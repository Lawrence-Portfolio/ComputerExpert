export class SwitchProductList {
    constructor() {
        this.initDropdownFilter()
        this.initSwitchProductList()
    }
    initDropdownFilter() {
        let dropdown = document.querySelector('.switch-product-list .dropdown')
        let dropdownButton = dropdown.querySelector('.dropdown-button')
        let dropdownMenu = dropdown.querySelector('.dropdown-menu')
        dropdownButton.addEventListener('click', () => {
            dropdown.classList.toggle('active')
        })
        document.addEventListener('click', (e: any) => {
            let isClickOutside : boolean = !dropdownMenu.contains(e.target) && !dropdownButton.contains(e.target)
            if(isClickOutside) {
                dropdown.classList.remove('active')
            }
        })
    }
    initSwitchProductList() {
        let switchButtons = document.querySelectorAll('.switch-list-button')
        switchButtons.forEach(button => {
            button.addEventListener('click', (e:any) => {
                let currentTarget = e.currentTarget
                let toggleData = currentTarget.getAttribute('switch-toggle')
                let list = document.querySelector(`[switch-data="${toggleData}"]`)
                changeActiveList(currentTarget, list)
            })
        })
        function changeActiveList(button, list) {
            document.querySelectorAll('[switch-toggle]').forEach(item => {
                item.classList.remove('active')
            })
            document.querySelectorAll('[switch-data]').forEach((item : any) => {
                item.style.display = 'none'
            })
            button.classList.add('active')
            list.style.display = 'block'
        }
    }
}
