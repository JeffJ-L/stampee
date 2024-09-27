<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="Jeff Jean-Louis">
    <meta name="Description" content="Maquette de site web d'enchère Stampee, page d'accueil">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap');
    </style>
        <link rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
     integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
     crossorigin="anonymous" 
     referrerpolicy="no-referrer">
    <link rel="stylesheet" href="{{ asset }}/css/main.css">
    <script src="{{ asset }}/js/main.js" defer></script>
    <title>Acceuil</title>
</head>
<body>
<nav class="boite-nav">
    <a href="{{base}}/"><img class="logo" src="{{asset}}/img/logoStampee-2-alt.png" alt="logo"></a>
    
    <div class="boite-pages">
        <a href="#">Actualités</a>
        <a href="{{base}}/enchere">Enchères</a>
        <a href="{{base}}/apropos">À propos</a>
        <a href="#">Contact</a>
        {% if not guest %}
        <div class="dropdown">
            <a href="#">Mon compte</a>
            <div class="dropdown-content">
                <a href="{{base}}/user/">Mon profil</a>
                <a href="{{base}}/enchere?filter=mesEncheres">Mes enchères</a>
                <a href="{{base}}/enchere/create">Créer une enchère</a>
                <a href="{{base}}/logout">Logout</a>
            </div>
        </div>
        {% endif %}
    </div>
    <div class="section-droite">
        <div class="recherche">
            <label for="recherche">
                <p>Recherche</p>
                <input id="recherche" name="recherche" type="text" placeholder="Recherche...">
            </label>
            <img class="icone-recherche" src="{{asset}}/img/svg/search.svg" alt="icone de recherche">
        </div>
        {% if guest %}
            <a href="{{base}}/login"><img class="icone-connexion" src="{{asset}}/img/svg/flaticon-account.svg" alt="icone de connexion"></a>
        {% endif %}

        {% if not guest %}
            <a href="{{base}}/logout"><img class="icone-connexion" src="{{asset}}/img/svg/flaticon-account.svg" alt="icone de connexion"></a>
        {% endif %}
    </div>
</nav>

    <main>