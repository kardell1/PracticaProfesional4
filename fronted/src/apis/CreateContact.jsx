const CreateContact = async ({
    direction,
    gener,
    tags,
    email,
    phones,
  }) => {
    const url = "http://127.0.0.1:8000/api/contacts";
    try {
      const response = await fetch(url, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          direction: direction,
          gener: gener,
          tags: tags,
          email: email,
          phones: phones,
        }),
      });
      return response;
    } catch (error) {
      console.log("Hubo un error:", error);
      throw error;    }
  };
  
  export default CreateContact;
  