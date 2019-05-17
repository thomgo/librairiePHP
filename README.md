# Application de gestion de livre en PHP orienté objet

Il s'agit d'une application développée dans le cadre de mon poste de formateur en développement web. L'objectif est que les apprenants produisent une application sur la base du modèle MVC avec base de données en y intégrant la programmation orientée objet mais sans le modèle requête/réponse.

Au travers de cet exercice, les étudiants apprennent à :
- Travailler au sein d'un architecture MVC
- Découper leur code de manière maintenable
- Produire une application orientée objet
- Utiliser les constantes de classe, méthodes statiques
- Manipuler le CRUD via un objet
- Réaliser des jointures en base de données

## Consignes

Vous êtes une équipe de développeurs juniors embauchés par une collectivité territoriale. Vous devez créer une application qui permette aux bibliothécaires de la ville de gérer le catalogue de livres ainsi que les prêts et les rendus.

Attention l’application n’est pas accessible aux utilisateurs. Seuls les employés des bibliothèques utilisent l’application. Quand quelqu’un veut emprunter un livre, il se présente au bureau de l’employé avec sa carte de membre.

L’application permettra de :

- Afficher la liste des livres contenus dans le catalogue ainsi que leur statut (disponible ou prêté)

- Ajouter un livre au catalogue

- Pouvoir trier les livres selon leur catégorie grâce à un dropdown (par exemple : roman, poésie, aventure…). Quand l’utilisateur clique par exemple sur roman, la page n’affiche que les livres de la catégorie roman.

- Pouvoir accéder à la fiche descriptive de chaque livre enregistré en BDD

- Pouvoir modifier la statut de chaque livre de disponible à prêté et de prêté à disponible. Quand un livre est prêté le/la bibliothécaire indique le numéro d’identification unique de l’utilisateur afin de savoir qui a emprunté quoi. Quand on revient sur la fiche descriptive du livre celle-ci indique maintenant les informations du livre ainsi que celles de l’utilisateur qui l’a emprunté.

- Afficher la liste de tous les utilisateurs enregistrés dans le système ainsi que leurs informations personnelles et les livres qu’ils ont éventuellement empruntés quand on clique sur leur fiche personnelle.

Pour rappel, voici une liste non exhaustive des informations utiles à connaître à propos d’un livre : titre, auteur, résumé, date de parution, catégorie. Bien entendu vous devrez en rajouter d’autres.

Spécifications techniques :

- Votre code est organisé selon l'architecture MVC
- Vous découpez votre code au maximum
- Vous rendez un code le plus maintenable possible
- Vous utilisez PDO pour vous connecter à la base de données
- Vous privilégiez les jointures aux doubles requêtes
- Vous utilisez au maximum les fonctionnalités de la programmation orientée objet

## Pour aller plus loin

Nous vous avons demandé quelques fonctionnalités basiques d’un système de gestion de bibliothèque mais vous pouvez aller bien plus loin et le transformer en véritable application professionnelle.

Voici par exemple les fonctionnalités que vous pouvez rajouter :

- Proposer un formulaire pour permettre d’ajouter un utilisateur
- Affiner les formulaires de tri et permettre de trier selon tous les critères existants (auteur, date de parution etc)
- Gérer les dates de prêt et de retour afin de toujours savoir exactement le nombres de jours restant avant le rendu
- Avoir accès à une page de détail des informations utilisateur qui liste tous les livres que l’utilisateur a emprunté
- Avoir plusieurs exemplaires d’un même livre en stock
