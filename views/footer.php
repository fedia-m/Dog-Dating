
    </main>
    </div>
    <script src="<?php echo BASE_URL?>assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="<?php echo BASE_URL?>assets/js/popper.min.js"></script>
    <script src="<?php echo BASE_URL?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo BASE_URL?>assets/js/jquery.waypoints.min.js"></script>
    <script src="<?php echo BASE_URL?>assets/js/imagesloaded.pkgd.min.js"></script>

    <script src="<?php echo BASE_URL?>assets/js/main.js"></script>
    <script>
        function modifierMdp() {
            if (document.getElementById("mdp").hidden == true){
                document.getElementById("mdp").hidden = false;
            } else {
                document.getElementById("mdp").hidden = true;
            }
        }
    </script>
    <script>
        function reorientation() {
            document.location.replace('<?php echo BASE_URL?>views/connexion.php');
        }
    </script>

    <script>
        function reponseMessage() {
            if (document.getElementById("reponse").hidden == true){
                document.getElementById("reponse").hidden = false;
            } else {
                document.getElementById("reponse").hidden = true;
            }
        }
    </script>

    </body>
</html>