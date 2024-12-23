<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
    	<link rel="stylesheet" href="chat-styles.css">
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/elements/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>SISTEMA DE RESERVA DE LIBROS</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!-- CSS -->
		<style type="text/css">
			.combined {
				-webkit-text-stroke: 1px black;
				color: white;
				text-shadow:
				2px  2px 0 #000,
				-1px -1px 0 #000,
				1px -1px 0 #000,
				-1px  1px 0 #000,
				1px  1px 0 #000;
			}
			.border-black {
				color: black;
				text-shadow: 
					2px   0  0   #000, 
					-2px   0  0   #000, 
					0    2px 0   #000, 
					0   -2px 0   #000, 
					1px  1px 0   #000, 
					-1px -1px 0   #000, 
					1px -1px 0   #000, 
					-1px  1px 0   #000,
					1px  1px 5px #000;
			}
			/* Centrar texto */
			.text-center {
				text-align: center;
			}
			/* Ajustes de tamaño de letra */
			.large-text {
				font-size: 3rem; /* Tamaño de fuente más grande */
			}
			.banner-content p {
				font-size: 1.3rem; /* Ajuste del tamaño del párrafo */
			}

			/* Agregar un cuadro semi-transparente */
			.transparent-box {
				background-color: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
				padding: 30px;
				border-radius: 10px; /* Bordes redondeados */
				text-align: center; /* Centrar el texto dentro del cuadro */
			}
			.transparent-box h2, .transparent-box p {
				color: white; /* Texto en blanco dentro del cuadro */
			}

			/* Estilo para el título con fondo semi-transparente */
			.transparent-title {
				display: inline-block;
				background-color: rgba(0, 0, 0, 0.6); /* Fondo semi-transparente */
				color: white;
				padding: 10px 20px;
				border-radius: 5px;
				transition: background-color 0.3s ease, transform 0.3s ease; /* Transición para el brillo */
			}
			.transparent-title:hover {
				background-color: rgba(255, 69, 0, 0.8); /* Color brillante al pasar el cursor */
				transform: scale(1.05); /* Agrandar ligeramente */
			}

			/* Ajustes para el párrafo */
			.transparent-box p {
				font-size: 1.4rem;
				line-height: 1.6;
				font-weight: 400;
			}
			<style>
    /* Estilos del chat */
    .message.sent {
        background: linear-gradient(145deg, #4caf50, #3a9d45); /* Fondo verde */
        color: white;
        align-self: flex-end;
        border-radius: 15px 15px 0 15px;
        padding: 10px;
        max-width: 70%;
        margin-bottom: 10px;
        font-size: 14px;
        word-wrap: break-word;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }

    .message.received {
        background: linear-gradient(145deg, #555, #444); /* Fondo gris */
        color: white;
        align-self: flex-start;
        border-radius: 15px 15px 15px 0;
        padding: 10px;
        max-width: 70%;
        margin-bottom: 10px;
        font-size: 14px;
        word-wrap: break-word;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }
</style>

		</style>
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body>
		<!-- navbar -->
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<!-- start banner Area -->
		<section class="banner-area relative section-gap relative" id="home">
			<div class="container">
				<div class="row fullscreen d-flex align-items-center justify-content-center">
					<div class="banner-content col-lg-7 col-md-12 transparent-box text-center">
						<h2 class="large-text transparent-title">
							Reserva de Libros 
							Biblioteca - UNA PUNO		
						</h2>
						<p>
							Ahora reservar libros en la Biblioteca de la UNA Puno es más fácil. Puedes realizar tu reserva en línea. No necesitas ir a la biblioteca física, ahora puedes reservar libros fácilmente. Rápido y fácil. Reserva sin cargos adicionales. Servicio disponible 24/7. Todos los libros disponibles.
						</p>
						<a href="<?php echo base_url() ?>tiket" class="btn btn-danger text-uppercase">Buscar Libros</a>
					</div>
				</div>
			</div>
		</section>
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-md-8 pb-40 header-text text-center">
						<h1>PASOS PARA RESERVAR UN LIBRO</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="single-service">
							<img class="img-fluid" src="<?php echo base_url() ?>assets/frontend/img/b1.png" width="150" height="150" alt="">
							<h4>Ver detalles del libro</h4>
							<p>
								Ingresa el título del libro, autor y la fecha de reserva, luego haz clic en 'Buscar'.
							</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-service">
							<img class="img-fluid" src="<?php echo base_url() ?>assets/frontend/img/b2.png" width="150" height="150" alt="">
							<h4>Seleccionar el libro</h4>
							<p>
								Selecciona el libro que deseas reservar, elige la fecha de recogida y confirma los detalles.
							</p>
						</div>
					</div>
					<!-- Log on to codeastro.com for more projects -->
					<div class="col-lg-4 col-md-6">
						<div class="single-service">
							<img class="img-fluid" src="<?php echo base_url() ?>assets/frontend/img/b3.png" width="150" height="150" alt="">
							<h4>Confirmación de reserva</h4>
							<p>
								Confirma los detalles y recibirás un correo con la confirmación de tu reserva.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End service Area -->
		<!-- End feature Area -->
		<!-- start footer Area -->
		<?php $this->load->view('frontend/include/base_footer'); ?>
		<!-- js -->
		<?php $this->load->view('frontend/include/base_js'); ?>

<!-- Recuadro de chat -->
<div id="chat-widget" style="display: none; position: fixed; bottom: 80px; right: 20px; width: 350px; height: 400px; border-radius: 15px; background: linear-gradient(145deg, #1e1e1e, #292929); box-shadow: 10px 10px 20px #0e0e0e, -10px -10px 20px #3e3e3e; color: white; z-index: 1000; overflow: hidden; flex-direction: column;">
    <div style="background: #444; color: white; padding: 15px; text-align: center; font-size: 18px; position: relative;">
        Chat grupal
        <button id="chat-close" style="position: absolute; top: 10px; right: 15px; background: none; border: none; color: white; font-size: 20px; cursor: pointer;">&times;</button>
    </div>
    <div id="chat-messages" style="flex: 1; padding: 10px; background: #2e2e2e; overflow-y: auto; display: flex; flex-direction: column;">
        <!-- Los mensajes aparecerán aquí -->
    </div>
    <div style="display: flex; padding: 10px; background: #444; border-top: 1px solid #555;">
        <input id="chat-input" type="text" placeholder="Escribe un mensaje..." style="flex: 1; border: none; padding: 10px; outline: none; border-radius: 8px; background: #2e2e2e; color: white;">
        <button id="chat-send" style="margin-left: 10px; background: #4caf50; border: none; border-radius: 8px; padding: 10px 15px; color: white; cursor: pointer; font-weight: bold;">Enviar</button>
    </div>
</div>

<!-- Botón flotante para abrir el chat -->
<button id="chat-toggle" style="position: fixed; bottom: 20px; right: 20px; width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(145deg, #1e1e1e, #292929); box-shadow: 5px 5px 10px #0e0e0e, -5px -5px 10px #3e3e3e; border: none; color: white; font-size: 25px; cursor: pointer; display: flex; justify-content: center; align-items: center; z-index: 1001;">💬</button>

<script>
    // Configuración del WebSocket
    const socket = new WebSocket('ws://localhost:8080');

    // Lógica para abrir y cerrar el chat
    const chatWidget = document.getElementById('chat-widget');
    const chatToggle = document.getElementById('chat-toggle');
    const chatClose = document.getElementById('chat-close');

    chatToggle.addEventListener('click', () => {
        chatWidget.style.display = chatWidget.style.display === 'none' ? 'flex' : 'none';
    });

    chatClose.addEventListener('click', () => {
        chatWidget.style.display = 'none';
    });

    // Manejo de mensajes WebSocket
    socket.onopen = () => {
        console.log('Conectado al servidor WebSocket');
    };

    socket.onmessage = (event) => {
        const data = JSON.parse(event.data);
        addMessageToChat(data.message, data.type === 'sent' ? 'sent' : 'received');
    };

    document.getElementById('chat-send').addEventListener('click', () => {
        const chatInput = document.getElementById('chat-input');
        const message = chatInput.value.trim();
        if (message) {
            socket.send(JSON.stringify({ message }));
            addMessageToChat(message, 'sent');
            chatInput.value = '';
        }
    });

    function addMessageToChat(message, type) {
        const chatMessages = document.getElementById('chat-messages');
        const messageElement = document.createElement('div');
        messageElement.textContent = message;
        messageElement.classList.add('message', type);
        messageElement.style.marginBottom = '10px';
        messageElement.style.padding = '10px';
        messageElement.style.borderRadius = type === 'sent' ? '15px 15px 0 15px' : '15px 15px 15px 0';
        messageElement.style.maxWidth = '70%';
        messageElement.style.wordWrap = 'break-word';
        messageElement.style.background = type === 'sent' ? '#4caf50' : '#555';
        messageElement.style.color = 'white';
        messageElement.style.alignSelf = type === 'sent' ? 'flex-end' : 'flex-start';
        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    socket.onclose = () => {
        console.log('Desconectado del servidor WebSocket');
    };

    socket.onerror = (error) => {
        console.error('Error en el WebSocket:', error);
    };
</script>


	</body>
</html>
