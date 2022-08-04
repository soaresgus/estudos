import React from 'react';
import { App } from './auth/App';

export function CleanApp() {
  return (
    <React.StrictMode>
      <App />
    </React.StrictMode>
  );
}
