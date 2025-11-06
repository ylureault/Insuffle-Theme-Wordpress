# Changelog

Toutes les modifications notables de ce projet seront documentées dans ce fichier.

Le format est basé sur [Keep a Changelog](https://keepachangelog.com/fr/1.0.0/),
et ce projet adhère au [Semantic Versioning](https://semver.org/lang/fr/).

---

## [1.0.0] - 2025-11-06

### ✨ Ajouté

#### Core
- Nouveau thème WordPress construit from scratch
- Design System complet avec couleurs Insuffle (Bleu #1f3a8b, Jaune #ffde59)
- Structure de fichiers propre et organisée
- Functions.php minimaliste avec require de tous les inc/

#### Templates
- `header.php` - Header avec navigation sticky
- `footer.php` - Footer avec 4 colonnes widgets
- `front-page.php` - Homepage avec hero section personnalisable
- `index.php` - Template fallback
- `page.php` - Template pages
- `single.php` - Template articles
- `archive.php` - Template archives
- `search.php` - Template résultats recherche
- `404.php` - Page erreur 404
- `searchform.php` - Formulaire de recherche
- `comments.php` - Template commentaires

#### Template Parts
- `template-parts/content.php` - Contenu article complet
- `template-parts/content-excerpt.php` - Extrait pour archives
- `template-parts/content-none.php` - Aucun contenu trouvé

#### Inc Files
- `inc/theme-setup.php` - Theme supports, menus, widgets, Gutenberg
- `inc/enqueue-scripts.php` - Chargement CSS/JS optimisé
- `inc/template-functions.php` - Fonctions helper + shortcode liens_reseau
- `inc/customizer.php` - Customizer natif WordPress (contact, social, footer, homepage)
- `inc/plugin-compatibility.php` - Intégrations CF7, HubSpot, Rank Math, YARPP, Spectra
- `inc/seo-structure.php` - Schema.org (Organization + LocalBusiness), OG tags, breadcrumbs
- `inc/performance.php` - Optimisations performance (critical CSS, defer JS, lazy loading)

#### Assets
- `assets/css/main.css` - CSS additionnel (minimal)
- `assets/css/editor-style.css` - Styles éditeur Gutenberg
- `assets/js/navigation.js` - Navigation mobile, menu toggle, sticky header
- `assets/js/main.js` - Smooth scroll, animations, external links, back to top

#### Features

**Design System**
- Variables CSS natives pour couleurs, espacements, typographie
- Typographie Montserrat (Google Fonts avec preconnect)
- Components réutilisables (buttons, cards, grids, hero, stats, badges)
- Responsive mobile-first
- Gradients Insuffle

**Menus**
- Menu Principal (navigation header)
- Menu Footer (liens footer)
- Menu Réseaux Sociaux (liens sociaux)

**Widgets**
- 4 zones footer (colonnes 1, 2, 3, 4)

**Customizer**
- Section Informations de Contact (téléphone, email, adresse)
- Section Réseaux Sociaux (LinkedIn, Facebook, Twitter)
- Section Footer (texte copyright, logo footer)
- Section Homepage (titre hero, sous-titre, description)

**Gutenberg**
- Palette couleurs Insuffle dans l'éditeur
- Editor styles pour preview WYSIWYG
- Support align-wide, responsive-embeds
- Compatible blocs Spectra

**SEO**
- Schema.org Organization markup
- Schema.org LocalBusiness markup
- Open Graph tags (fallback si Rank Math absent)
- Twitter Cards
- Breadcrumbs support (Rank Math)
- HTML sémantique (<header>, <nav>, <main>, <article>, <footer>)
- Balises alt sur toutes les images

**Performance**
- Critical CSS inline dans <head>
- JavaScript defer pour tous les scripts
- Lazy loading images natif
- Preconnect Google Fonts
- Font-display: swap
- Emoji scripts désactivés
- jQuery Migrate supprimé
- Query strings supprimées des assets
- Révisions limitées à 3 par post
- Remove unnecessary WordPress head tags

**Accessibilité**
- WCAG 2.1 AA compliant
- Skip link pour navigation clavier
- ARIA labels sur tous les éléments interactifs
- Contrastes couleurs validés
- Screen reader text pour éléments visuels
- Navigation clavier complète

**Plugin Integrations**
- **Contact Form 7** : Styles personnalisés pour formulaires
- **HubSpot** : Support tracking code
- **Rank Math SEO** : Breadcrumbs, compatibilité schema.org
- **YARPP** : Styles articles liés
- **Spectra** : Compatibilité blocs Gutenberg

**Shortcodes**
- `[liens_reseau]` - Affiche liens réseau Insuffle depuis JSON externe

#### Documentation
- `README.md` - Documentation complète (installation, configuration, utilisation)
- `MIGRATION.md` - Guide migration détaillé depuis ancien thème
- `CHANGELOG.md` - Historique des versions

### 🎨 Design

- Hero section avec gradient bleu Insuffle
- Stats animées dans le hero
- Cards avec hover effects
- Highlight boxes avec bordure primary
- Quote blocks avec bordure secondary
- Grids responsive (2, 3, 4 colonnes)
- Buttons avec gradients et hover effects
- Footer multi-colonnes avec logo

### ⚡ Performance

Optimisations pour atteindre PageSpeed 90+ :
- CSS : 1 fichier principal + critical CSS inline
- JS : 2 fichiers (navigation + main) en defer
- Images : Lazy loading natif + responsive images (srcset)
- Fonts : Montserrat via Google Fonts avec preconnect
- No jQuery en front-end
- Bloat WordPress supprimé

### 🔒 Sécurité

- Toutes les sorties échappées (esc_html, esc_url, esc_attr)
- Toutes les entrées sanitizées
- Vérifications capabilities
- Aucune inclusion fichier externe non sécurisée

### 🌐 Internationalisation

- Text domain : `insuffle`
- Toutes les strings traduisibles
- Prêt pour traduction .po/.mo
- Langue par défaut : Français (fr_FR)

### 📱 Responsive

Breakpoints :
- Mobile : < 768px
- Tablet : 768px - 992px
- Desktop : > 992px

### ♻️ Migré depuis ancien thème

- Shortcode `[liens_reseau]` préservé
- Structure HTML sémantique améliorée
- Accessibilité renforcée

### ❌ Supprimé (depuis Twenty Twenty)

- Redux Framework (non utilisé)
- Cover template (inutile)
- Modal menu/search complexe (simplifié)
- Font Inter (remplacée par Montserrat)
- Couleurs Twenty Twenty (remplacées par couleurs Insuffle)
- Bloat CSS (6584 lignes → ~1200 lignes)
- Bloat JS (28 Ko → ~8 Ko)
- Classes Twenty Twenty non utilisées
- Walker custom pages (inutile)
- Block patterns starter content

---

## [Unreleased]

### À venir dans les prochaines versions

- Template page formations
- Custom Post Type "Formations"
- Formulaire inscription formation via CF7
- Intégration calendrier formations
- Témoignages avec carrousel
- Logos clients slider
- Animations on scroll (AOS.js)
- Mode sombre (optionnel)
- Filtres formations par catégorie
- Recherche facettes

---

## Notes de version

### Compatibilité

- **WordPress** : 6.0+
- **PHP** : 8.0+
- **MySQL** : 5.7+
- **MariaDB** : 10.3+

### Plugins requis

- Rank Math SEO (ou Yoast SEO)
- Contact Form 7

### Plugins recommandés

- HubSpot
- YARPP (Yet Another Related Posts Plugin)
- Spectra (Blocs Gutenberg)
- WP Rocket (Cache)
- Imagify (Optimisation images)

### Navigateurs supportés

- Chrome (dernières 2 versions)
- Firefox (dernières 2 versions)
- Safari (dernières 2 versions)
- Edge (dernières 2 versions)

---

## Liens

- **Repository** : https://github.com/ylureault/Insuffle-Theme-Wordpress
- **Site web** : https://www.insuffle.com
- **Issues** : https://github.com/ylureault/Insuffle-Theme-Wordpress/issues

---

**[1.0.0]** - Version initiale - 2025-11-06
