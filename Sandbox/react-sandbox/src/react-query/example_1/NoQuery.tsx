import axios from 'axios';
import react, { useEffect, useState } from 'react';

export interface IUser {
  id: number;
  email: string;
  first_name: string;
  last_name: string;
  avatar: string;
}

async function getUser(id: number) {
  const request = await axios.get(`https://reqres.in/api/users/${id}?delay=1`);
  const response = await request.data;

  console.log(response);

  return response.data as IUser;
}

export function NoQuery() {
  const [currentUserId, setCurrentUserId] = useState(1);
  const [user, setUser] = useState<IUser>();
  const [isLoading, setIsLoading] = useState(false);
  const [isError, setIsError] = useState(false);

  useEffect(() => {
    setIsLoading(true);
    getUser(currentUserId)
      .then((user) => {
        setUser(user);
        setIsLoading(false);
      })
      .catch(() => {
        setIsError(true);
        setIsLoading(false);
      });
  }, [currentUserId]);

  if (!user || isLoading) {
    return (
      <section>
        <p>Loading...</p>
      </section>
    );
  }

  if (isError) {
    return (
      <section>
        <p>Something went wrong</p>
      </section>
    );
  }

  return (
    <section className="text-3xl">
      <img src={user.avatar} />
      <p>
        {user.first_name} ({user.id})
      </p>

      <p>Email: {user.email}</p>

      <div>
        <button
          onClick={() => {
            setCurrentUserId((prev) => prev - 1);
          }}
        >
          Prev
        </button>
        <button
          onClick={() => {
            setCurrentUserId((next) => next + 1);
          }}
        >
          Next
        </button>
      </div>
    </section>
  );
}
