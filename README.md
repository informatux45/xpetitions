![alt XOOPS CMS](https://xoops.org/images/logoXoops4GithubRepository.png)
## [Module Xpetitions](https://dev.informatux.com "Module Xpetitions") pour le CMS XOOPS
[![XOOPS CMS Module](https://img.shields.io/badge/XOOPS%20CMS-Module-blue.svg)](https://xoops.org)
[![Software License](https://img.shields.io/badge/license-GPL-brightgreen.svg?style=flat)](http://www.gnu.org/licenses/gpl-2.0.html)

[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/mambax7/xpetitions.svg?style=flat)](https://scrutinizer-ci.com/g/mambax7/xpetitions/?branch=master)
[![Codacy Badge](https://api.codacy.com/project/badge/grade/2d27c0023ee54f0b9ba2b5d17a68b2a5)](https://www.codacy.com/app/mambax7/xpetitions)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/9dc918fe-ea63-4675-832c-8f6c74cdf78f/mini.png)](https://insight.sensiolabs.com/projects/9dc918fe-ea63-4675-832c-8f6c74cdf78f)

Description
=================

Module de pétitions en ligne multilangues développé pour fonctionner avec le hack Smartfactory Multilanguages.
Les formulaires peuvent être accompagnés d'une vérification anti-spams CAPTCHA aux choix (3).

Vous pouvez créer autant de pétitions que vous le désirez.

Chaque pétition peut posséder 3 statuts :
* Active (La pétition peut être signée si la date de démarrage n'est pas supérieur à la date du jour)
* hors ligne (La pétition n'est pas visible et ne peut pas être signée)
* Archivée (La pétition est visible et consultable mais ne peut pas être signée)

Une aide est présente sur chaque page de l'admin pour vous aider avec les différentes options possibles.

Le module possède une feuille de style que vous pouvez modifier suivant vos chartes graphiques.

Les fonctionnalités du module (admin) :
- Création de pétitions (table des signatures, titre, description, email de réponse, statut, date de démarrage, document papier associé)
- Modification et suppression de pétitions
- Visualisation des signatures
- Extraction des signatures au format .csv
- Relance des signataires qui n'ont pas confirmé leur signature
- Enregistrement manuel de signatures (signature par document papier)
- Suppression de signatures
- Préférences avec multiples choix
- Blocks avec préférences (dernières signatures, pétitions actives, pétitions archivées)

Les fonctionnalité du module (client) :
- Barre de navigation dans les pétitions (paramétrable)
- Accueil du module avec récap des pétitions et nombres de signatures associés (paramétrable)
- Accueil d'une pétition avec description et barre dynamique (paramètres variables : document associé téléchargeable, envoyer à un ami (oui ou non))
- Envoyez à un ami : formulaire avec image captcha si activée et dynamique lorsque les champs sont remplis.
- Signature : formulaire avec image captcha si activée et contrôle de l'adresse email par script (5 niveaux de controle - voir fonction)
- Création d'une clé MD5 (15 positions) pour la validation des signatures
- Visualisation des tous les signataires ou par ordre alphabétique


Fonctionnalités supplémentaires
===============================

- Préférences : Validation des signatures par email ou par double click
- Préférences : Type d'éditeur au choix (pour la saisie des pétitions)
- Gestion des signatures : Validation forcée des signataires retardataires
- Gestion des emails : Modification des contenus des emails envoyés aux signataires
- Gestion des champs : Gestion des champs visibles et obligatoires du formulaire de signatures des pétitions
- Gestion des captchas (NOUVEAU) : Gestion des captchas visibles dans vos formulaires
- Feuille de style : Modification des barres dynamiques des pétitions (clear: both)
- Formulaire de signature : Message dynamique suivant option choisie (Email ou Automatique)
- Signatures (visualisation) : Entre parenthèses, affichage des informations sélectionnées dans l'administration
- Signatures (visualisation) : Suppression de la dernière virgule après le dernier signataire de la liste


Installation du module
======================

Xpetitions s'installe comme tous les autres modules Xoops.
Vous devez copier le répertoire /xpetitions dans le répertoire des modules Xoops de votre site.
Ensuite identifiez vous comme administrateur, menu Système admin -> modules puis dans les modules non installés, cliquez sur l'icône d'installation.
Puis, suivez les instruction qui suivent à l'écran.

Mettre le répertoire /xpetitions/csv/ accessible en écriture pour l'export des signatures (chmod 777).

Créer un répertoire, dans le répertoire upload de Xoops, (ex: /upload/xpetitions) accessible en écriture pour le stockage des pétitions papiers qui vous associerez à vos pétitions en ligne.

Il y a un fichier 'mysql.en.sql' pour les utilisateurs Anglophone dans le répertoire 'mysql'. Renommez ce fichier en 'mysql.sql' si vous souhaitez avoir les messages d'email en anglais.
Il y a un fichier 'mysql.it.sql' pour les utilisateurs Italiens dans le répertoire 'mysql'. Renommez ce fichier en 'mysql.sql' si vous souhaitez avoir les messages d'email en italien.

Versions Xoops supportées
=========================

Le module Xpetitions a été testé sur Xoops 2.5.5 (Versions supportées 2.5.x)


Langages
========

Le module est traduit en Français, en Anglais et en Italien (Merci à Francesco).



Versions supportées PHP/MYSQL
=============================

Mysql >= 3.23, 4.x, 5.x Php 5, Php 7.x



Feedback
========

Utilisez le site du dépot d'INFORMATUX:
https://dev.informatux.com

--

[![Tutorial Available](https://xoops.org/images/tutorial-available-blue.svg)](https://xoops.gitbook.io/xoops-xpetitions-module/) Tutorial: see [GitBook](https://xoops.gitbook.io/xoops-xpetitions-module/).


Xoops sur GITHUB : https://github.com/XOOPS
