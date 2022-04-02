import express from 'express'

module.exports = express.Router()

.get('/', (req, res, next) => {
    require('http-php')('pages/mssql/index.php')(req, res)
    .catch(next)
})