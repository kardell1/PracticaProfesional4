const CreateTags = async ({
    name
  }) => {
    const url = "http://127.0.0.1:8000/api/tags";
    try {
      const response = await fetch(url, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          name : name
        }),
      });
      const res = response.json();
      return res;
    } catch (error) {
      console.log("Hubo un error:", error);
      throw error;    }
  };
  
  export default CreateTags;
  