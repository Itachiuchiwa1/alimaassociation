# DÉMÉ — Laravel (converti depuis React)

## 📁 Structure des fichiers à copier

```
laravel-output/
├── app/Http/Controllers/
│   ├── PageController.php
│   ├── ContactController.php
│   └── DonationController.php
├── resources/
│   ├── css/app.css                    ← remplace l'existant
│   ├── js/app.js                      ← remplace l'existant
│   └── views/
│       ├── layouts/app.blade.php      ← layout principal
│       ├── components/
│       │   ├── header.blade.php
│       │   └── footer.blade.php
│       └── pages/
│           ├── home.blade.php
│           ├── about.blade.php
│           ├── actions.blade.php
│           ├── gallery.blade.php
│           ├── blog.blade.php
│           ├── contact.blade.php
│           └── donation.blade.php
├── routes/web.php
├── vite.config.js
└── package.json
```

---

## 🚀 Installation étape par étape

### 1. Copier les fichiers
Copiez **chaque dossier** ci-dessus dans votre projet Laravel `associationdalima/` en écrasant les fichiers existants.

### 2. Images requises
Placez vos photos dans `public/assets/images/` :
```
public/assets/images/
├── logo-deme.jpg            ← logo de l'association
├── hero-girls.jpg           ← photo hero page accueil
├── action-formation.jpg     ← ateliers / formations
├── action-campagne.jpg      ← campagnes communautaires
└── action-accompagnement.jpg ← mentorat / accompagnement
```
> Si les images n'existent pas encore, remplacez-les par des placeholders.

### 3. Installer les dépendances JS
```bash
cd associationdalima
npm install
```

### 4. Compiler les assets
```bash
# Développement (avec hot reload)
npm run dev

# Production
npm run build
```

### 5. Lancer le serveur PHP
```bash
php artisan serve
```
→ http://localhost:8000

---

## 🎨 Design tokens — couleurs

| Variable CSS             | Valeur             | Usage                        |
|--------------------------|--------------------|------------------------------|
| `--color-primary`        | bleu royal         | boutons, liens actifs        |
| `--color-secondary`      | turquoise          | accents, hover               |
| `--color-deep`           | marine foncé       | sections sombres, footer     |
| `--color-background`     | blanc légèrement bleuté | fond général          |
| `--color-muted-foreground`| gris              | textes secondaires           |

Pour changer la couleur principale : modifiez `--primary` dans `resources/css/app.css`.

---

## 🔧 Configuration mail (Contact / Don)

Dans `ContactController.php` et `DonationController.php`, les envois de mail sont commentés.  
Pour les activer :

1. Configurez `.env` :
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_user
MAIL_PASSWORD=your_pass
MAIL_FROM_ADDRESS=contact@deme.org
MAIL_FROM_NAME="DÉMÉ"
```

2. Décommentez les blocs `Mail::` dans les controllers.

---

## 💳 Intégration paiement (Don)

Le `DonationController::store()` est prêt à recevoir un SDK de paiement.  
Priorités suggérées pour l'Afrique de l'Ouest :
- **Orange Money** — API Orange Money Web Payment
- **Wave** — Wave Checkout API
- **Stripe** — `composer require stripe/stripe-php`
- **PayPal** — `composer require paypal/rest-api-sdk-php`

---

## 📋 Routes disponibles

| Route      | URL            | Vue                    |
|------------|----------------|------------------------|
| `home`     | `/`            | `pages.home`           |
| `about`    | `/a-propos`    | `pages.about`          |
| `actions`  | `/actions`     | `pages.actions`        |
| `gallery`  | `/galerie`     | `pages.gallery`        |
| `blog`     | `/blog`        | `pages.blog`           |
| `contact`  | `/contact`     | `pages.contact`        |
| `donation` | `/don`         | `pages.donation`       |
