import React, { useState } from 'react';
import AuthenticateUser from './apis/AuthUser';
import { useNavigate } from 'react-router-dom';

function App() {
  const navegate = useNavigate();
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const [authData, setAuthData] = useState(null);
  const [error, setError] = useState(null);

  const handleLogin = async (e) => {
    e.preventDefault();

    try {
      const data = await AuthenticateUser({ name: username, password });
      setAuthData(data);
      setError(null);
      navegate('/Dashboard')
    } catch (error) {
      setAuthData(null);
      setError('Error en la autenticación. Verifica tus credenciales.');
    }
  };

  return (
    <>
      <div className="flex items-center justify-center h-screen bg-orange-200">
        <div className="bg-white p-8 rounded shadow-md w-96">
          <form onSubmit={handleLogin}>
            <h1 className="text-3xl font-bold mb-4">Login</h1>
            <div className="mb-4">
              <label htmlFor="username" className="block text-sm font-medium text-gray-600">
                Username
              </label>
              <input
                type="text"
                id="username"
                name="username"
                className="mt-1 p-2 w-full border rounded-md"
                value={username}
                onChange={(e) => setUsername(e.target.value)}
              />
            </div>
            <div className="mb-4">
              <label htmlFor="password" className="block text-sm font-medium text-gray-600">
                Password
              </label>
              <input
                type="password"
                id="password"
                name="password"
                className="mt-1 p-2 w-full border rounded-md"
                value={password}
                onChange={(e) => setPassword(e.target.value)}
              />
            </div>
            <button
              type="submit"
              className="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600"
            >
              Login
            </button>
          </form>
          {error && <p className="text-red-500 mt-2">{error}</p>}
          {authData && <p className="text-green-500 mt-2">¡Autenticación exitosa!</p>}
        </div>
      </div>
    </>
  );
}

export default App;
