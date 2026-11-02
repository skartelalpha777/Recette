Une petite application Symfony pour gérer des recettes, avec une page publique dynamique en JavaScript pour les parcourir, les filtrer et les mettre en favori.
Projet d'entraînement. Le but principal n'est pas la recette parfaite, mais de pratiquer le DHTML : manipuler le DOM en JavaScript natif pour afficher, filtrer et faire réagir une page à partir d'un contenu dynamique venant d'une API.

Objectif du projet:

Ce projet sert à s'exercer au DHTML (HTML + CSS + JavaScript côté navigateur) avec de vraies données :
récupérer du contenu depuis une API avec fetch ;
construire et mettre à jour la page en manipulant le DOM, sans framework front ;
réagir aux actions de l'utilisateur (recherche, filtres, favoris) sans recharger la page ;
garder une interface propre et responsive avec Bootstrap.

Le côté Symfony est volontairement léger : il fournit les données et une interface d'administration, pour que l'effort se concentre sur la partie dynamique côté navigateur.

✨ Fonctionnalités

Page publique (JavaScript natif)

Affichage dynamique de la liste des recettes
Filtrage / recherche en direct
Mise en favori d'une recette
Mise à jour de l'affichage sans rechargement de page

Back-office

Création, modification et suppression des recettes via EasyAdmin

API

Exposition des recettes via API Platform, consommée par la page publique
