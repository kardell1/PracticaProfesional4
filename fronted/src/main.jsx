import React from 'react'
import ReactDOM from 'react-dom/client'
import { Rutas } from './routes'
import { BrowserRouter } from 'react-router-dom'

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <BrowserRouter>
        <Rutas/>
    </BrowserRouter> 
  </React.StrictMode>,
)
