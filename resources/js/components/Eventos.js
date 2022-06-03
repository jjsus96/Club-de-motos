import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';

function Eventos() {

    //Establece un valor por defecto que se actualizará con la llamada.

    const [eventos, setEventos] = useState([]);

    //Actualiza los valores a la variable eventos.

    useEffect(() => {
        showEventos();
    }, []);

    //Ruta para realizar la llamada a la api.

    const endpoint = 'http://127.0.0.1:8000/api'

    //Variable que almacena los valores a mostrar en el formulario.

    const showEventos = async () => {
        const response = await fetch(`${endpoint}/eventos`);
        const data = await response.json();
        setEventos(data);
        console.log(data);
    }

    //Mapea el array de eventos y extrae los datos para mostrarlos en el front.

    return (

        <div className="card-grid-socio">
            {eventos.map((evento) => (
                <div key={evento.id} className="card-socio">
                    <h2 className='nombre-socio'>{evento.nombre_evento}</h2>
                    <img className='img-socio' src={`img/eventos/${evento.cartel}`} alt={evento.nombre_evento} />
                    <p className='nombre-socio'>{evento.fecha_inicio}</p>
                    <p className='nombre-socio'>{evento.nombre_colaborador}</p>
                    <p className='nombre-socio'>{evento.nombre_patrocinador}</p>
                    <p className='nombre-socio'>{evento.descripcion}</p>
                </div>
            ))}
        </div>
    )
}

export default Eventos;

if (document.getElementById('eventos')) {
    ReactDOM.render(<Eventos />, document.getElementById('eventos'));
}
