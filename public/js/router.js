"use strict"

const routes = [
    { path: '/', component: HomeController},
    { path : '/maison', component : MaisonController},
    {path : '/capteur', component: CapteurController}
]

const parseLocation = () => {
    let p = location.hash.slice(1).toLowerCase() || '/'
    let struct = p.toString().split(':')
    let params = false
    if (struct.length !== 1) {
           params = struct[1]
    }
    return {'path' : struct[0], 'params' : params}
}
const findComponentByPath = (path, routes) => {
    return routes.find(r => r.path.match(new RegExp(`^\\${path}$`, 'gm'))) || undefined;
}

const router = () => {
    const url_data = parseLocation();
    const { component = ErrorComponent } = findComponentByPath(url_data['path'], routes) || {};
    let controller = new component
    controller.load(url_data['params'])
  };