import axios from 'axios';
import { useFetch } from './hooks/useFetch';

interface IRepo {
  full_name: string;
  description: string;
}

export function NoQuery() {
  const { data: repositories, isFetching } = useFetch<IRepo[]>(
    'users/soaresgus/repos'
  );

  return (
    <ul>
      {isFetching && <p>Loading...</p>}
      {repositories?.map((repo) => {
        return (
          <li key={repo.full_name}>
            <strong>{repo.full_name}</strong>
            <p>{repo.description}</p>
          </li>
        );
      })}
    </ul>
  );
}
