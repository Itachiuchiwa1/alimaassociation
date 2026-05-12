# 🚀 Démarrage rapide — Site DÉMÉ dynamique

## ⚡ Commandes essentielles

### Démarrer le serveur
```bash
cd C:\xampp\htdocs\alimaassociation
php artisan serve --host=127.0.0.1 --port=8000
```

Le serveur démarre sur **http://127.0.0.1:8000**

### Accéder à l'admin
```
http://127.0.0.1:8000/admin
```

L'admin redirige vers **http://127.0.0.1:8000/admin/settings** (paramètres)

---

## 🎯 Premiers pas

### 1. Configurer les informations de l'association
1. Aller sur http://127.0.0.1:8000/admin/settings
2. Remplir Adresse, Téléphone, Email
3. Cliquer **Enregistrer**

### 2. Créer une catégorie de Blog
1. Aller sur http://127.0.0.1:8000/admin/blog-categories
2. Cliquer **Ajouter**
3. Entrer "Conseils santé" (ou autre catégorie)
4. Cliquer **Créer**

### 3. Créer un premier article
1. Aller sur http://127.0.0.1:8000/admin/blog-posts
2. Cliquer **Ajouter un article**
3. Remplir les champs
4. Choisir la catégorie créée
5. Cocher "Publier maintenant"
6. Cliquer **Créer**
7. L'article apparaît immédiatement sur http://127.0.0.1:8000/blog

### 4. Créer une action
1. Aller sur http://127.0.0.1:8000/admin/actions
2. Cliquer **Ajouter une action**
3. Titre : "Sensibilisations"
4. Description : (texte descriptif)
5. Icône : Choisir "megaphone" ou autre
6. Cliquer **Créer**
7. L'action apparaît sur http://127.0.0.1:8000/actions

### 5. Ajouter une image à la galerie
1. Aller sur http://127.0.0.1:8000/admin/gallery-categories
2. Créer une catégorie (ex: "Formations")
3. Aller sur http://127.0.0.1:8000/admin/gallery-images
4. Cliquer **Ajouter une image**
5. Choisir catégorie et uploader l'image
6. Cliquer **Ajouter**
7. L'image apparaît sur http://127.0.0.1:8000/galerie

---

## 📋 Pages publiques

| Page | URL | Type de contenu |
|------|-----|-----------------|
| Accueil | / | Statique (pour l'instant) |
| À propos | /a-propos | Statique |
| Actions | /actions | **Dynamique** ✅ |
| Galerie | /galerie | **Dynamique** ✅ |
| Blog | /blog | **Dynamique** ✅ |
| Contact | /contact | **Dynamique** ✅ (formulaires + coordonnées) |
| Don | /don | Statique |

---

## 🛠️ Admin CMS

| Section | URL | Fonctionnalité |
|---------|-----|----------------|
| Paramètres | /admin/settings | Adresse, téléphone, email du site |
| Actions | /admin/actions | CRUD complet (Créer, Afficher, Éditer, Supprimer) |
| Catégories Blog | /admin/blog-categories | CRUD catégories |
| Articles | /admin/blog-posts | CRUD articles avec upload image |
| Catégories Galerie | /admin/gallery-categories | CRUD catégories |
| Images Galerie | /admin/gallery-images | CRUD images avec upload |
| Messages | /admin/contacts | Afficher, marquer comme lu, supprimer |

---

## 💡 Tips & Tricks

### Upload d'images
- Formats acceptés : JPG, PNG, GIF
- Taille max : 2 MB par image
- Les images sont stockées dans `storage/app/public/`
- Les chemins sont convertis automatiquement pour l'affichage

### Icônes disponibles (pour les actions)
- `megaphone` 🔊
- `book` 📖
- `graduation` 🎓
- `heart` ❤️
- `users` 👥
- `shield` 🛡️

### Dates
- Format d'entrée : YYYY-MM-DD (2026-05-12)
- Format d'affichage : JJ MMMM YYYY (12 mai 2026)

### Messages de contact
- Affichage dans http://127.0.0.1:8000/admin/contacts
- Marquage comme "lu"
- Possibilité de supprimer
- Distinction entre contacts normaux et questions anonymes

---

## 🔧 Structure de fichiers créés

```
app/
  Http/Controllers/
    Admin/
      ActionController.php
      BlogCategoryController.php
      BlogPostController.php
      GalleryCategoryController.php
      GalleryImageController.php
      ContactController.php
      SiteSettingController.php
  Models/
    Action.php
    BlogCategory.php
    BlogPost.php
    GalleryCategory.php
    GalleryImage.php
    Contact.php
    SiteSetting.php

database/
  migrations/
    2026_05_12_000001_create_actions_table.php
    2026_05_12_000002_create_blog_categories_table.php
    2026_05_12_000003_create_blog_posts_table.php
    2026_05_12_000004_create_gallery_categories_table.php
    2026_05_12_000005_create_gallery_images_table.php
    2026_05_12_000006_create_contacts_table.php
    2026_05_12_000007_create_site_settings_table.php

resources/views/
  admin/
    layouts/
      app.blade.php
    actions/
      index.blade.php
      create.blade.php
      edit.blade.php
    blog-categories/
      (idem structure)
    blog-posts/
      (idem structure)
    gallery-categories/
      (idem structure)
    gallery-images/
      (idem structure)
    contacts/
      index.blade.php
      show.blade.php
    settings/
      index.blade.php
  components/
    icon-svg.blade.php
```

---

## ✅ Validation complète

- ✅ Tous les formulaires validés côté serveur
- ✅ Messages d'erreur affichés à l'utilisateur
- ✅ Données correctement sauvegardées en base
- ✅ Frontend préservé et identique
- ✅ Images uploadées et accessibles
- ✅ Coordonnées dynamiques fonctionnelles
- ✅ Formulaires de contact sauvegardés en DB

---

## 📞 Support

Pour plus de détails, voir **IMPLEMENTATION_DOCUMENTATION.md** dans le répertoire racine.

**Bonne gestion du contenu!** 🎉
