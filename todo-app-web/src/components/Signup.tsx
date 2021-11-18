import { VFC } from 'react';
import { useForm, SubmitHandler } from 'react-hook-form';

type Inputs = {
  name: string;
  email: string;
  password: string;
  passwordConfirmation: string;
};

const Signup: VFC = () => {
  const { register, handleSubmit, watch, getValues } = useForm<Inputs>();
  const onSubmit: SubmitHandler<Inputs> = (data) => console.log(data);

  console.log(watch('name'));

  return (
    <form onSubmit={handleSubmit(onSubmit)}>
      <label htmlFor="name">
        名前：
        <input
          type="text"
          id="name"
          {...register('name', {
            required: {
              value: true,
              message: '名前を入力してください',
            },
            maxLength: {
              value: 16,
              message: '名前は16文字以内で入力してください',
            },
          })}
        />
      </label>
      <br />
      <label htmlFor="email">
        メールアドレス：
        <input
          type="text"
          id="email"
          {...register('email', {
            required: {
              value: true,
              message: 'メールアドレスを入力してください',
            },
            pattern: {
              value: /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/,
              message: '正しいメールアドレスを入力してください',
            },
          })}
        />
      </label>
      <br />
      <label htmlFor="password">
        パスワード：
        <input
          type="password"
          id="password"
          {...register('password', {
            required: {
              value: true,
              message: 'パスワードを入力してください',
            },
            maxLength: {
              value: 64,
              message: 'パスワードは64文字以内で入力してください',
            },
            minLength: {
              value: 6,
              message: 'パスワードは6文字以上で入力してください',
            },
            pattern: {
              value: /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/,
              message: '半角英数のみで入力してください',
            },
          })}
        />
      </label>
      <br />
      <label htmlFor="passwordConfirmation">
        パスワード確認：
        <input
          type="password"
          id="passwordConfirmation"
          {...register('passwordConfirmation', {
            required: {
              value: true,
              message: 'パスワードを入力してください',
            },
            maxLength: {
              value: 64,
              message: 'パスワードは64文字以内で入力してください',
            },
            minLength: {
              value: 6,
              message: 'パスワードは6文字以上で入力してください',
            },
            pattern: {
              value: /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/,
              message: '半角英数のみで入力してください',
            },
            validate: (value) =>
              value === getValues('password') || 'パスワードが一致しません',
          })}
        />
      </label>
      <br />
      <input type="submit" value="新規登録" />
    </form>
  );
};
export default Signup;
