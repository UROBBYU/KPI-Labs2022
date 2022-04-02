import express = require('express')
import fs = require('fs')
import https = require('https')
import qs = require('qs')
import stream = require('stream')

const streamToBuffer = (str: stream.Readable) => new Promise<Buffer>((res, rej) => {
    const chks: Buffer[] = []
    str.on('data', chk => chks.push(Buffer.from(chk)))
    .on('error', rej)
    .on('end', () => res(Buffer.concat(chks)))
})

module.exports = express.Router()

.get('/', (req, res, next) => {
    fs.readFile('pages/paypal/index.html', {
        encoding: 'utf8'
    }, (err, data) => {
        if  (err) return next(err)
        res.type('html').send(data)
    })
})

.post('/notify', async (req, res, next) => {
    console.log('Got PayPal notification!')
    const body = await streamToBuffer(req)
    console.log('Body:', qs.parse(body.toString()))

    res.sendStatus(200)

    const response = Buffer.concat([Buffer.from('cmd=_notify-validate&'), body])

    https.request('https://ipnpb.sandbox.paypal.com/cgi-bin/webscr', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Content-Length': response.length,
            'User-Agent': 'NODE-IPN-VerificationScript'
        }
    })
    .on('error', err => console.error('There was an error:\n' + err.message))
    .once('response', res =>  res.on('data', data => console.log(data.toString())))
    .write(response)
})