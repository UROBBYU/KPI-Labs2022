import express from 'express'
import fs from 'fs'

//* Main Page

module.exports = express.Router()

.get('/', (req, res, next) => {
    try {
        res.send(`
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Node.js</title>
            <style>
                body {
                    font-size: 10vh;
                }
            </style>
        </head>
        <body>
            <a href="/file">ЛА-02</a>
        </body>
        </html>
        `)
    } catch (err) { next(err) }
})

.get('/file', (req, res, next) => {
    fs.readFile('pages/main/index.html', {
        encoding: 'utf8'
    }, (err, file) => {
        if (err) return next(err)
        file = file.replace('<!--title-->', 'Node.js Autogen')
        .replace('<!--text-->', '<a href="/">ЛА-02</a>')
        res.send(file)
    })
})

.get('/error', (req, res) => {
    res.status(500)

    res.format({
        html() {
            res.send(`
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>500 | Internal Server Error</title>
                    <style>
                        @import url('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap');
                        body {
                            margin: 0;
                            overflow: hidden;
                            background-color: #222231;
                            filter: blur(0.4px);
                        }
                        div {
                            font-size: 10vmin;
                            font-family: 'M PLUS Rounded 1c', sans-serif;
                            width: 70vmin;
                            text-align: center;
                            margin: 50vh 50vw;
                            transform: translate(-50%, -50%);
                            color: #fff;
                            text-shadow: 5px 4px 3px #000;
                        }
                        span {
                            color: #e64227;
                        }
                    </style>
                </head>
                <body>
                    <div><span>500</span> | Internal Server Error</div>
                </body>
                </html>`)
        },

        json() {
            res.json({ error: 'Internal Server Error' })
        },

        text() {
            res.send('Internal Server Error')
        }
    })
})