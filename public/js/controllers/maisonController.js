"use strict"

class MaisonController extends Controller {

    async load (params) {
        this.animate().then(() => {
            fetch(utils.getFullPath() + '/views/maison.html')
            .then(res => res.text())
            .then(res => this.render(res));
        })  
    }

}