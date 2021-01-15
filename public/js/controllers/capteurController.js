"use strict"

class CapteurController extends Controller {

    getData(id) {
        fetch(utils.getFullPath() + '/data/capteur.json?user_id=' + user.user_id + "&capteur_id=" + id).then(res => res.json()).then(res => {
            // TEMPORAIRE EN ATTENDANT UN VRAI BACK END
            let goodCapteur = false;
            for (let i in res['sensors']) {
                if (res['sensors'][i].id.toString() === id.toString()) {
                    goodCapteur = res['sensors'][i]
                }
            }
            window.data['capteur'] = goodCapteur
        })
    }

    async load(data) {
        this.animate().then(() => {
            this.getData(data)
            fetch(utils.getFullPath() + '/views/capteur.html')
                .then(res => res.text())
                .then(res => this.render(res));
        })
    }

}