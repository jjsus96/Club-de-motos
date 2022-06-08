import React from 'react';
import ReactDOM from 'react-dom';
import '../../sass/menu.scss';
import logo from '../../img/recursos/logo.png'
import { useState, useEffect } from 'react'
import '@fortawesome/fontawesome-free/css/all.min.css'


function Menusocio() {

    // Define el estado del menú a falso para que por defecto no muestre el desplegable.

    const [cambiomenu, setcambiomenu] = useState(false)

    // Detecta el ancho de la pantalla.

    const [tamanopantalla, settamanopantalla] = useState(window.innerWidth)

    // Despliega/oculta el menú al hacer click en el botón.

    const toggleNav = () => {
        setcambiomenu(!cambiomenu)
    }

    // Se ejecuta cada vez que la ventana se redimensione y actualiza el estado alternando entre los menús.

    useEffect(() => {

        const changeWidth = () => {
            settamanopantalla(window.innerWidth);
        }

        window.addEventListener('resize', changeWidth)

        return () => {
            window.removeEventListener('resize', changeWidth)
        }

    }, [])

    return (
        <nav>
            <img className='logomovil' src={logo}></img>
            {(cambiomenu || tamanopantalla > 900) && (
                <ul className="list">
                    <img className='logo' src={logo}></img>
                    <div className='leftmenu'>
                        <li className="enlace-menu"><a href="/">Inicio</a></li>
                        <li className="enlace-menu"><a href="/club">Club</a></li>
                        <li className="enlace-menu"><a href="/evento">Eventos</a></li>
                        <li className="enlace-menu"><a href="/galeria">Galería</a></li>
                        <li className="enlace-menu"><a href="/socio">Socios</a></li>
                    </div>
                    <div className='rightmenu'>
                        <li className="enlace-menu"><a href="/home">Cuenta</a></li>
                    </div>
                </ul>
            )}

            <button onClick={toggleNav} className="btn-menu"><i className='fa-solid fa-bars'></i></button>
        </nav>
    );
}

export default Menusocio;

if (document.getElementById('menusocio')) {
    ReactDOM.render(<Menusocio />, document.getElementById('menusocio'));
}
