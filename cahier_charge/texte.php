Les Rôles & Droits (Sécurité)

L'accès aux stocks de médicaments est hautement régulé. L'application implémente trois niveaux d'accès :

Préparateur / Gestionnaire de stock : Peut réceptionner les commandes, scanner les entrées (avec lots et péremptions) et enregistrer les sorties de stock (ventes ou dispensation).

Pharmacien Titulaire / Biologiste : Valide les inventaires, gère les retours aux laboratoires des produits proches de la péremption pour remboursement, et configure les seuils d'alerte.

Administrateur : Gère la sécurité, les utilisateurs, l'accès à la base de données des médicaments (ex: base Claude Bernard ou équivalent) et extrait les rapports financiers des pertes.

User Stories (Spécifications Fonctionnelles)

Épic 1 : Réception & Entrées intelligentes
US 1.1 : En tant que Préparateur en pharmacie,
Je veux enregistrer l'arrivée d'une commande en saisissant pour chaque produit son numéro de lot et sa date de péremption (date limite d'utilisation DLU),

Afin que le système puisse classer ce produit précisément dans la file d'attente FEFO.

Critères d'acceptation : Le formulaire de saisie refuse la validation si la date de péremption est vide ou antérieure à la date du jour.
Épic 2 : Surveillance & Alertes Péremption
US 2.1 : En tant que Pharmacien titulaire,
Je veux voir la liste des lots de médicaments classés par niveau de criticité de péremption (Vert : > 6 mois, Orange : < 90 jours, Rouge : < 30 jours),

Afin d' organiser un déstockage massif ou un retour au fournisseur.

Critères d'acceptation :

Un code couleur strict est appliqué sur l'interface.

Possibilité de filtrer pour ne voir que les lots "Alerte Rouge".

US 2.2 : En tant que Gestionnaire,
Je veux recevoir une notification système listant les produits qui vont périmer le mois prochain,Afin de ne jamais être pris de court.

Épic 3 : Sorties de stock intelligentes (Le Cœur FEFO)
US 3.1 : En tant que Préparateur,
lors de la vente ou dispensation d'un médicament, Je veux que l'application me désigne automatiquement le numéro de lot exact à aller chercher dans le tiroir (le plus proche de la péremption),

Afin d' appliquer la règle FEFO sans avoir à chercher manuellement dans les boîtes.

Critères d'acceptation :

Si deux lots du même médicament existent, le système décrémente en priorité le lot dont la DLU est la plus courte.

Épic 4 : Gestion des Pertes et Retours (Admin)
US 4.1 : En tant que Pharmacien,
Je veux déclarer un lot comme "Périmé / À détruire" si la date est dépassée,

Afin de le retirer du stock virtuel et l'envoyer dans le circuit de destruction (Cyclamed).

Critères d'acceptation :

Le statut du lot passe à Status::EXPIRED. Le stock disponible tombe à 0 pour ce lot.

US 4.2 : En tant qu' Administrateur,
Je veux générer un rapport financier mensuel de la valeur du stock perdu (périmé),

Afin d' ajuster les futures commandes et réduire le gaspillage.