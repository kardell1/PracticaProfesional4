import { Route, Routes } from "react-router-dom";
import React from "react";
import App from "./App";
import Contacts from "./Contacts";
import ContactForm from "./CreateContact";
import CreateTagForm from "./CreateTag";
export function Rutas() {  
  return (
    <>
        <Routes>
          <Route path="/" element={<App/>} />
          <Route path="/Dashboard" element={<Contacts/>} />
        
          <Route path="/Dashboard/Create" element={<ContactForm/>} />
          <Route path="/Dashboard/Tag" element={<CreateTagForm/>} />
        
        </Routes>
    </>
  );
}