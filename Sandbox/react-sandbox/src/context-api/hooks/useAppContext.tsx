import React, { useContext } from 'react';

import { AppContext } from '../context';

export function useAppContext() {
  const context = useContext(AppContext);

  return context;
}
