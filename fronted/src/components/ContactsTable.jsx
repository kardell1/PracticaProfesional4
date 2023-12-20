// ContactTable.js
import React, { useEffect, useState } from "react";
import { ContactDestroyComponent } from "../apis/ContactDestroy";
import ContactsComponent from "../apis/ContactList";

const ContactTable = () => {
  const [contacts, setContacts] = useState([]);
  const [update, setUpdate] = useState(false);
  
  useEffect(() => {
    const fetchData = async () => {
      const data = await ContactsComponent();
      setContacts(data);
      // console.log("ejecutandose : " ,  contacts)
    };    
    fetchData();
  }, [update]);

  const handleElim = async (id) => {
    console.log("tocado el boton : ", id);
    setUpdate(!update);
    const res = await ContactDestroyComponent({id : id});
    alert(res);
  };

  return (
    <table className="min-w-full bg-white border border-gray-300">
      <thead>
        <tr>
          <th className="py-2 px-4 border-b">Direction</th>
          <th className="py-2 px-4 border-b">Gener</th>
          <th className="py-2 px-4 border-b">Tags</th>
          <th className="py-2 px-4 border-b">Emails</th>
          <th className="py-2 px-4 border-b">Phones</th>

          <th className="py-2 px-4 border-b">Options</th>
        </tr>
      </thead>
      <tbody>
        {contacts.map((contact, index) => (
          <tr key={index} className="text-center">
            <td className="py-2 px-4 border-b">{contact.direction}</td>
            <td className="py-2 px-4 border-b">{contact.gener}</td>
            <td className="py-2 px-4 border-b">
              {contact.tags.map((tag, index) => (
                <p key={index}> {tag.name} </p>
              ))}
            </td>
            <td className="py-2 px-4 border-b">
              {contact.emails.map((email) => (
                <p key={index}> {email.email} </p>
              ))}
            </td>
            <td className="py-2 px-4 border-b">
              {contact.phones.map((phone, index) => (
                <p key={index}> {phone.cellphone} </p>
              ))}
            </td>
            <td className="py-2 border-b ">
              <button
                onClick={() => {
                  handleElim(contact.id);
                }}
                className="m-1 bg-green-100 p-2 rounded hover:bg-green-300"
              >
                elim
              </button>
              <button className="bg-green-100 p-2 hover:bg-green-300 rounded ">
                edith
              </button>
            </td>
          </tr>
        ))}
      </tbody>
    </table>
  );
};

export default ContactTable;
