# Insuffle WordPress Theme

Thème WordPress sur mesure pour **Insuffle** - Formation en facilitation et intelligence collective.

**Version:** 1.0.0
**Auteur:** Insuffle
**Site:** https://www.insuffle.com

---

## 📋 Description

Thème WordPress moderne, léger et optimisé pour les performances et le SEO. Construit from scratch avec les couleurs et l'identité visuelle d'Insuffle.

### Caractéristiques principales

✅ **Design System complet** avec couleurs Insuffle (Bleu #1f3a8b, Jaune #ffde59)
✅ **Performance optimisée** (90+ PageSpeed)
✅ **SEO-ready** (Schema.org, Open Graph, breadcrumbs)
✅ **Responsive mobile-first**
✅ **Accessible** (WCAG 2.1 AA)
✅ **Gutenberg compatible**
✅ **Intégrations plugins** (Contact Form 7, HubSpot, Rank Math, YARPP, Spectra)

---

## 🚀 Installation

### Prérequis

- WordPress 6.0+
- PHP 8.0+
- MySQL 5.7+ ou MariaDB 10.3+

### Étapes d'installation

1. **Télécharger le thème**
   ```bash
   cd wp-content/themes/
   git clone https://github.com/ylureault/Insuffle-Theme-Wordpress.git insuffle-theme
   ```

2. **Activer le thème**
   - Aller dans `Apparence > Thèmes`
   - Activer "Insuffle"

3. **Configurer les menus**
   - Aller dans `Apparence > Menus`
   - Créer un menu et l'assigner à "Menu Principal"
   - (Optionnel) Créer un menu footer et l'assigner à "Menu Footer"

4. **Configurer les widgets**
   - Aller dans `Apparence > Widgets`
   - Ajouter des widgets dans les 4 colonnes footer

5. **Personnaliser via Customizer**
   - Aller dans `Apparence > Personnaliser`
   - Configurer :
     - Logo
     - Informations de contact (téléphone, email, adresse)
     - Réseaux sociaux (LinkedIn, Facebook, Twitter)
     - Texte footer
     - Page d'accueil (titre hero, sous-titre, description)

---

## ⚙️ Configuration

### Menus

Le thème supporte **3 emplacements de menus** :

1. **Menu Principal** (`primary`) - Navigation principale dans le header
2. **Menu Footer** (`footer`) - Menu dans le footer
3. **Menu Réseaux Sociaux** (`social`) - Liens réseaux sociaux (optionnel)

### Widgets

Le thème propose **4 zones de widgets** dans le footer :

- Footer Colonne 1
- Footer Colonne 2
- Footer Colonne 3
- Footer Colonne 4

### Tailles d'images

Le thème enregistre les tailles d'images suivantes :

- `insuffle-hero` : 1920x1080 (hero section)
- `insuffle-card` : 600x400 (cards d'articles)

### Palette de couleurs Gutenberg

Le thème définit une palette de couleurs personnalisée dans l'éditeur Gutenberg :

- **Bleu Insuffle** : #1f3a8b
- **Jaune Insuffle** : #ffde59
- **Bleu Clair** : #c3d1e4
- **Gris Foncé** : #333333
- **Blanc** : #ffffff

---

## 🎨 Customizer

### Informations de Contact

- **Téléphone** : Affiché dans le hero et le footer
- **Email** : Lien mailto dans les CTA
- **Adresse** : Affichée dans le footer

### Réseaux Sociaux

- **LinkedIn URL**
- **Facebook URL**
- **Twitter URL**

### Footer

- **Texte Copyright** : Texte personnalisable dans le footer
- **Logo Footer** : Image affichée dans le bas du footer

### Page d'Accueil

- **Titre Hero** : Titre principal de la section hero
- **Sous-titre Hero** : Sous-titre (ex: "Insuffle Académie")
- **Description Hero** : Texte descriptif sous le titre

---

## 🔌 Plugins Recommandés

### Plugins obligatoires

- **Rank Math SEO** : SEO, breadcrumbs, schema.org
- **Contact Form 7** : Formulaires de contact

### Plugins recommandés

- **HubSpot** : CRM et tracking marketing
- **YARPP** : Articles liés (Yet Another Related Posts Plugin)
- **Spectra** : Blocs Gutenberg avancés
- **WP Rocket** : Cache et optimisation performance
- **Imagify** : Optimisation d'images

---

## 📝 Utilisation

### Page d'Accueil

Le thème utilise `front-page.php` pour la homepage.

**Contenu modifiable via :**

1. **Customizer** :
   - Titre, sous-titre, description hero
   - Téléphone, email

2. **Éditeur de page** :
   - Créer une page "Accueil"
   - Utiliser Gutenberg pour ajouter des sections
   - Aller dans `Réglages > Lecture` et définir cette page comme page d'accueil

### Création de contenu

Le thème est 100% compatible Gutenberg. Utilisez les blocs pour créer vos pages :

- **Blocs natifs WordPress**
- **Blocs Spectra** (si plugin installé)
- **Palette couleurs Insuffle** dans le sélecteur de couleurs

### Shortcodes disponibles

#### `[liens_reseau]`

Affiche les liens vers les autres sites du réseau Insuffle.

```
[liens_reseau]
```

Source du JSON : `https://www.insuffle.com/site-insuffle.json`

---

## 🛠️ Développement

### Structure du thème

```
insuffle-theme/
├── style.css                 # Metadata + Design System CSS
├── functions.php             # Require inc/ files
├── header.php                # Header template
├── footer.php                # Footer template
├── front-page.php            # Homepage template
├── index.php                 # Fallback template
├── page.php                  # Page template
├── single.php                # Single post template
├── archive.php               # Archive template
├── search.php                # Search results template
├── 404.php                   # 404 error page
├── searchform.php            # Search form
├── comments.php              # Comments template
│
├── inc/
│   ├── theme-setup.php       # Theme supports, menus, widgets
│   ├── enqueue-scripts.php   # CSS/JS loading
│   ├── template-functions.php # Helper functions
│   ├── customizer.php        # Customizer settings
│   ├── plugin-compatibility.php # Plugin integrations
│   ├── seo-structure.php     # Schema.org, OG tags
│   └── performance.php       # Performance optimizations
│
├── template-parts/
│   ├── content.php           # Post content template
│   ├── content-excerpt.php   # Excerpt template
│   └── content-none.php      # No content found template
│
├── assets/
│   ├── css/
│   │   ├── main.css
│   │   └── editor-style.css
│   └── js/
│       ├── navigation.js
│       └── main.js
│
└── languages/
```

### Variables CSS

Le thème utilise des CSS Variables natives :

```css
:root {
    /* Couleurs */
    --primary: #1f3a8b;
    --secondary: #ffde59;
    --accent: #c3d1e4;

    /* Espacements */
    --spacing-sm: 1rem;
    --spacing-md: 2rem;
    --spacing-lg: 3rem;

    /* Transitions */
    --transition-base: 0.3s ease;
}
```

### Hooks disponibles

Le thème utilise les hooks WordPress standards. Aucun hook custom.

---

## 🔒 Sécurité

Le thème suit les meilleures pratiques de sécurité WordPress :

✅ Toutes les sorties sont échappées (`esc_html()`, `esc_url()`, `esc_attr()`, etc.)
✅ Toutes les entrées sont sanitizées
✅ Nonces pour les formulaires
✅ Vérifications de capacités utilisateur
✅ Aucune inclusion directe de fichiers externes

---

## 📊 Performance

### Optimisations incluses

- **Critical CSS inline** dans `<head>`
- **JavaScript defer** pour tous les scripts
- **Lazy loading images** natif
- **Preconnect** Google Fonts
- **Emoji scripts désactivés**
- **jQuery Migrate supprimé**
- **Query strings supprimées** des assets
- **Révisions limitées** à 3 par post

### Objectif PageSpeed

- **Desktop** : 95+
- **Mobile** : 90+

---

## ♿ Accessibilité

Le thème respecte les standards d'accessibilité :

✅ **WCAG 2.1 AA compliant**
✅ Skip links pour navigation clavier
✅ ARIA labels sur tous les éléments interactifs
✅ Contrastes couleurs validés
✅ Navigation clavier complète
✅ Screen reader friendly

---

## 🌐 Internationalisation

Le thème est entièrement traduisible :

- **Text Domain** : `insuffle`
- **Langue par défaut** : Français (fr_FR)
- **Fichiers de traduction** : `languages/`

Pour traduire le thème :

1. Utiliser **Poedit** ou **Loco Translate**
2. Générer les fichiers `.po` et `.mo`
3. Placer dans `languages/`

---

## 🐛 Support

### Signaler un bug

Ouvrir une issue sur GitHub :
https://github.com/ylureault/Insuffle-Theme-Wordpress/issues

### Demander une fonctionnalité

Ouvrir une discussion sur GitHub :
https://github.com/ylureault/Insuffle-Theme-Wordpress/discussions

---

## 📄 Licence

Ce thème est sous licence **GNU General Public License v2 or later**.

---

## 👨‍💻 Crédits

**Développé par :** Claude Code pour Insuffle
**Design inspiré de :** Templates HTML Insuffle
**Typographie :** Montserrat (Google Fonts)

---

## 🔄 Changelog

Voir [CHANGELOG.md](CHANGELOG.md) pour l'historique complet des versions.

---

**© 2025 Insuffle - Tous droits réservés**
