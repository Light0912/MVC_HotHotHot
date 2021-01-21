"use strict"

const username = document.getElementById('username')
const password = document.getElementById('password')
const button = document.getElementById('submit')

const buttonLoadingText = "Chargement en cour..."
const defaultButtonValue = "Connection"

const utils = new Utils()
let user = null

let onSubmit = () => {
    button.innerText = buttonLoadingText
    button.disabed = true
    fetch(utils.getFullPath() + '/data/login.json?username=' + username.value + '&password=' + password.value).then(res => res.json()).then((res) => {
        console.log(res)
        if (res['success'] === true) {
            user.login(res['user_id'])
            window.location.reload()
        } else {
            alert("Impossible de vous connecter")
            button.disabed = false
            button.innerText = defaultButtonValue
        }
    })
}

let init = () => {

    document.getElementById('login-form').addEventListener('submit', (e) => {
        e.preventDefault()
        onSubmit()
    })

    document.getElementById('submit').addEventListener('click', (e) => {
        e.preventDefault()
        onSubmit()
    })

}


user = new User(init, true);
