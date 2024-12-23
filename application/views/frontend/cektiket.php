<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/elements/fav.png">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>Reserva de Libros</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/datepicker/dcalendar.picker.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(120deg, #1f1c2c, #928dab);
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
        }

        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
            background: linear-gradient(120deg, #ff7e5f, #feb47b);
            color: #fff;
            border-radius: 10px 10px 0 0;
            text-align: center;
            padding: 10px 20px;
        }

        .btn-success {
            background: linear-gradient(120deg, #56ab2f, #a8e063);
            border: none;
            color: #fff;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            transition: transform 0.2s;
        }

        .btn-success:hover {
            transform: scale(1.1);
            background: linear-gradient(120deg, #a8e063, #56ab2f);
        }

        .form-control {
            background: rgba(255, 255, 255, 0.8);
            border: none;
            border-radius: 5px;
            padding: 10px;
            font-size: 1rem;
        }

        .form-control::placeholder {
            color: rgba(0, 0, 0, 0.5);
        }

        .form-control:focus {
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        .overlay-bg {
            background: rgba(0, 0, 0, 0.7);
        }

		.result-box {
			margin-top: 20px;
			background: rgba(0, 0, 0, 0.8);
			padding: 15px;
			border-radius: 10px;
			box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
			font-size: 1rem;
			color: #fff; /* Cambiado a blanco */
		}

		.result-box h5 {
			font-size: 1.2rem;
			margin-bottom: 10px;
			color: #fff; /* Cambiado a blanco */
		}

		.result-box p {
			margin: 5px 0;
			color: #fff; /* Cambiado a blanco */
		}
    </style>
    <?php $this->load->view('frontend/include/base_css'); ?>
</head>

<body>
    <!-- Navbar -->
    <?php $this->load->view('frontend/include/base_nav'); ?>
    <section class="service-area section-gap relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <!-- Card for Reserva de Libros -->
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-book"></i> Consultar mi Reserva
                        </div>
                        <div class="card-body">
                            <form id="consultaReservaForm">
                                <div class="form-group">
                                    <label for="codigoReserva">Introduce tu código de reserva</label>
                                    <input type="text" class="form-control" id="codigoReserva" placeholder="Código de Reserva" required="">
                                </div>
                                <button type="submit" class="btn btn-success pull-right">Consultar</button>
                            </form>
                            <!-- Result Box -->
                            <div id="resultBox" class="result-box" style="display: none;">
                                <h5>Detalles de la Reserva:</h5>
                                <p><strong>Libro:</strong> <span id="resultLibro"></span></p>
                                <p><strong>Fecha de recogida:</strong> <span id="resultFecha"></span></p>
                                <p><strong>Estado:</strong> <span id="resultEstado"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php $this->load->view('frontend/include/base_footer'); ?>

    <!-- Scripts -->
    <?php $this->load->view('frontend/include/base_js'); ?>
    <script>
        document.getElementById('consultaReservaForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // Captura el código ingresado por el usuario
            const codigo = document.getElementById('codigoReserva').value;

            // Simulación de datos de reserva
            const reservas = {
                "12345": {
                    libro: "Cien años de soledad",
                    fecha: "25 de diciembre",
                    estado: "Confirmada"
                },
                "67890": {
                    libro: "El origen de las especies",
                    fecha: "30 de diciembre",
                    estado: "Confirmada"
                },
                "11111": {
                    libro: "La teoría del todo",
                    fecha: "2 de enero",
                    estado: "Pendiente"
                },
                "22222": {
                    libro: "El arte de la guerra",
                    fecha: "5 de enero",
                    estado: "Confirmada"
                }
            };

            // Busca el código de reserva en los datos simulados
            const reserva = reservas[codigo];

            // Muestra los datos de la reserva si se encuentra el código
            if (reserva) {
                document.getElementById('resultLibro').textContent = reserva.libro;
                document.getElementById('resultFecha').textContent = reserva.fecha;
                document.getElementById('resultEstado').textContent = reserva.estado;
                document.getElementById('resultBox').style.display = 'block';
            } else {
                // Si no se encuentra, muestra un mensaje de error
                alert('Código de reserva no encontrado.');
                document.getElementById('resultBox').style.display = 'none';
            }
        });
    </script>
</body>

</html>
