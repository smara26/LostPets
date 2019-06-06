let url = require('url');
let fs = require('fs');
 
html = {
    render(path, response) {
        fs.readFile(path, null, function (error, data) {
            if (error) {
                response.writeHead(404);
                response.write('file not found');
            } else {
                response.write(data);
            }
            response.end();
        });
    }
}
module.exports = {
    handleRequest(request, response) {
        response.writeHead(200, {
            'Content-Type': 'text/html'
        });
        let path = url.parse(request.url).pathname;
        switch (path) {
            case '/':
                html.render('../Front/home/home.html', response);
                break;
            case '/login':
                html.render('../Front/login/login.html', response);
                break;
            case '/register':
                html.render('../Front/register/register.html', response);
                    break;
            case '/ads':
                html.render('../Front/ads-module/page/page/html', response);
                break;
            case '/ads/add':
                html.render('../Front/ads-module/add/add.html', response);
                break;
            case '/ads/:id':
                html.render('../Front/ads-module/ad/ad.html', response);
                break;
            case '/ads/:id/edit':
                html.render('../Front/ads-module/edit/edit.html', response);
                break;
            case '/statistics':
                html.render('../Front/statistics/statistics.html', response);
                break;
            default:
                response.writeHead(404);
                response.write('Route not found');
                response.end();
        }
    }
}