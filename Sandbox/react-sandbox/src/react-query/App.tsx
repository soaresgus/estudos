import React from 'react';
import { Route, Routes } from 'react-router-dom';
import { NoQuery } from './example_2/NoQuery';
import { WithQuery } from './example_2/WithQuery';
import { Repo } from './pages/Repo';

export function App() {
  return (
    <Routes>
      <Route path="/" element={<WithQuery />} />
      <Route path="/repo" element={<Repo />} />
    </Routes>
  );
}
