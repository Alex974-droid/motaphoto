# 📸 Projet WordPress - Site Photographe Freelance (Nathalie Mota)

## 📖 Présentation

Ce projet a été réalisé dans le cadre de ma formation **Développeur WordPress**.  
L'objectif était de créer un **site WordPress complexe et sur mesure** pour une photographe professionnelle dans l’événementiel, en respectant les maquettes fournies et en utilisant des **structures de données personnalisées**.

## 🎯 Objectifs pédagogiques

- Mettre en place un **thème WordPress personnalisé**.
- Créer des **Custom Post Types (CPT)**, taxonomies et champs personnalisés (SCF).
- Rendre les templates dynamiques en exploitant les données du back-office.
- Utiliser **Ajax** pour un affichage dynamique (pagination infinie, filtres, tri).
- Intégrer **jQuery** pour enrichir l’interface (modale de contact, préremplissage automatique).
- Appliquer des **principes de Green IT** pour optimiser le site (images, scripts, performances).

## 🖼️ Scénario

Le client fictif, **Nathalie Mota**, est une photographe événementielle ayant perdu son ancien site.  
Elle souhaite :
- un site WordPress auto-hébergé pour garder le contrôle de ses données,
- une présentation moderne et responsive de ses séries de photos,
- la possibilité pour ses clients de visionner les photos, d’en commander les droits ou de les télécharger en HD.

## 🛠️ Technologies utilisées

- **WordPress** (en local via LocalWP)
- **PHP / MySQL**
- **HTML5 / CSS3 / SCSS**
- **JavaScript / jQuery**
- **Ajax** (WordPress REST API)
- **Plugins :**
  - CPT UI (Custom Post Types)
  - Secure Custom Fields (SCF)
  - Contact Form 7 (formulaire de contact)
  - WP Super Cache (optimisation performances)

## ✨ Fonctionnalités principales

- **Thème sur mesure** avec `header.php`, `footer.php`, `functions.php`, templates `single-photo.php` personnalisés.
- **CPT "Photos"** avec taxonomies personnalisées "Catégorie" et "Format".
- **SCF** pour stocker les métadonnées : type, référence, date de prise de vue.
- **Page d'accueil dynamique** : affichage en grille des photos via WP_Query.
- **Filtres & tri en Ajax** : chargement dynamique sans rechargement de page.
- **Pagination infinie** (Load More en Ajax).
- **Lightbox personnalisée** pour visualiser les photos en plein écran.
- **Modale de contact** avec préremplissage automatique de la référence photo.
- **Responsive design** : desktop / tablette / mobile.

## 🌱 Optimisations Green IT

- **Compression et conversion** des images au format WebP.
- **Lazy loading** natif pour différer le chargement des médias hors écran.
- **Minification** CSS/JS + chargement asynchrone des scripts.
- **Mise en cache** serveur avec WP Super Cache pour réduire la charge CPU et les requêtes.
- **Audit de performance** réalisé avec Lighthouse (score amélioré).
