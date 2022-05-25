import React from 'react';
import ReactDOM from 'react-dom';
import '../../sass/footer.scss';
import '@fortawesome/fontawesome-free/css/all.min.css';
import fegam from'../../img/recursos/Fegam.png';
import logo from'../../img/recursos/logo.png';

function Footer() {
    return (
        <footer class="footer-general">

			<div class="footer-izq">
                <img className='fegam' src={fegam}></img>
			</div>

			<div class="footer-cntr">
                <img className='logofooter' src={logo}></img>
			</div>
			<div class="footer-der">
                <a className='enlaces-footer' href="#">POLÍTICA DE PRIVACIDAD</a>
                <a className='enlaces-footer' href="#">AVISO LEGAL</a>
                <a className='enlaces-footer' href="#">POLÍTICA DE COOKIES</a>
				<div class="footer-icons">
                    <p class="footer-links">
					    <a className='iconos' href="https://www.facebook.com/groups/1859832864245482/"><i class="fa-brands fa-facebook-f"></i></a>
                        <a className='iconos' href="https://www.instagram.com/motoclubcadizruteando/"><i class="fa-brands fa-instagram"></i></a>
                        <a className='iconos' href="https://www.youtube.com/channel/UCQAGBKaZ7z2fDE-9z8CKtTw"><i class="fa-brands fa-youtube"></i></a>
				    </p>
				</div>
			</div>
            <p className='marcafooter'>Motoclub Cádiz Ruteando &copy; 2022</p>
		</footer>
    );
}

export default Footer;

if (document.getElementById('footer')) {
    ReactDOM.render(<Footer />, document.getElementById('footer'));
}
