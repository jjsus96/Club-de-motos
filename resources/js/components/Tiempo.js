import React, {useState} from 'react'
import ReactDOM from 'react-dom';
import '../../sass/tiempo.scss';


//Llamada a una api que devuelvel los resultados y los muestra por pantalla
function Tiempo() {
  //Definimos nuestra clave para poder usar la API
  let apikey = '26820b81e497e01c0449a96f5d932ead';
  //Almacena el resultado devuelto por la API
  let [tiempoinfo, settiempo] = useState([{}]);
  //Almacena el valor introducido en en el input
  let [ciudad, setciudad] = useState("");

  let gettiempo = (e) => {
      //Al pulsar enter, realiza la petición a la api con los parámetros que le hemos asignado.
      if (e.key === "Enter") {
          fetch(`https://api.openweathermap.org/data/2.5/weather?q=${ciudad}&units=metric&APPID=${apikey}`).then(
              response => response.json()
          ).then(
              //Pasa la información y setea de nuevo el valor del input.
              data => {
                  settiempo(data);
                  setciudad("")
              }
          )
      }
  }

  return (
    <div className='contenedor-tiempo'>
        <h2 className='titulofuncionalidad' id='clima'>¿Quieres saber el tiempo para tu ruta?</h2>
        <h3 className='subtitulofuncionalidad'>EL TIEMPO</h3>
        <p className='definicion'>Introduce el nombre de cualquier ciudad para saber sus condiciones meteorológicas en este momento.</p>
        <input className='inputfuncionalidad'
        placeholder='Introduzca ciudad y pulse enter'
        onChange={e => setciudad(e.target.value)}
        value={ciudad}
        onKeyPress={gettiempo} />
        {/* Si la petición devuelve algo, lo muestra por pantalla, en caso contrario, no*/}
        {(typeof tiempoinfo.main != "undefined") ? (
            <div className='marcotemporal'>
                <p className='resultado'>Ciudad: {tiempoinfo.name}  ({tiempoinfo.sys.country})</p>
                <p className='resultado'>Cielo: {tiempoinfo.weather[0].description}</p>
                <p className='resultado'>Temperatura actual: {tiempoinfo.main.temp} ºC</p>
                <p className='resultado'>Temperatura máxima: {tiempoinfo.main.temp_max} ºC</p>
                <p className='resultado'>Temperatura mínima: {tiempoinfo.main.temp_min} ºC</p>
                <p className='resultado'>Humedad: {tiempoinfo.main.humidity}%</p>
                <p className='resultado'>Viento: {tiempoinfo.wind.speed} Km/h</p>
            </div>
        ): ('')}
    </div>
  )
}

export default Tiempo

if (document.getElementById('tiempo')) {
    ReactDOM.render(<Tiempo />, document.getElementById('tiempo'));
}
