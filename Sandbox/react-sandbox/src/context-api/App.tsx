import React, { useContext, useEffect } from 'react';

import { HomePage } from './pages/HomePage';

import { AppContext } from './context/index';
import { useAppContext } from './hooks/useAppContext';

export function App() {
  const context = useAppContext();

  useEffect(() => {
    console.log('alterado');
  }, [context.user]);

  return (
    <>
      <HomePage />
      <h1>Usuário logado: {context.user?.name}</h1>
    </>
  );
}
