document.onreadystatechange = ev => {
    if (document.readyState == 'complete') {
        var scrollButton = document.querySelector('.scroll-button');
        
        if (scrollButton) {
            scrollButton.addEventListener('click', ev => {
                    scrollToTop()
                })

            document.addEventListener('scroll', () => {
                if (this.scrollY > 500) {
                    scrollButton.style.opacity = 1;
                    scrollButton.style.transform = 'scale(1)';
                } else {
                    scrollButton.style.opacity = 0;
                    scrollButton.style.transform = 'scale(.67)';
                }
            })
        }
    }
}

function openFind() {
    let nav = document.getElementById('navigation-buttons-0')
    let row = document.getElementById('find-row')

    nav.classList.remove('find-button-hide', 'find-button-show')
    row.classList.remove('find-button-show', 'find-button-hide')

    if (!nav.classList.contains('hidden')) {
        nav.classList.add('find-button-hide')
        setTimeout(() => {
            nav.classList.toggle('hidden')
            row.classList.toggle('hidden')
            row.classList.add('find-button-show')
        }, 799)
    }
    else {
        row.classList.add('find-button-hide')
        setTimeout(() => {
            row.classList.toggle('hidden')
            nav.classList.toggle('hidden')
            nav.classList.add('find-button-show')
        }, 799)
    }
}

function slider() {
    let items = document.querySelectorAll('.image-slider__item')
    let buttons = []
    let buttonsContainer = document.querySelector('.image-slider-buttons')

    console.log(items)

    let lastIndex = 0,
        current = 0


    for (let i = 0; i < items.length; i++) {
        let newButton = document.createElement('div')
        newButton.classList.add('image-slider__button')
        newButton.onclick = ev => {
            let currentButton = document.querySelector('.image-slider__button--active')
            currentButton.classList.remove('image-slider__button--active')            
            newButton.classList.add('image-slider__button--active')
            newButton.dataset.index = i
            if (lastIndex != -1) {
                items[lastIndex].classList.remove('image-slider__item--active')
                buttons[lastIndex].classList.remove('image-slider__button--active')
            }
            lastIndex = i
            items[lastIndex].classList.add('image-slider__item--active')
            buttons[lastIndex].classList.add('image-slider__button--active')
            current = lastIndex
        }
        buttons.push(newButton)
    }

    buttons.sort((a, b) => {
        return a.dataset.index - b.dataset.index
    }).forEach(v => {
        buttonsContainer.appendChild(v)
    })

    items[0].classList.add('image-slider__item--active')
    buttons[0].classList.add('image-slider__button--active')

    setInterval(() => {
        buttons[current].click()
        current = (current + 1) % items.length
    }, 10 * 1000)
}


function toggleModal() {
    let c = document.querySelector('.modal-container')

    c.classList.toggle('hidden')
    document.body.classList.toggle('stop-scrolling')

    if (!c.classList.contains('hidden')) {
        document.querySelectorAll('i.star-active').forEach(v => {
            v.classList.remove('star-active')
            v.classList.add('star')
        })
    }
}

function scrollToTop() {
    window.scrollTo({
        top: 0, behavior: 'smooth'
    })
}

function modal() {
    let list = document.querySelectorAll('i.star')
    list.forEach((v, i) => {
        v.addEventListener('click', ev => {
            for (let j = 0; j < list.length; j++) {
                const child = list[j]
                if (j <= i) {
                    child.classList.remove('star')
                    child.classList.add('star-active')
                }
                else {
                    child.classList.remove('star-active')
                    child.classList.add('star')
                }
            }
        })
    })
}

function preview() {
    let preview = document.querySelector('.preview')
    let list = document.querySelectorAll('.hover-preview')
    list.forEach(v => {
        let vCoords = v.getBoundingClientRect();

        v.addEventListener('mouseenter', ev => {
            if (!preview.classList.contains('hidden')) {
                return
            }
            let imageUrl = $(v).data('image'),
                name = $(v).data('name'),
                yearStart = $(v).data('start'),
                yearEnd = $(v).data('end');
            
            $('[name=preview-image]').attr('src', imageUrl)
            $('[name=preview-name]').html(name)
            $('[name=preview-years]').html(`${yearStart}-${yearEnd}`)

            let left = vCoords.left + 'px'
            let top = vCoords.bottom + 'px'
            preview.style.left = left
            preview.style.top = (parseInt(vCoords.bottom) + 10) + 'px'
            preview.classList.remove('hidden')
            setTimeout(() => {
                preview.style.top = top
                preview.style.opacity = 1
            }, .1)
        })
        v.addEventListener('mouseleave', ev => {
            preview.style.top = (parseInt(vCoords.bottom) + 10) + 'px'
            preview.style.opacity = 0
            setTimeout(() => {
                preview.classList.add('hidden')
            }, 300)
        })
    })
}


function gallery() {
    let main = document.querySelector('.image-gallery-main')
    document.querySelectorAll('.image-gallery__item').forEach(v => {
        v.addEventListener('click', ev => {
            main.src = v.querySelector('img').attributes.src.value
        })
    })
}

function slideMenu() {
    let buttons = document.querySelectorAll('.item-card .red-button')
    
    buttons.forEach(v => {
        v.querySelectorAll('.slide-menu .slide-menu__button').forEach(b => {
            b.onclick = ev => {
                v.querySelector('.slide-menu').classList.add('hidden')
                v.querySelector('.text-size-20').classList.remove('hidden')
            }
        })
    })
    
    buttons.forEach(v => {
        v.querySelector('.text-size-20').onclick = ev => {
            v.querySelector('.text-size-20').classList.add('hidden')
            v.querySelector('.slide-menu').classList.remove('hidden')
        }
    })


}

function changeLogin() {
    var register = document.querySelector('#register');
    var login = document.querySelector('#login');

    if (register.classList.contains('hidden')) {
        login.style.opacity = 0;
        setTimeout(() => {
            login.classList.toggle('hidden');
            register.classList.toggle('hidden');
            if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
                document.querySelector('.login-page-content').style.height = '383px';
            };
        }, 180);
        setTimeout(() => {
            register.style.opacity = 1;
            document.title = "Регистрация";
        }, 270);
    } else {
        register.style.opacity = 0;
        setTimeout(() => {
            register.classList.toggle('hidden');
            login.classList.toggle('hidden');
            if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
                document.querySelector('.login-page-content').style.height = '287px';
            };
        }, 180);
        setTimeout(() => {
            login.style.opacity = 1;
            document.title = "Войти";
        }, 270);
    }
}