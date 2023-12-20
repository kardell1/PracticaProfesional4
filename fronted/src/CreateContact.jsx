import React, { useEffect, useState } from "react";
import TagsListComponent from "./apis/TagsList";
import CreateContact from "./apis/CreateContact";
import { Link } from "react-router-dom";
const ContactForm =  () => {
  const [tags , setTags] = useState([]);
  const [error , setError] = useState('');

  useEffect(() => {
    const fetchTags = async () => {
      const data = await TagsListComponent();
      setTags(data);
      // console.log("ejecutandose : " ,  contacts)
    };    
    fetchTags();
  }, []);


  const [formData, setFormData] = useState({
    direction: "",
    gener: "",
    tags: [],
    email: "",
    phones: [{ cellphone: "" }],
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prevData) => ({
      ...prevData,
      [name]: value,
    }));
  };

  const handleTagChange = (e) => {
    const { value } = e.target;
    setFormData((prevData) => ({
      ...prevData,
      tags: value
        ? [...prevData.tags, value]
        : prevData.tags.filter((tag) => tag !== value),
    }));
  };

  const handlePhoneChange = (e, index) => {
    const { name, value } = e.target;
    setFormData((prevData) => {
      const updatedPhones = [...prevData.phones];
      updatedPhones[index] = { ...updatedPhones[index], [name]: value };
      return { ...prevData, phones: updatedPhones };
    });
  };
  const handleSubmit = async(e) => {
    e.preventDefault();
    console.log("Datos del formulario:", formData);
    
    try {
      const createdContact = await CreateContact(formData);
      console.log("Contacto creado exitosamente:", createdContact);
      // Puedes realizar acciones adicionales si es necesario
    } catch (error) {
      setError(error)
      console.error("Error al crear el contacto:", error);
    }

  };

  return (
    <div className="flex items-center justify-center h-screen bg-orange-200">
      <form onSubmit={handleSubmit}>
      <div><Link to="/Dashboard">regresar</Link></div>
        <div className="flex flex-col gap-1 border p-5 rounded bg-slate-400 ">
          <div> {error} </div>
          <h1>Crear Contacto</h1>

          <label htmlFor="direction">Dirección:</label>
          <input
            type="text"
            name="direction"
            value={formData.direction}
            onChange={handleChange}
          />
          

          <label htmlFor="gener">Género:</label>
          <input
            type="text"
            name="gener"
            value={formData.gener}
            onChange={handleChange}
          />
          
          <label htmlFor="tags">Etiquetas:</label>
          {tags.map((tag, index) => (
            <label key={index}>
              <input
                type="checkbox"
                name={`tag${tag.id}`}
                value={tag.id}
                onChange={handleTagChange}
              />
              {tag.name}
            </label>
          ))}

          

          <label htmlFor="email">Email:</label>
          <input
            type="text"
            name="email"
            value={formData.email}
            onChange={handleChange}
          />
          

          <label htmlFor="celular">Celular:</label>
          <input
            type="text"
            name="cellphone"
            value={formData.phones[0].cellphone}
            onChange={(e) => handlePhoneChange(e, 0)}
          />
          

          <button type="submit" className="hover:bg-green-300 rounded">
            Crear
          </button>
        </div>
      </form>
    </div>
  );
};

export default ContactForm;
