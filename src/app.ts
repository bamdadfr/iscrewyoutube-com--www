import express from 'express'
import cors from 'cors'
import cookieParser from 'cookie-parser'
import createError from 'http-errors'

const App = express ()
const port = 3000

App.use (express.json ())

App.use (express.urlencoded ({ 'extended': false }))

App.use (cookieParser ())

App.use (cors ())

App.get ('/', (_req, res) => {
  
    res.send ({
        'success': true,
        'message': 'Hello',
    })
  
})

App.get ('/watch', (req, res) => {
    
    const { v } = req.query
    
    if (v) {

        res.redirect ('https://screwmycode.in/youtube/' + v)
    
    } else {

        res.send ({
            'success': true,
            'message': 'Hello /watch',
        })
    
    }
  
})

App.use ((_req, _res, next) => next (createError (404)))

App.listen (port, () => {
  
    // eslint-disable-next-line no-console
    console.log (`Example app listening at http://localhost:${port}`)
  
})
