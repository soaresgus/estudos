import axios from 'axios';
import { useQuery } from '@tanstack/react-query';
import { Link } from 'react-router-dom';

export interface IRepo {
  full_name: string;
  description: string;
}

export function Repos() {
  const { data: repositories, isFetching } = useQuery<IRepo[]>(
    ['repos'],
    async () => {
      const response = await axios.get(
        'https://api.github.com/users/soaresgus/repos'
      );

      return response.data;
    },
    {
      staleTime: 1000 * 60, //1 minute
    }
  );

  return (
    <ul>
      {isFetching && <p>Loading...</p>}
      {repositories?.map((repo) => {
        return (
          <li key={repo.full_name}>
            <Link to={`repo/${repo.full_name.replace('/', '-')}`}>
              {repo.full_name}
            </Link>
            <p>{repo.description}</p>
          </li>
        );
      })}
    </ul>
  );
}
