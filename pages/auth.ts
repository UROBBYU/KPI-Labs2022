import express from 'express'
import basicAuth from 'express-basic-auth'

module.exports = express.Router()

.use(basicAuth({
    authorizer: (username: string, password: string) => {
        console.log(username, password)
        return basicAuth.safeCompare(username, 'admin') && basicAuth.safeCompare(password, 'admin')
    },
    challenge: true
}))

.get('/', (req, res, next) => {
    try {
        res.send(`Hello there!`)
    } catch (err) { next(err) }
})