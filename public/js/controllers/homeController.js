"use strict"

class HomeController extends Controller {

    getData() {
        fetch(utils.getFullPath() + '/data/home.json?user_id=4').then(res => res.json()).then(res => window.data['home'] = res)
    }

    async load(params) {
        this.animate().then(() => {
            this.getData()
            fetch(utils.getFullPath() + '/views/home.html')
            .then(res => res.text())
            .then(res => this.render(res));
        })
    }

}