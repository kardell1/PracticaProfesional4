import React from "react";
import NavComponent from "./components/Nav";
import ContactTable from "./components/ContactsTable";

export default function Contacts() {
   
  return (
    <div>
      <NavComponent/>
      <ContactTable/>
    </div>
  );
}
