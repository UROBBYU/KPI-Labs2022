import express from 'express'
import fs from 'fs'
import php from 'http-php'

module.exports = express.Router()

.get('/', (req, res, next) => fs.createReadStream('pages/arrays/index.html').pipe(res.type('html')))

.all('/php', async (req, res, next) => php('pages/arrays/index.php')(req, res).catch(next))

.use('/st/', express.static('pages/arrays/static'))