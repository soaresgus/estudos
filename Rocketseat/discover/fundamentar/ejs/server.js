const express = require('express')
const app = express();

app.set('view engine', 'ejs');

app.get('/', (req, res) => {
    res.render('pages/index', { foo: 'foo' })
})

app.get('/about', (req, res) => {
    res.render('pages/about')
})

app.listen(8080);
console.log('HTTP server running on port 8080')