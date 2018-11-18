const http = require('http');


let server = http.createServer(onRequest);
server.listen(8888);


function onRequest(request, response) {
    if (request.url == "/home") {
        response.writeHead(200, { "Content-Type": "text/html" });
        response.write('<html><body><h1>Welcome to the homepage</h1></body></html>');
        response.end();
    }
    else if (request.url == "/getData") {
        response.writeHead(200, { "Content-Type": "application/json" });
        response.write('{ "name": "Br. Burton", "class": "cs313" }');
        response.end();
    }
    else {
        response.writeHead(404, { "Content-Type": "text/html" });
        response.write("<html>STATUS: 404, Page Not Found</html>");
        response.end();
    }

}