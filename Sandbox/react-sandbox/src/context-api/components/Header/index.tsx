import React, { useEffect } from 'react';
import { useAppContext } from '../../hooks/useAppContext';
import { Avatar } from '../Avatar';

export function Header() {
  const context = useAppContext();

  async function getData() {
    await new Promise((resolve) => setTimeout(resolve, 2000));

    return {
      img: 'https://images.unsplash.com/photo-1484515991647-c5760fcecfc7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8Z3V5fGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60',
      name: 'Gustavo Soares',
    };
  }

  useEffect(() => {
    if (!context.user) {
      getData().then((data) => {
        context.updateUser(data);
      });
    }
  }, []);

  return (
    <>
      <h1>Esse é o header</h1>
      <Avatar />
    </>
  );
}
