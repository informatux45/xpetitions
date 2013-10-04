Module de pétitions en ligne multilangues développé pour XOOPS.
Les formulaires peuvent être accompagnés d'une image CAPTCHA pour éviter les spams.
Vous pouvez créer autant de pétitions que vous le désirez.

Chaque pétition peut posséder 3 statuts :
* Active (La pétition peut être signée si la date n'est pas supérieur à la date du jour)
* hors ligne (La pétition n'est pas visible et ne peut pas être signée)
* Archivée (La pétition est visible mais ne peut pas être signée)

Une aide est présente sur chaque page de l'admin pour vous aider avec les différentes options possibles.

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
- Accueil du module avec récap des pétitions et nombres de signatures associés (paramétrable)
- Accueil d'une pétition avec description et barre dynamique (paramètres variables : document associé téléchargeable, envoyer à un ami (oui ou non))
- Envoyez à un ami : formulaire avec image captcha si activée et dynamique lorsque les champs sont remplis.
- Signature : formulaire avec image captcha si activée et contrôle de l'adresse email par script (5 niveaux de controle - voir fonction) ou par double page (double validation)
- Création d'une clé MD5 (15 positions) pour la validation des signatures
- Visualisation des tous les signataires ou par ordre alphabétique 