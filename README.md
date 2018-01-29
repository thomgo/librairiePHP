# Application de gestion de livre en PHP orienté objet

Il s'agit d'une application développée dans le cadre de mon poste de formateur en développement web pour Simplon Roubaix. L'objectif est que les apprenants produisent une application sur la base du modèle MVC en y intégrant la programmation orientée objet sans le modèle requête/réponse.

La version présentée est une correction de base n'intégrant pas toutes les fonctionnalités

L'objectif est que les apprenants travaillent au travers de cet exercice les concepts fondamentaux de la POO dans le cadre d'une application.

## Consignes

Vous allez créer une application qui permet à un/une bibliothécaire de gérer son catalogue de livres
ainsi que les prêts et les rendus. L’application permettra de :
- Afficher la liste des livres contenus dans la catalogue ainsi que leur statut (disponible ou prêté)
- Afficher la liste de tous les utilisateurs enregistrés dans le système ainsi que leurs informations personnelles
- Ajouter un livre au catalogue
- Pouvoir trier les livres selon leur catégorie grâce à un dropdown (par exemple : roman, poésie,
aventure...). Quand l’utilisateur clique par exemple sur roman, la page n’affiche que les livre de la catégorie roman.
- Pouvoir accéder à la fiche descriptive de chaque livre enregistré en BDD
- Pouvoir modifier la statut de chaque livre de disponible à prêté et de prêté à disponible.

Quand un livre est prêté le/la bibliothécaire indique le numéro d’identification unique de l’utilisateur afin de savoir qui a emprunté quoi. Quand on revient sur la fiche descriptive du livre celle-ci indique maintenant les informations du livre ainsi que celles de l’utilisateur qui l’a emprunté.

Pour rappel, voici une liste non exhaustive des informations utiles à connaître à propos d’un livre : titre, auteur, résumé, date de parution, catégorie. Bien entendu vous devrez en rajouter d’autres.

## Pour aller plus loin

Nous vous avons demandé quelques fonctionnalités basiques d’un système de gestion de
bibliothèque mais vous pouvez aller bien plus loin et le transformer en véritable application
professionnelle. Voici par exemple les fonctionnalités que vous pouvez rajouter :
- Proposer un formulaire pour permettre d’ajouter un utilisateur
- Affiner les formulaires de tri et permettre de trier selon tous les critères existants (auteur, date de parution etc)
- Gérer les dates de prêt et de retour afin de toujours savoir exactement le nombres de jours restant avant le rendu
- Avoir accès à une page de détail des informations utilisateur qui liste tous les livres que
l’utilisateur a emprunté
- Avoir plusieurs exemplaires d’un même livre en stock
