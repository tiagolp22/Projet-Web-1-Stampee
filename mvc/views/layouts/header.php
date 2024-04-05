<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Bienvenue sur Lord Stampee - Votre destination exclusive pour les enchères de timbres rares." />
  <meta name="author" content="La Seule Agence" />
  <meta name="keywords" content="enchères, timbres, collection, philatélie, rare, Lord Stampee" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="./assets/img/logos/Stampee_logo_pale_header.svg" type="image/x-icon" alt="logo Stampee" />
  <!-- Pour production -->
  <!-- <link rel="stylesheet" href="build/css/stylesfinaux.css"> -->
  <link rel="stylesheet" href="{{ asset }}/assets/css/styles.css" />
  <title>{{ var }}</title>
</head>

<body class="body-index">
  <header class="header-top">
    <div class="header-top__superieur">
      <div class="header-top__logo">
        <a href="{{base}}"><img src="{{base}}/public/assets/img/logos/Stampee_logo_titre.png" alt="logo Stampee" class="header-top_img" alt="logo Stampee" />
        </a>
      </div>

      <div class="barre-recherche">
        <input type="text" class="barre-recherche__champ" placeholder="Recherchez le timbre souhaité" />
        <i class="fa-solid fa-magnifying-glass icon_img1" alt="icon recherche"></i>
      </div>
      <i class="fa-solid fa-bars" alt="icon menu portable" role="img" aria-label="icon menu portable"></i>

      <div class="header-top_icons">
        <a href="{{base}}">
          <i class="fa-solid fa-house icon_img1" role="img" aria-label="icon page d'accueil"></i></a>
        {% if not guest %}
        <a href="{{base}}/logout">
          <i class="fa-solid fa-user-lock" role="img" aria-label="icon inscription ou connexion"></i>
        </a>
        <a href="{{base}}/product/index">Mes produits</a>
        <p>{{session.user_name}}</p>
        {% else %}
        <a href="{{base}}/login">
          <i class="fa-solid fa-user icon_img1" role="img" aria-label="icon inscription ou connexion"></i>
        </a>
        {% endif %}
        <i class="fa-solid fa-cart-shopping icon_img1" role="img" aria-label="icon inscription ou connexion"></i>
      </div>
    </div>
    <div class="header-nav">
      <ul>
        {% if guest %}
        <li><a href="{{base}}">Home</a></li>
        <li><a href="{{base}}/enchere/index">Catalogue</a></li>
        <li><a href="{{base}}/apropos/index">À propos</a></li>
        <li><a href="{{base}}/contact/index">Contact</a></li>
        <li><a href="{{base}}/user/create">S'abonner</a></li>
        {% else %}
        <li><a href="{{base}}">Home</a></li>
        <li><a href="{{base}}/enchere/index">Catalogue</a></li>
        <li><a href="{{base}}/apropos/index">À propos</a></li>
        <li><a href="{{base}}/contact/index">Contact</a></li>
        <li><a href="{{base}}/product/create">Ajouter un Timbre</a></li>
        <li><a href="{{base}}/enchere/create">Ajouter une Encherés</a></li>
        {% endif %}
      </ul>
    </div>
  </header>