import React from 'react';
import './Login.css'; // Archivo de estilos
import logo from './img/logo2.png'; // Importar la imagen del logo

function Login() {
  return (
    <div className="login-container">
      <div className="background">
        <img src={logo} alt="Logo" className="logo" />
        <h1 className="title">TIENDA VIRTUAL</h1>
      </div>

      <div className="login-box">  
        <h2>Inicio de sesión</h2>
          <div className="correo">
          <input type="email" placeholder="Correo electrónico" />
          </div>

        <div className="contrasena"><input type="password" placeholder="Contraseña" />
        </div>
        <a href="#" className="forgot-password">¿Olvidó su contraseña?</a>
        <button className="login-button">Iniciar</button>
        <p>¿No tiene una cuenta? <a href="#">Regístrate</a></p>
      </div>
    </div>
  );
}

export default Login;
  