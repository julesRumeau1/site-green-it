Installation (XAMPP)
1) Copier le dossier "site" dans htdocs.
2) Créer une base "scierie" puis importer le fichier scierie.sql.
3) Ouvrir http://localhost/site/index.php

Notes de refonte (éco-conception)
- Aucun CDN / framework (police système, JS vanilla).
- Images optimisées et versions WebP.
- Liste produits + formulaires en AJAX (fetch).
- Sécurisation connexion : POST, requêtes préparées, CSRF, session_regenerate_id.
- Admin non fonctionnel, mais interface homogène.
