<!--que se importan en cada página ya que es siempre lo mismo -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

<footer id="footer">
    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
                <!--Es como el header un menu y tiene a parte el Map web-->
                <li class="nav-item"><a href="Index.php" id="whiteDelSub">Inicio&nbsp;&nbsp;&nbsp;</a></li>
                <li class="nav-item"><a href="Games.php" id="whiteDelSub">Juegos&nbsp;&nbsp;&nbsp;</a></li>
                <?php

                if (isset($_COOKIE['id'])) {
                    echo '<li class="nav-item"><a href="MyProyects.php" id="whiteDelSub">Tus Proyectos&nbsp;&nbsp;&nbsp;</a></li>';
                }
                ?>
                <li class="nav-item"><a href="AboutUs.php" id="whiteDelSub">Sobre nosotros&nbsp;&nbsp;&nbsp;</a></li>
                <li class="nav-item"><a href="Contact.php" id="whiteDelSub">Contacto&nbsp;&nbsp;&nbsp;</a></li>
                <li class="nav-item"><a href="../Files/WebMap.php" id="whiteDelSub">Mapa Web</a></li>
            </ul>
            <p id="white" style="text-align: center;">© 2023 SoftEvo, Inc</p>
        </footer>
    </div>

</footer>

</body>

</html>