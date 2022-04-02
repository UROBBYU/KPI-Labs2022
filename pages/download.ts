import express from 'express'

module.exports = express.Router()

.get('/test', (req, res, next) => {
    try {
        res.download('./pages/static/img/Ashe.svg', 'yourfile.svg')
    } catch (err) { next(err) }
})