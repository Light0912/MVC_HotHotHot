"use strict"

class Controller {

    animate() {
        return loader.show('content-embeded')
    }

    resetJSInjector () {
        let js = document.getElementsByClassName('js-inject')
        Array.from(js).forEach((el) => {
            el.remove()
        })
    }

    addJsInjector(src) {
        let js = document.createElement('script')
        js.src = src
        js.classList.add('js-inject')
        document.querySelector('head').appendChild(js)
    }

    JSInjector(data) {
        this.resetJSInjector()
        let srcRegEx = /<script\b[^>]*>([\s\S]*?)<\/script>/gm;
        let matches = data.toString().match(new RegExp(srcRegEx))
        if (matches != null && matches.length > 0 ) {
            matches.forEach((el) => {
                let src = ""
                let source_position = el.indexOf('src="')
                src = el.substr(source_position)
                src = src.replace('src="', '')
                src = src.substr(0, src.indexOf('"'))
                this.addJsInjector(src)
            })
        }

    }

    render (data) {
        loader.showContent().then(() =>  {
            document.getElementById('content-embeded').innerHTML = data
            this.JSInjector(data)
        })
    }

}