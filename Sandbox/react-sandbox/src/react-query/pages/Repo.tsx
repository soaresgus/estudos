import { useQueryClient } from '@tanstack/react-query';
import { useParams } from 'react-router-dom';
import { IRepo } from './Repos';

export function Repo() {
  const { repo: currentRepo } = useParams();

  const queryClient = useQueryClient();

  async function handleChangeRepositoryDescription() {
    /* await queryClient.invalidateQueries(['repos']); */

    const previousRepos = queryClient.getQueriesData<IRepo[]>(['repos'])[0][1];

    if (previousRepos) {
      const nextRepos = previousRepos.map((repo) => {
        if (repo.full_name === currentRepo?.replace('-', '/')) {
          return { ...repo, description: 'Testando' };
        } else {
          return repo;
        }
      });
      queryClient.setQueryData(['repos'], nextRepos);
    }
  }

  return (
    <div>
      <h1>{currentRepo}</h1>
      <button onClick={handleChangeRepositoryDescription}>
        Alterar descrição
      </button>
    </div>
  );
}
