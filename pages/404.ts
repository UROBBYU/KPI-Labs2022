import express = require('express')

module.exports = ((req, res) => {
    res.status(404)

    res.format({
        html() {
            res.send(`
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>404 | File Not Found</title>
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
                            width: 52vmin;
                            text-align: center;
                            margin: 50vh 50vw;
                            translate: -50% -50%;
                            color: #fff;
                            text-shadow: 5px 4px 3px #000;
                        }
                        span {
                            color: #f6b411;
                        }
                    </style>
                </head>
                <body>
                    <div><span>404</span> | File Not Found</div>
                </body>
                </html>`)
        },

        json() {
            res.json({ error: 'Not found' })
        },

        text() {
            res.send('Not found')
        }
    })
}) as express.RequestHandler