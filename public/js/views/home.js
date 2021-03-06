(() => {

   "use strict"

   // let searchArticle = (path) => {
   //    let result = false
   //    path.forEach((el) => {
   //       if (el.tagName !== undefined && el.tagName.toLowerCase() === 'article' && el.classList.contains('devices') && el.hasAttribute('sensor_id')) {
   //          result = el
   //       }
   //    })
   //    return result
   // }



   let createSensor = (parent, sensor) => {
      let article = document.createElement('article')
      article.classList.add('devices')
      article.setAttribute('sensor_id', sensor.id)

      let header = document.createElement('header')
      header.classList.add('main-info')

      let ul = document.createElement('ul')

      let li_logo = document.createElement('li')
      li_logo.classList.add('capteur-logo')

      let logo = document.createElement('img')
      logo.src = '/assets/images/icons/temperature.svg'

      li_logo.appendChild(logo)
      ul.appendChild(li_logo)

      let li_name = document.createElement('li')
      li_name.classList.add('capteur-name')

      let h3 = document.createElement('h3')
      h3.innerText = sensor.name

      let separator = document.createElement('aside')
      separator.classList.add('separator')
      separator.innerText = '/'


      let separator2 = document.createElement('aside')
      separator2.classList.add('separator')
      separator2.innerText = '/'
      separator2.classList.add('remove-mobile')

      let h4 = document.createElement('h4')
      h4.classList.add('capteur-value')
      h4.innerText = sensor.current_value + sensor.value_type

      let h5 = document.createElement('h5')
      h5.classList.add('remove-mobile')
      h5.innerText = "Il y a " + utils.getTimeFrom(sensor.last_update).toString()

      li_name.appendChild(h3)
      ul.appendChild(li_name)
      header.appendChild(ul)
      article.appendChild(header)
      article.appendChild(separator)
      article.appendChild(h4)
      article.appendChild(separator2)
      article.appendChild(h5)

      parent.appendChild(article)

      article.addEventListener('click', (e) => {
         let el = searchArticle(e.path)
         window.location.hash =  '/capteur:' + el.getAttribute('sensor_id')
      })
   }
   let widget = document.getElementById('widget')
   let ws = new WebSocket("wss://ws.hothothot.dog:9502")

   ws.onopen = function (event){
      console.log(event);
      ws.send('Bonjour')
   }

   ws.onerror = function (event){
      console.log(event);
   }

   ws.onmessage = function (event){

      let data = JSON.parse(event.data)

      var xhttp = new XMLHttpRequest();

      xhttp.open("POST", utils.getFullPath() + '/insertData', true);
      xhttp.setRequestHeader("Content-Type", "application/json");
      xhttp.send(JSON.stringify(data));

      widget.innerHTML = "";
      console.log(event.data);
      data = data["capteurs"]
      for (let i = 0 ; i < data.length; ++i){
         let parsed = {name: data[i]['Nom'], type: "temp", current_value: data[i]["Valeur"], value_type: "°C", last_update: data[i]["Timestamp"], id: data[i]['Nom']}
         createSensor(widget, parsed)
      }


   }

})()


