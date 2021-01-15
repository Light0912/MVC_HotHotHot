let oldCheck = []

let createAlert = (data) => {
    let li = document.createElement('li')
    let h2 = document.createElement('h2')
    h2.innerText = data.sensor_name
    let p = document.createElement('p')
    p.innerText = data.message
    let b = document.createElement('button')
    b.setAttribute('sensor_id', data.sensor_id)
    b.innerText = "Aller sur la page du capteur"
    b.addEventListener('click', (e) => {
        location.hash = '/capteur:' + e.target.getAttribute('sensor_id')
        hideAlertModal()
    })
    li.append(h2, p, b)
    alertUl.appendChild(li)
}

let checkAlert = () => {
    fetch(utils.getFullPath() + 'data/alerts.json?user_id=' + user.user_id).then(res => res.json()).then((res) => {
        res['alerts'].forEach((el) => {
            if (!oldCheck.includes(el)) {
                createAlert(el)
                oldCheck.push(el)
            }
        })
        alertCount.innerText = oldCheck.length.toString()
    })
}

checkAlert()