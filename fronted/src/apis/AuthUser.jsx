const AuthenticateUser = async ({ name, password }) => {
  const url = "http://127.0.0.1:8000/api/users";
  try {
    const response = await fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        name: name,
        password: password,
      }),
    });
    const data = await response.json();
    return data;
  } catch (error) {
    console.log("hubo un error", error);
  }
  return;
};
export default AuthenticateUser;
