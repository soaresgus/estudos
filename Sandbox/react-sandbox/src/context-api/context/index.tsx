import React, { createContext, useState, useCallback } from 'react';
import { useLocalStorage } from 'react-use';

interface IUser {
  img: string;
  name: string;
}

interface IAppContext {
  user?: IUser;
  updateUser(user: IUser): void;
}

const AppContext = createContext<IAppContext>({
  user: undefined,
  updateUser: () => {},
});

const AppProvider = ({ children }: { children: JSX.Element }) => {
  const [data, setData] = useLocalStorage<IUser>('user-logged', undefined);

  const updateUser = useCallback((user: IUser) => {
    setData(user);
  }, []);

  return (
    <AppContext.Provider value={{ user: data, updateUser }}>
      {children}
    </AppContext.Provider>
  );
};

export { AppContext, AppProvider };
