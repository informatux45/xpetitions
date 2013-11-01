Module de petitions en ligne multilangues developpe pour XOOPS.
Les formulaires peuvent etre accompagnes d'une image CAPTCHA pour eviter les spams.
Vous pouvez creer autant de petitions que vous le desirez.

Chaque petition peut posseder 3 statuts :
* Active (La petition peut etre signee si la date n'est pas superieur e la date du jour)
* hors ligne (La petition n'est pas visible et ne peut pas etre signee)
* Archivee (La petition est visible mais ne peut pas etre signee)

Une aide est presente sur chaque page de l'admin pour vous aider avec les differentes options possibles.

Les fonctionnalites du module (admin) :
- Creation de petitions (table des signatures, titre, description, email de reponse, statut, date de demarrage, document papier associe)
- Modification et suppression de petitions
- Visualisation des signatures
- Extraction des signatures au format .csv
- Relance des signataires qui n'ont pas confirme leur signature
- Enregistrement manuel de signatures (signature par document papier)
- Suppression de signatures
- Preferences avec multiples choix
- Blocks avec preferences (dernieres signatures, petitions actives, petitions archivees)

Les fonctionnalite du module (client) :
- Accueil du module avec recap des petitions et nombres de signatures associes (parametrable)
- Accueil d'une petition avec description et barre dynamique (parametres variables : document associe telechargeable, envoyer e un ami (oui ou non))
- Envoyez e un ami : formulaire avec image captcha si activee et dynamique lorsque les champs sont remplis.
- Signature : formulaire avec image captcha si activee et contrele de l'adresse email par script (5 niveaux de controle - voir fonction) ou par double page (double validation)
- Creation d'une cle MD5 (15 positions) pour la validation des signatures
- Visualisation des tous les signataires ou par ordre alphabetique 