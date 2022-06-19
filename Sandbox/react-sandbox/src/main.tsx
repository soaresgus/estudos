import React from 'react'
import ReactDOM from 'react-dom/client'
import { App } from './react-router/RoutesApp'

import { BrowserRouter } from 'react-router-dom'
import { Ficha } from './php-in-react/Ficha'

ReactDOM.createRoot(document.getElementById('root')!).render(
  <React.StrictMode>
    <BrowserRouter>
      <Ficha />
    </BrowserRouter>
  </React.StrictMode>
)
