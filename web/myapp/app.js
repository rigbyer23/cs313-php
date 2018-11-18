const express = require('express')
const app = express()
const port = 3000

app.get('/', (req, res) => res.send("Hello World!"))

app.post('/home', (req, res) => res.send("Using a post request"))
prompt.delete('/user', (req, res) => res.send("Got a delete request at /user"))

app.listen(port, () => console.log(`Example app listening on port ${port}!`)
)

