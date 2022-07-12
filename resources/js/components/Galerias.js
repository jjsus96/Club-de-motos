import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';

function Galerias() {

    //Establece un valor por defecto que se actualizará con la llamada.

    const [galerias, setGalerias] = useState([]);

    //Actualiza los valores a la variable galerias.

    useEffect(() => {
        showGalerias();
    }, []);

    //Ruta para realizar la llamada a la api.

    const endpoint = 'http://localhost:8000/api'

    //Variable que almacena los valores a mostrar en el formulario.

    const showGalerias = async () => {
        const response = await fetch(`${endpoint}/galerias`);
        const data = await response.json();
        setGalerias(data);
        console.log(data);
    }

    //Mapea el array de galerias y extrae los datos para mostrarlos en el front.

    return (

        <div className="grid-gallery">
            {galerias.map((galeria) => (
                <div key={galeria.id} className="grid-gallery__item">
                    <img className='grid-gallery__image' src={`img/galerias/${galeria.imagen}`} alt={galeria.id} />
                </div>
            ))}
        </div>
    )
}

export default Galerias;

if (document.getElementById('galerias')) {
    ReactDOM.render(<Galerias />, document.getElementById('galerias'));
}
