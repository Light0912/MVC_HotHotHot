(() => {
    "use strict"

    let parent = document.getElementById('widget')

    let searchDocumentation = (path) => {
        let result = false
        path.forEach((el) => {
            if (el.tagName !== undefined && el.tagName.toLowerCase() === 'li' && el.classList.contains('doc-li') && el.hasAttribute('documentation_id')) {
                result = el
            }
        })
        return result
    }

    let createNewElementInList = (ul, data) => {
        let li = document.createElement('li')
        li.innerHTML = '<strong>' + data.title + '</strong> (id : ' + data.id + ' )'
        li.style.cursor = 'pointer'
        li.classList.add('doc-li')
        li.setAttribute('documentation_id', data.id)

        li.addEventListener('click', (e) => {
            let el = searchDocumentation(e.path)
            window.location.hash =  '/documentation:' + el.getAttribute('documentation_id')
        })

        ul.append(li)
    }

    console.log(window.data['documentation'])

    if (window.data['documentation'].length !== undefined) {
        let ul = document.createElement('ul')
        window.data['documentation'].forEach((el) => {
            createNewElementInList(ul, el)
        })
        parent.append(ul)
    } else {
        document.getElementById('back').style.display = 'block'
        let article = document.createElement('article')

        let d =  window.data['documentation']
        let h1  = document.createElement('h1')
        h1.innerText = d.title

        let p = document.createElement('p')
        p.innerText = d.content


        article.append(h1, p )
        parent.append(article)
    }



})()


