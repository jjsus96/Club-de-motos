import React from 'react';
import ReactDOM from 'react-dom';
import '../../sass/menu.scss';
import logo from'../../img/recursos/logo.png'
import {useState, useEffect} from 'react'

function Menu() {

        const [toggleMenu, setToggleMenu] = useState(false)
        const [screenWidth, setScreenWidth] = useState(window.innerWidth)


        const toggleNav = () => {
          setToggleMenu(!toggleMenu)
        }

        useEffect(() => {

          const changeWidth = () => {
            setScreenWidth(window.innerWidth);
          }

          window.addEventListener('resize', changeWidth)

          return () => {
              window.removeEventListener('resize', changeWidth)
          }

        }, [])

    return (
        <nav>
            {(toggleMenu || screenWidth > 500) && (
            <ul className="list">
                <img className='logo' src={logo}></img>
                <li className="left"><a href="/login">Inicio</a></li>
                <li className="left"><a href="/login">Club</a></li>
                <li className="left"><a href="/login">Eventos</a></li>
                <li className="left"><a href="/login">Galería</a></li>
                <li className="left"><a href="/login">Socios</a></li>
                <li className="left"><a href="/login">Únete</a></li>
                <li className="right"><a href="/login">Login</a></li>
                <li className="right"><a href="/register">Registro</a></li>
            </ul>
            )}
            <button onClick={toggleNav} className="btn">BTN</button>
        </nav>
    );
}

export default Menu;

if (document.getElementById('menu')) {
    ReactDOM.render(<Menu />, document.getElementById('menu'));
}
