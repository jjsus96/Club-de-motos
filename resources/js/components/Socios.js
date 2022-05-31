import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';

function Socios() {

    //Establece un valor por defecto que se actualizará con la llamada.

    const [socios, setSocios] = useState([]);

    //Actualiza los valores a la variable socios.

    useEffect(() => {
        showSocios();
    }, []);

    //Ruta para realizar la llamada a la api.

    const endpoint = 'http://127.0.0.1:8000/api'

    //Variable que almacena los valores a mostrar en el formulario.

    const showSocios = async () => {
        const response = await fetch(`${endpoint}/socios`);
        const data = await response.json();
        setSocios(data);
        console.log(data);
    }

    //Mapea el array de socios y extrae los datos para mostrarlos en el front.

    return (

        <div className="card-grid-socio">
            {socios.map((socio) => (
                <div key={socio.id} className="card-socio">
                    <img className='img-socio' src={`img/socios/${socio.foto_carnet}`} alt={socio.nombre_socio} />
                    <p className='nombre-socio'>{socio.nombre_socio}</p>
                </div>
            ))}
        </div>
    )
}

export default Socios;

if (document.getElementById('socios')) {
    ReactDOM.render(<Socios />, document.getElementById('socios'));
}
