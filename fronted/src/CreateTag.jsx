import React, { useState } from "react";
import CreateTags from "./apis/CreateTag";
import { Link } from "react-router-dom";

const CreateTagForm = () => {
  const [tagName, setTagName] = useState("");

  const handleSubmit = async(e) => {
    e.preventDefault();
    try {
        const createdTag = await CreateTags({name : tagName});
        console.log("Contacto creado exitosamente:", createdTag);
        // Puedes realizar acciones adicionales si es necesario
      } catch (error) {
        console.error("Error al crear el contacto:", error);
      }
  };

  return (
    <div className="bg-white p-4 shadow-md rounded-md">
      <div><Link to="/Dashboard">regresar</Link></div>
      <h2 className="text-xl font-bold mb-4">Crear Etiqueta</h2>
      <form onSubmit={handleSubmit}>
        <label htmlFor="tagName" className="block text-sm font-medium text-gray-600">
          Nombre de la Etiqueta:
        </label>
        <input
          type="text"
          id="tagName"
          name="tagName"
          value={tagName}
          onChange={(e) => setTagName(e.target.value)}
          className="mt-1 p-2 w-full border rounded-md"
        />
        <button
          type="submit"
          className="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600"
        >
          Crear
        </button>
      </form>
    </div>
  );
};

export default CreateTagForm;
