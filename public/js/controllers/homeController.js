"use strict"

class HomeController extends Controller {



    async load(params) {
        this.animate().then(() => {
            fetch(utils.getFullPath() + '/views/home.html')
            .then(res => res.text())
            .then(res => this.render(res));
        })
    }




}