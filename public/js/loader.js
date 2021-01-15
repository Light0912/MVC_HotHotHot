"use strict"

class Loader {

    showContent() {
        return new Promise((res, rej) => {
            document.getElementById('loader').classList.add('loader-out')
            setTimeout(() => {
                let el = document.getElementById('content-embeded')
                el.classList.remove('content-out')
                res()
                el.classList.add('content-in')
            }, 500)
        })
    }

    show(div) {
        return new Promise((mainRes, mainRej) => {
            let el = document.getElementById('content-embeded')
            el.classList.remove('content-in')
            let p = new Promise((res, rej) => {
                el.classList.add('content-out')
                setTimeout(() => {
                    res()
                }, 300)
            }).then(() => {
                el.innerHTML = '<div id="loader" class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>'
                document.getElementById('loader').classList.add('loader-in')
                mainRes()
            }) 
        })
    }

}