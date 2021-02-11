"use strict"

class DocumentationController extends Controller {

    getData(params) {
        let url = utils.getFullPath() + 'api/docs'
        if (params !== false) {
            url = utils.getFullPath() + 'api/doc/' + params
        }
        fetch(url).then(res => res.json()).then(res => window.data['documentation'] = res)
    }

    async load(params) {
        this.animate().then(() => {
            this.getData(params)
            fetch(utils.getFullPath() + '/views/documentation.html')
                .then(res => res.text())
                .then(res => this.render(res));
        })
    }

}