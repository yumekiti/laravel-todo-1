import { useState, VFC } from 'react';
import axios from 'axios';

const Signin: VFC = () => {

  const login = () => {
    const formData = {
      email: 'test1@test.jp',
      password: 'testtest',
    }
    axios.get('localhost:8080/api/csrf-cookie').then(() => {
      axios
        .post('localhost:8080/api/users/login', formData)
        .then(res => (console.log(res.data)))
    });
  }
  return (
    <>
      <h2>signin</h2>
      <p>signin des</p>
      <button onClick={() => login()}>login</button>
    </>
  );
};
export default Signin;
