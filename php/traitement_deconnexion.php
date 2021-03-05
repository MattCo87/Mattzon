<?php
session_start();

// On vide les données en session
session_destroy();

// On redirige vers la page d'accueil
Header('Location: ../index.php?message=disconnected');