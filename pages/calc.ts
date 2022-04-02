import express = require('express')
import fs = require('fs')

module.exports = express.Router()

.get('/', (req, res, next) => {
    fs.readFile('pages/calc/index.html', {
        encoding: 'utf8'
    }, (err, file) => {
        if (err) return next(err)
        res.send(file)
    })
})

.post('/post', (req, res, next) => {
    require('http-php')('pages/calc/index.php')(req, res)
    .catch(next)
})