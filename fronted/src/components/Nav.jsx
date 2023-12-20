import React from 'react'
import { Link } from 'react-router-dom'

export default function NavComponent() {
  return (
    <nav className="bg-orange-300 p-4 text-white font-bold">
    <ul className="flex space-x-4">
      <li className='hover:bg-gray-700 p-2 rounded'>
        <Link to="/Dashboard/Create">Crear Contacto</Link>
      </li>
      <li className='hover:bg-gray-700 p-2 rounded'>
        <Link to="/Dashboard/Tag">Crear Etiqueta nueva</Link>
      </li>
      <li className='hover:bg-gray-700 p-2 rounded'>
        <Link to="/">Salir</Link>
      </li>
    </ul>
  </nav>
  )
}
