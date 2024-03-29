import React from 'react';
import ReactDOM from 'react-dom/client';

import { App } from './react-query/App';
import { AppProvider } from './context-api/context';

import { QueryClientProvider } from '@tanstack/react-query';
import { queryClient } from './react-query/services/queryClient';
import { BrowserRouter } from 'react-router-dom';
import { MainApp } from './MainApp';
import { CleanApp } from './CleanApp';

ReactDOM.createRoot(document.getElementById('root')!).render(<CleanApp />);
