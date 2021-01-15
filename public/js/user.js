"use strict"

class User {

    data;
    cookies_name = "user_id_domotique"
    user_id = false

    constructor(func, login_page = false) {
        let logged = this.ifLogged()

        if (logged === false) {
            if (!login_page) window.location = 'login';
            func()
        } else {
            if (login_page) {
                window.location = '/'
            } else {
                this.user_id = logged
                this.getUserDataFromServer().then(func)
            }
        }
    }

    userData = (index) => {
        return this.data[index]
    }

    login = (user_id) => {
        alert('Bienvenu !')
        this.setAuthCookie(user_id)
    }

    setAuthCookie = (user_id) => {
        document.cookie = this.cookies_name + '=' + user_id
    }

    ifLogged = () => {

        let cookies = document.cookie.split(';')
        let result = false
        cookies.forEach((el) => {
            el = el.replace(' ', '')
            let vars = el.split('=')
            if (vars[0].toString() === this.cookies_name) {
                result = vars[1]
            }
        })
        return result
    }


    logout = () => {
        document.cookie = this.cookies_name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/';
        window.location.reload()
    }

    getUserDataFromServer = () => {
        return fetch(utils.getFullPath() + '/data/user.json?' + this.user_id).then(res => res.json()).then(res => {
            this.data = res['user']
        })
    }


}