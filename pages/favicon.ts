import express from 'express'
import fs from 'fs'

module.exports = ((req, res, next) => {
    fs.createReadStream('favicon.ico').pipe(res)
}) as express.RequestHandler