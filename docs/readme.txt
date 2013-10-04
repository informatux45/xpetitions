Module de p�titions en ligne multilangues d�velopp� pour XOOPS.
Les formulaires peuvent �tre accompagn�s d'une image CAPTCHA pour �viter les spams.
Vous pouvez cr�er autant de p�titions que vous le d�sirez.

Chaque p�tition peut poss�der 3 statuts :
* Active (La p�tition peut �tre sign�e si la date n'est pas sup�rieur � la date du jour)
* hors ligne (La p�tition n'est pas visible et ne peut pas �tre sign�e)
* Archiv�e (La p�tition est visible mais ne peut pas �tre sign�e)

Une aide est pr�sente sur chaque page de l'admin pour vous aider avec les diff�rentes options possibles.

Les fonctionnalit�s du module (admin) :
- Cr�ation de p�titions (table des signatures, titre, description, email de r�ponse, statut, date de d�marrage, document papier associ�)
- Modification et suppression de p�titions
- Visualisation des signatures
- Extraction des signatures au format .csv
- Relance des signataires qui n'ont pas confirm� leur signature
- Enregistrement manuel de signatures (signature par document papier)
- Suppression de signatures
- Pr�f�rences avec multiples choix
- Blocks avec pr�f�rences (derni�res signatures, p�titions actives, p�titions archiv�es)

Les fonctionnalit� du module (client) :
- Accueil du module avec r�cap des p�titions et nombres de signatures associ�s (param�trable)
- Accueil d'une p�tition avec description et barre dynamique (param�tres variables : document associ� t�l�chargeable, envoyer � un ami (oui ou non))
- Envoyez � un ami : formulaire avec image captcha si activ�e et dynamique lorsque les champs sont remplis.
- Signature : formulaire avec image captcha si activ�e et contr�le de l'adresse email par script (5 niveaux de controle - voir fonction) ou par double page (double validation)
- Cr�ation d'une cl� MD5 (15 positions) pour la validation des signatures
- Visualisation des tous les signataires ou par ordre alphab�tique 