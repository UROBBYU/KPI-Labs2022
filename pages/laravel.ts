import express from 'express'
import php from 'http-php'

module.exports = express.Router()

.all('*', (req, res, next) => {
    try {
        if (req.originalUrl == '/laravel') return res.redirect(301, '/laravel/')
        
        php('pages/laravel/public/index.php')(req, res)
    } catch (err) { next(err) }
})