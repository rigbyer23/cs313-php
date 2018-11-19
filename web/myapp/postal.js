
const express = require('express');
let app = express();
const path = require('path');



function calculateRate(req, res) {

    const type = req.query.operation;
    const weight = parseInt(req.query.weight);
    let total = 0;

    switch (type) {
        case "Letters(Stamped)":
            if (weight <= 1) {
                total = .50;
            }
            else {
                total = .50 + .21 * (weight - 1);
            }
            break;
        case "Letters(Metered)":
            if (weight <= 1) {
                total = .47;
            }
            else {
                total = .47 + .21 * (weight - 1);
            }
            break;
        case "Large Envelopes(Flats)":
            if (weight <= 1) {
                total = 1;
            }
            else {
                total = 1 + .21 * (weight - 1);
            }
            break;
        case "First-Class Package Service--Retail":
            if (weight <= 4) {
                total = 3.50;
            }
            else if (weight <= 8) {
                total = 3.75;
            }

            else {
                total = 3.75 + .35 * (weight - 8);
            }
            break;
        default:
            result = "YOU LOSE";
            break;
    }

    res.render('./ejpost', { result: total });
}


app.get('/ejpost', calculateRate);
app.get('/', function load(req, res) {
    res.sendFile(path.join(__dirname + '/postal.html'));
})
app.set('view engine', 'ejs');
app.set('views', __dirname);
app.listen(8080);
console.log('8080 is the magic port');