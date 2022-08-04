import React from 'react';

import { App } from './react-query/App';
import { AppProvider } from './context-api/context';

import { QueryClientProvider } from '@tanstack/react-query';
import { queryClient } from './react-query/services/queryClient';
import { BrowserRouter } from 'react-router-dom';

export function MainApp() {
  return (
    <React.StrictMode>
      <BrowserRouter>
        <QueryClientProvider client={queryClient}>
          <AppProvider>
            <App />
          </AppProvider>
        </QueryClientProvider>
      </BrowserRouter>
    </React.StrictMode>
  );
}
