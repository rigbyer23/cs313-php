if (url.parse(request.url) == "/home") {
    response.write(<h1>Welcome to the homepage</h1>)
}
else if (url.parse(request.url) == "/getData") {
    response.write({ "name": "Br. Burton", "class": "cs313" })
}
else {
    response.writeHead(404, { "Content-Type": "text/html" });
}