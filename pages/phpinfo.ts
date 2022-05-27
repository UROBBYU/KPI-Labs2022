import express from 'express'
// import php from 'http-php'
import php from '../../php-cgi/src'

const file_php = php({
    file: 'pages/phpinfo/index.php'
})
const env_php = php('pages/phpinfo/env/index.php')

module.exports = express.Router()

.all('*', (req, res, next) => {
    file_php(req, res).catch(next)
})

.all('/env', (req, res, next) => {
    try {
        env_php.sync(req, res)
    } catch (err) { next(err) }
})