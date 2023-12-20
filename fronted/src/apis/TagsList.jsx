const TagsListComponent = async () => {
    const url = "http://127.0.0.1:8000/api/tags";
    try {
      const response = await fetch(url, {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
        },
      });
      const data = await response.json();
      return data;
    } catch (error) {
      console.log("hubo un error", error);
    }
  };
  export default TagsListComponent;
  