import express from 'express'
import fs from 'fs'
import php from 'http-php'

module.exports = express.Router()

.get('/', (req, res, next) => {
    res.type('html')
    fs.createReadStream('pages/mssql/index.html').pipe(res)
})

.all('/php', async (req, res, next) => php('pages/mssql/index.php')(req, res).catch(next))

.use('/st/', express.static('pages/mssql/static'))