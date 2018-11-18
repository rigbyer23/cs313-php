app.get('/form', function (req, res) {
    res.render('pages/form');
});
app.get('/math', function (req, res) {
    console.log('you be at math page');
    var operation = req.query.operation;
    var operand1 = req.query.operand1;
    var operand2 = req.query.operand2;
    var result;
    switch (operation) {
        case "Divide":
            result = operand1 / operand2;
            break;
        case "Multiply":
            result = operand1 * operand2;
            break;
        case "Add":
            result = operand1 + operand2;
            break;
        case "Subtract":
            result = operand1 - operand2;
            break;
        default:
            result = "YOU LOSE";
            break;
    }
    console.log(result);
    res.render('pages/math', { result: result });
});

app.listen(8080);
console.log('8080 is the magic port');