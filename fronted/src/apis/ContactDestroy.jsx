import React from "react";

export const ContactDestroyComponent = async ({ id }) => {
  const url = `http://localhost:8000/api/contacts/${id}`;
  try {
    const response = await fetch(url, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
    });
    const data = await response.text();
    return data;
  } catch (error) {
    console.log("hubo un error", error);
  }
};
