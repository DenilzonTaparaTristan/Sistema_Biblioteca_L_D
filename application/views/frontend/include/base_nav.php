<header id="header" id="home" style="background-color: #fff; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
  <div class="container">
    <div class="row align-items-center justify-content-between d-flex">
      <!-- Logo -->
      <div id="logo">
        <a href="<?php echo base_url() ?>">
          <h3 style="color: #333; font-family: 'Poppins', sans-serif; letter-spacing: 2px; font-weight: bold;">
            <i class="fas fa-book-reader" style="color: #00bcd4;"></i> <b style="color: #00bcd4;">Biblioteca UNA Puno</b>
          </h3>
        </a>
      </div>
      
      <!-- Navigation Menu -->
      <nav id="nav-menu-container">
        <ul class="nav-menu" style="display: flex; align-items: center; justify-content: space-between;">
          <!-- Inicio link -->
          <li class="menu" style="position: relative;">
            <a href="<?php echo base_url() ?>" class="nav-link">
              <span class="nav-text">Inicio</span> <!-- "Home" changed to "Inicio" -->
            </a>
          </li>
          
          <!-- Realizar Reserva link -->
          <li style="position: relative;">
            <a href="<?php echo base_url() ?>tiket" class="nav-link">
              <span class="nav-text">Realizar Reserva</span> <!-- "Make Bookings" changed to "Realizar Reserva" -->
            </a>
          </li>
          
          <!-- Consultar Reservas link -->
          <li class="menu" style="position: relative;">
            <a href="<?php echo base_url() ?>tiket/cektiket" class="nav-link">
              <span class="nav-text">Consultar Reservas</span> <!-- "Check Tickets" changed to "Consultar Reservas" -->
            </a>
          </li>

          <!-- Conditional Menu for Logged-in Users -->
          <?php if ($this->session->userdata('username')) { ?>
            <li class="menu-has-children" style="position: relative;">
              <a href="#" class="nav-link">
                <span class="nav-text">Hola, <?php echo $this->session->userdata('nama_lengkap'); ?></span>
              </a>
              <ul style="background-color: #34495e; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);">
                <li><a href="<?php echo base_url() ?>profile/profilesaya/<?php echo $this->session->userdata('kd_pelanggan') ?>" class="submenu-item">Mi Perfil</a></li>
                <li><a href="<?php echo base_url() ?>profile/tiketsaya/<?php echo $this->session->userdata('kd_pelanggan') ?>" class="submenu-item">Mis Reservas</a></li>
                <li><a href="<?php echo base_url() ?>login/logout" class="submenu-item">Cerrar Sesión</a></li>
              </ul>
            </li>
          <?php } else { ?>
            <li class="menu wobble animated" style="position: relative;">
              <a href="<?php echo base_url() ?>login/Daftar" class="nav-link">
                <span class="nav-text">Registrar</span> <!-- "Register" changed to "Registrar" -->
              </a>
            </li>
            <li style="position: relative;">
              <a href="<?php echo base_url() ?>login" class="nav-link">
                <span class="nav-text">Iniciar Sesión</span> <!-- "Login" changed to "Iniciar Sesión" -->
              </a>
            </li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>
</header>

<!-- CSS Styling -->
<style>
  /* Style for navigation links */
  .nav-link {
    display: inline-block;
    font-size: 1.1rem;
    color: #333;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    transition: all 0.3s ease;
    position: relative;
  }

  /* Circular effect around text */
  .nav-text {
    position: relative;
    z-index: 1;
  }

  .nav-link::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    background-color: #00bcd4;
    border-radius: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 0;
  }

  /* Hover effect */
  .nav-link:hover::before {
    opacity: 0.2;
  }

  .nav-link:hover {
    color: #fff;
    background-color: #00bcd4;
    transform: scale(1.05);
  }

  /* Style for the submenu */
  .submenu-item {
    display: block;
    padding: 10px 20px;
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    transition: background-color 0.3s ease;
  }

  .submenu-item:hover {
    background-color: #34495e;
  }

  /* Responsive navbar */
  @media screen and (max-width: 768px) {
    .nav-menu {
      display: flex;
      flex-direction: column;
    }
  }
</style>
