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

    const endpoint = 'http://localhost:8000/api'

    //Variable que almacena los valores a mostrar en el formulario.

    const showEventos = async () => {
        const response = await fetch(`${endpoint}/eventos`);
        const data = await response.json();
        setEventos(data);
        console.log(data);
    }

    //Mapea el array de eventos y extrae los datos para mostrarlos en el front.

    return (

        <div className="card-grid-evento">
            {eventos.map((evento) => (
                <div key={evento.id} className="card-evento">
                    <div className='evento-superior'>
                        <p className='nombre-evento'><b>-{evento.nombre_evento}-</b></p>
                    </div>

                    <div className='evento-izq'>
                        <img className='img-evento' src={`img/eventos/${evento.cartel}`} alt={evento.nombre_evento} />
                    </div>
                    <div className='evento-der'>
                        <p className='dato-evento'><b>Fecha:</b> <br></br>{evento.fecha_inicio}</p>
                        <p className='dato-evento'><b>Colaborador:</b> <br></br>{evento.nombre_colaborador}</p>
                        <p className='dato-evento'><b>Patrocinador:</b> <br></br>{evento.nombre_patrocinador}</p>
                    </div>
                    <div className='descripcion-evento'>
                        <p className='dato-evento'>{evento.descripcion}</p>
                    </div>
                </div>
            ))}
        </div>
    )
}

export default Eventos;

if (document.getElementById('eventos')) {
    ReactDOM.render(<Eventos />, document.getElementById('eventos'));
}
