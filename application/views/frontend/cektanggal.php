<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/elements/fav.png">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <title>Biblioteca UNA Puno</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/datepicker/dcalendar.picker.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(120deg, #2b5876, #4e4376);
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .card {
            background: rgba(0, 0, 0, 0.8);
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

        .table {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .table tbody tr td,
        .table thead tr th {
            color: #000;
        }

        .table thead {
            background: linear-gradient(120deg, #ff7e5f, #feb47b);
        }

        .modal-content {
            background: rgba(0, 0, 0, 0.9);
            color: #000;
        }

        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .modal-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .modal-body {
            color: #000;
        }

        #googleBookResults {
            margin-top: 20px;
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
            <div class="row">
                <div class="col-lg-6">
                    <!-- Card for Search -->
                    <div class="card mb-5">
                        <div class="card-header">
                            <i class="fas fa-search"></i> Buscar Libros
                        </div>
                        <div class="card-body">
                            <form id="book-form">
                                <div class="form-group">
                                    <label for="fechaReserva">Selecciona la Fecha a recoger</label>
                                    <input placeholder="Ingresa la fecha" type="text" id="fechaReserva" class="form-control datepicker" name="fecha" required="">
                                </div>
                                <div class="form-group">
                                    <label for="origen">Categoría</label>
                                    <select name="categoria" id="categoria" class="form-control js-example-basic-single" required>
                                        <option value="" selected disabled>Elige la categoría</option>
                                        <option value="ficcion">Ficción</option>
                                        <option value="historia">Historia</option>
                                        <option value="ciencia">Ciencia</option>
                                        <option value="arte">Arte</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="destino">Título del Libro</label>
                                    <select name="libro" id="libro" class="form-control js-example-basic-single">
                                        <option value="" selected disabled>Elige el libro</option>
                                        <option value="1">Cien años de soledad</option>
                                        <option value="2">El origen de las especies</option>
                                        <option value="3">La teoría del todo</option>
                                        <option value="4">El arte de la guerra</option>
                                    </select>
                                </div>
                                <a href="javascript:history.back()" class="btn btn-danger pull-left">Regresar</a>
                                <button type="button" id="buscarLibro" class="btn btn-primary pull-right">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Card for Library Info -->
                    <div class="card mb-10">
                        <div class="card-header">
                            <i class="fas fa-info"></i> Información de la Biblioteca
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">Título</th>
                                        <th>Autor</th>
                                        <th>Disponibilidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Se llenará dinámicamente -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nueva sección para buscar en Google Books API -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-10">
                        <div class="card-header">
                            <i class="fas fa-search"></i> Buscar Libro en Google API
                        </div>
                        <div class="card-body">
                            <form id="google-api-form">
                                <div class="form-group">
                                    <label for="googleBookTitle">Título del Libro</label>
                                    <input type="text" id="googleBookTitle" class="form-control" placeholder="Ingresa el título del libro">
                                </div>
                                <button type="button" id="searchGoogleBook" class="btn btn-info btn-block">Buscar en Google API</button>
                            </form>
                            <div id="googleBookResults">
                                <!-- Resultados de búsqueda -->
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
    <script type="text/javascript">
        $(function () {
            var date = new Date();
            date.setDate(date.getDate());

            $(".datepicker").datepicker({
                startDate: date,
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });

        document.getElementById('searchGoogleBook').addEventListener('click', async () => {
            const query = document.getElementById('googleBookTitle').value;
            const resultsContainer = document.getElementById('googleBookResults');
            resultsContainer.innerHTML = '<p>Buscando libros...</p>';

            try {
                const response = await fetch(`https://www.googleapis.com/books/v1/volumes?q=${query}`);
                const data = await response.json();
                resultsContainer.innerHTML = '';

                if (data.items) {
                    data.items.forEach(book => {
                        const bookInfo = book.volumeInfo;
                        const resultDiv = document.createElement('div');
                        resultDiv.style.border = '1px solid #ccc';
                        resultDiv.style.padding = '10px';
                        resultDiv.style.marginBottom = '10px';
                        resultDiv.style.borderRadius = '5px';
                        resultDiv.style.backgroundColor = '#fff';
                        resultDiv.style.color = '#000';

                        resultDiv.innerHTML = `
                            <h5>${bookInfo.title}</h5>
                            <p><strong>Autor:</strong> ${bookInfo.authors ? bookInfo.authors.join(', ') : 'Desconocido'}</p>
                            <p><strong>Publicado:</strong> ${bookInfo.publishedDate || 'Desconocido'}</p>
                            <p>${bookInfo.description ? bookInfo.description.substring(0, 150) + '...' : 'Sin descripción disponible.'}</p>
                            <a href="${bookInfo.infoLink}" target="_blank" class="btn btn-primary btn-sm">Más información</a>
                        `;

                        resultsContainer.appendChild(resultDiv);
                    });
                } else {
                    resultsContainer.innerHTML = '<p>No se encontraron libros.</p>';
                }
            } catch (error) {
                resultsContainer.innerHTML = `<p>Error al buscar libros: ${error.message}</p>`;
            }
        });
    </script>
</body>

</html>
