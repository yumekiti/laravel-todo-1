import { VFC } from 'react';
import axios from 'axios';

const Signin: VFC = () => {

  const login = () => {
    const formData = {
      email: 'test1@test.jp',
      password: 'testtest',
    }
    axios.get('/api/csrf-cookie').then(() => {
      axios
        .post('/api/users/login', formData)
        .then(res => (console.log(res.data)))
    });
  }

  const getUser = () => {
    axios
      .get('/api/users')
      .then(res => (console.log(res.data)))
  }

  return (
    <>
      <h2>signin</h2>
      <p>signin des</p>
      <button onClick={() => login()}>login</button>
      <button onClick={() => getUser()}>get user</button>
    </>
  );
};
export default Signin;
