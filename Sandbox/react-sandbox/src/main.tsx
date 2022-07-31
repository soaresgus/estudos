import React from 'react';
import ReactDOM from 'react-dom/client';

import { App } from './context-api/App';
import { AppProvider } from './context-api/context';

ReactDOM.createRoot(document.getElementById('root')!).render(
  <React.StrictMode>
    <AppProvider>
      <App />
    </AppProvider>
  </React.StrictMode>
);
