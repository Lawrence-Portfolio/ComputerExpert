export class HeaderCatalogMenu {
    menuSelector: String
    burgerSelector: String
    constructor() {
        this.menuSelector = '.header__catalog-menu'
        this.burgerSelector = '.header__catalog-burger'
        this.initWidthMenu()
        this.initOpenCloseMenu()
    }
    initWidthMenu() {
        let list : any = document.querySelector(`${this.menuSelector} ul`)
        let listItems = list.querySelectorAll('li')
        let lastItem = listItems[listItems.length - 1]
        let newWidth = lastItem.offsetLeft - list.offsetLeft + lastItem.offsetWidth
        list.style.width = newWidth + 'px'
    }
    initOpenCloseMenu () {
        let burger = document.querySelector(`${this.burgerSelector}`)
        let menu = document.querySelector(`${this.menuSelector}`)
        burger.addEventListener('click', () => {
            menu.classList.toggle('show')
        })
        document.addEventListener('click', (e: any) => {
            let isClickOutside : boolean = !burger.contains(e.target)
            if(isClickOutside) {
                menu.classList.remove('show')
            }
        })
        menu.addEventListener('mouseleave', () => {
            menu.classList.remove('show')
        })
    }
}
