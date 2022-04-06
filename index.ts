import express from 'express'
import cors from 'cors'
import https from 'https'
import fs from 'fs'

https.createServer({
    key: fs.readFileSync('D:/Programming/Web/certs/urepo.online.key', 'utf8'),
    cert: fs.readFileSync('D:/Programming/Web/certs/urepo.online.pem', 'utf8'),
}, express()
    .use('/paypal/', require('./pages/paypal'))

    .use(cors({
        origin: [
            'https://urepo.online',
            'https://urepo.com.ua',
            'https://server.urepo.com.ua',
            'https://urobbyu.github.io'
        ],
        credentials: true,
        optionsSuccessStatus: 200
    }))

    .use(express.urlencoded({
        extended: true,
        type: 'urlencoded'
    }))

    .use(express.json({
        type: 'application/json'
    }))
    
    .use(express.text({
        type: 'text/plain'
    }))

    .use('/', require('./pages/main'))

    .use('/st/', express.static('pages/static'))

    .use('/download/', require('./pages/download'))

    .use('/calc/', require('./pages/calc'))

    .use('/phpinfo/', require('./pages/phpinfo'))

    .use('/arrays/', require('./pages/arrays'))

    .use('/mssql/', require('./pages/mssql'))

    .get('/favicon.ico', require('./pages/favicon'))

    .use(require('./pages/404'))

    .use(((err, req, res, next) => {
        console.error(`We got some error here [${req.method} ${req.path}]:\n${err.stack}`)
        res.redirect('/error')
    }) as express.ErrorRequestHandler)
).listen(443, () => {
    console.log(`https://urepo.online is listening...`)
})