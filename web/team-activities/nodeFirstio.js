var fs = require('fs')
var file = fs.readFileSync(process.argv[2]);
var str = fileToString();

let count = 0;
for (let i = 0; i < str.length; i++) {

    if (str[i] == '/n') {
        count++;
    }
    return count;
}

