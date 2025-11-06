# Guide de Migration - Ancien Thème vers Insuffle Theme

Ce document décrit la procédure complète pour migrer de l'ancien thème Twenty Twenty vers le nouveau thème Insuffle.

---

## ⚠️ AVANT DE COMMENCER

### Backups obligatoires

1. **Backup complet de la base de données**
   ```bash
   mysqldump -u USER -p DATABASE > backup_$(date +%Y%m%d).sql
   ```

2. **Backup des fichiers WordPress**
   ```bash
   tar -czf backup_wordpress_$(date +%Y%m%d).tar.gz /path/to/wordpress
   ```

3. **Exporter les réglages du thème actuel**
   - Via Customizer : prendre des screenshots de tous les réglages
   - Noter tous les menus assignés
   - Noter tous les widgets actifs

---

## 📋 PRÉ-MIGRATION - CHECKLIST

### 1. Environnement de test

❌ **NE JAMAIS MIGRER DIRECTEMENT EN PRODUCTION**

1. Créer un environnement de staging :
   - Sous-domaine (ex: `staging.insuffle.com`)
   - Local (via Local by Flywheel, XAMPP, etc.)
   - Plugin staging (WP Staging, etc.)

2. Cloner le site de production vers staging

3. Tester la migration sur staging d'abord

### 2. Audit du thème actuel

**Fonctionnalités à préserver :**

- ✅ Shortcode `[liens_reseau]` → **Déjà inclus dans nouveau thème**
- ✅ Menus (primary, expanded, mobile, footer, social) → **Simplifiés en 3 menus**
- ✅ Widgets footer → **4 colonnes footer disponibles**

**Fonctionnalités à migrer manuellement :**

- ⚠️ Custom CSS du Customizer → À copier dans CSS additionnel
- ⚠️ Couleurs personnalisées → **Nouvelles couleurs Insuffle**
- ⚠️ Options Redux Framework (si utilisé) → **Non compatible, reconfigurer**

### 3. Inventaire du contenu

Lister :
- [ ] Nombre de pages
- [ ] Nombre d'articles
- [ ] Templates de pages utilisés
- [ ] Formulaires Contact Form 7
- [ ] Tracking codes (HubSpot, Google Analytics, etc.)
- [ ] Widgets actifs

---

## 🚀 PROCÉDURE DE MIGRATION

### Étape 1 : Préparation (Staging)

1. **Installer le nouveau thème sur staging**
   ```bash
   cd wp-content/themes/
   git clone [URL_REPO] insuffle-theme
   ```

2. **Ne PAS activer le thème tout de suite**

### Étape 2 : Configuration du nouveau thème

#### A. Menus

1. Aller dans `Apparence > Menus`

2. **Menu Principal** (correspondance ancien "Primary")
   - Créer ou assigner à l'emplacement "Menu Principal"
   - Copier les éléments du menu "Primary" actuel

3. **Menu Footer** (correspondance ancien "Footer")
   - Créer ou assigner à l'emplacement "Menu Footer"
   - Copier les éléments du menu "Footer" actuel

4. **Menu Réseaux Sociaux** (nouveau)
   - Créer un menu pour les liens sociaux
   - Assigner à "Menu Réseaux Sociaux"

**Note :** Les menus "Mobile" et "Expanded" n'existent plus (gestion automatique responsive).

#### B. Widgets Footer

Le nouveau thème a **4 colonnes footer** au lieu de 2.

**Ancien thème (Twenty Twenty) :**
- Footer #1
- Footer #2

**Nouveau thème (Insuffle) :**
- Footer Colonne 1
- Footer Colonne 2
- Footer Colonne 3
- Footer Colonne 4

**Migration :**

1. Copier le contenu de "Footer #1" → "Footer Colonne 1"
2. Copier le contenu de "Footer #2" → "Footer Colonne 2"
3. Ajouter du contenu dans colonnes 3 et 4 (ou laisser vides)

**Widgets recommandés :**

- **Colonne 1** : Informations Insuffle Académie
- **Colonne 2** : Liens formations
- **Colonne 3** : Informations légales
- **Colonne 4** : Contact (téléphone, email, adresse)

#### C. Customizer

Aller dans `Apparence > Personnaliser` :

1. **Identité du site**
   - Uploader le logo Insuffle
   - Vérifier le titre et slogan

2. **Informations de Contact**
   - Téléphone : `09 80 80 89 62`
   - Email : `contact@insuffle-academie.com`
   - Adresse : `410 RUE DE LA PRINCESSE TROUBETSKOI, 14800 Deauville, France`

3. **Réseaux Sociaux**
   - LinkedIn URL
   - Facebook URL
   - Twitter URL

4. **Paramètres Footer**
   - Texte copyright
   - Logo footer (si différent du logo principal)

5. **Page d'Accueil**
   - Titre Hero : `Formation Facilitation & Intelligence Collective`
   - Sous-titre Hero : `Insuffle Académie`
   - Description Hero : `Devenez facilitateur en 3 jours. Formation immersive en facilitation et intelligence collective.`

6. **HubSpot Code** (si utilisé)
   - Ajouter le code tracking HubSpot via le Customizer ou directement dans `inc/plugin-compatibility.php`

#### D. Homepage

Le nouveau thème utilise `front-page.php`.

**Option 1 : Utiliser la homepage par défaut**
- La section Hero est gérée par le Customizer
- Le reste du contenu peut être ajouté via Gutenberg

**Option 2 : Créer une page d'accueil personnalisée**
1. Créer une nouvelle page "Accueil"
2. Utiliser l'éditeur Gutenberg pour créer le contenu
3. Aller dans `Réglages > Lecture` → "Page d'accueil" → Sélectionner "Accueil"

**Sections à recréer (si nécessaire) :**
- Hero (automatique via `front-page.php`)
- Logos clients (via Gutenberg)
- Services (via Gutenberg)
- Témoignages (via Gutenberg)
- CTA finale (automatique via `front-page.php`)

### Étape 3 : Migration du contenu

#### A. Pages existantes

1. Vérifier que toutes les pages s'affichent correctement
2. Vérifier les featured images
3. Vérifier les templates de pages utilisés

**Templates incompatibles :**
- `template-cover.php` → **N'existe pas dans nouveau thème**
- `template-full-width.php` → **N'existe pas dans nouveau thème**

**Solution :** Utiliser l'éditeur de blocs Gutenberg pour recréer la mise en page.

#### B. Articles de blog

1. Tous les articles sont automatiquement compatibles
2. Vérifier l'affichage dans `single.php`
3. Vérifier les archives de catégories
4. Vérifier la recherche

#### C. Formulaires Contact Form 7

1. Aller dans `Contact > Formulaires de contact`
2. Tester tous les formulaires
3. Vérifier les styles (le thème ajoute des styles CF7 personnalisés)

#### D. YARPP (Articles liés)

1. Si YARPP est activé, il s'affiche automatiquement en bas des articles
2. Vérifier l'affichage sur un article
3. Les styles YARPP sont inclus dans le thème

### Étape 4 : Tests (Staging)

#### Tests fonctionnels

- [ ] Homepage s'affiche correctement
- [ ] Navigation menu fonctionne (desktop + mobile)
- [ ] Footer s'affiche avec les 4 colonnes
- [ ] Pages statiques s'affichent
- [ ] Articles de blog s'affichent
- [ ] Archives de catégories fonctionnent
- [ ] Recherche fonctionne
- [ ] Formulaires CF7 fonctionnent et s'envoient
- [ ] YARPP affiche les articles liés
- [ ] Breadcrumbs Rank Math s'affichent
- [ ] Commentaires fonctionnent (si activés)

#### Tests responsive

- [ ] Mobile (iPhone, Android)
- [ ] Tablet (iPad, Android tablet)
- [ ] Desktop (1920px, 1440px, 1024px)

#### Tests navigateurs

- [ ] Chrome
- [ ] Firefox
- [ ] Safari
- [ ] Edge

#### Tests performance

1. **PageSpeed Insights**
   - Desktop : Objectif 95+
   - Mobile : Objectif 90+

2. **GTmetrix**
   - Grade A minimum

3. **WebPageTest**
   - First Contentful Paint < 1.5s
   - Largest Contentful Paint < 2.5s

#### Tests SEO

- [ ] Balises title correctes
- [ ] Meta descriptions présentes
- [ ] OG tags présents (via Rank Math ou fallback thème)
- [ ] Schema.org markup présent (Organization + LocalBusiness)
- [ ] Breadcrumbs fonctionnent
- [ ] Sitemap XML accessible
- [ ] robots.txt correct

#### Tests accessibilité

1. **Wave Accessibility Tool**
   - 0 erreurs critiques

2. **Navigation clavier**
   - Tab pour naviguer
   - Enter pour activer liens/boutons
   - Esc pour fermer menu mobile

3. **Screen reader**
   - Tester avec NVDA ou JAWS

#### Tests W3C

- [ ] HTML valide : https://validator.w3.org/
- [ ] CSS valide : https://jigsaw.w3.org/css-validator/

### Étape 5 : Migration en production

**Uniquement si tous les tests sont OK**

#### A. Backup production

```bash
# Base de données
mysqldump -u USER -p DATABASE > backup_prod_avant_migration_$(date +%Y%m%d).sql

# Fichiers
tar -czf backup_prod_avant_migration_$(date +%Y%m%d).tar.gz /path/to/wordpress
```

#### B. Activer le nouveau thème

1. **Via l'admin WordPress**
   - `Apparence > Thèmes`
   - Activer "Insuffle"

2. **Vérifier immédiatement**
   - Homepage s'affiche
   - Menu fonctionne
   - Footer s'affiche
   - Aucune erreur PHP

#### C. Monitoring post-migration

**Première heure :**
- [ ] Vérifier analytics (trafic normal)
- [ ] Vérifier console navigateur (aucune erreur JS)
- [ ] Vérifier logs serveur (aucune erreur PHP)
- [ ] Tester formulaires de contact

**Première semaine :**
- [ ] Monitoring SEO (positions Google stables)
- [ ] Monitoring performance (PageSpeed stable)
- [ ] Monitoring erreurs 404
- [ ] Feedback utilisateurs

---

## 🔧 POST-MIGRATION

### 1. Optimisations

#### A. Installer plugins performance

- **WP Rocket** (cache)
- **Imagify** (optimisation images)
- **ShortPixel** (alternative Imagify)

#### B. Configurer cache

Si WP Rocket installé :
- Activer cache page
- Activer minification CSS/JS
- Activer LazyLoad (redondant avec le thème mais OK)
- Activer preload fonts

#### C. CDN (optionnel)

- Configurer Cloudflare
- Activer Cloudflare APO (Automatic Platform Optimization)

### 2. Nettoyage

#### A. Supprimer l'ancien thème

**⚠️ ATTENTION : Attendre au moins 1 semaine avant suppression**

1. Vérifier que le nouveau thème fonctionne parfaitement
2. Garder un backup de l'ancien thème
3. Supprimer via `Apparence > Thèmes > Supprimer`

#### B. Nettoyer la base de données

- Supprimer révisions inutiles (limitées à 3 dans nouveau thème)
- Supprimer transients expirés
- Optimiser tables

Plugin recommandé : **WP-Optimize**

### 3. Monitoring continu

#### Analytics à suivre

- **Trafic global** (Google Analytics / Matomo)
- **Taux de rebond** (doit rester stable)
- **Temps de chargement** (doit s'améliorer)
- **Conversions** (formulaires soumis, appels, etc.)

#### SEO à surveiller

- **Positions Google** (Search Console)
- **Impressions / Clics** (Search Console)
- **Core Web Vitals** (Search Console)
- **Erreurs d'exploration** (Search Console)

---

## 🆘 ROLLBACK

### Si problème critique en production

#### Méthode 1 : Via admin WordPress

1. `Apparence > Thèmes`
2. Réactiver l'ancien thème

#### Méthode 2 : Via FTP

```bash
# Renommer le nouveau thème
mv wp-content/themes/insuffle-theme wp-content/themes/insuffle-theme.disabled

# WordPress rebasculera automatiquement sur un thème par défaut
```

#### Méthode 3 : Via base de données

```sql
-- Vérifier le thème actif
SELECT * FROM wp_options WHERE option_name = 'template' OR option_name = 'stylesheet';

-- Restaurer l'ancien thème
UPDATE wp_options SET option_value = 'twentytwenty' WHERE option_name = 'template';
UPDATE wp_options SET option_value = 'twentytwenty' WHERE option_name = 'stylesheet';
```

### Restaurer backup complet

```bash
# Restaurer base de données
mysql -u USER -p DATABASE < backup_prod_avant_migration_YYYYMMDD.sql

# Restaurer fichiers
tar -xzf backup_prod_avant_migration_YYYYMMDD.tar.gz -C /path/to/wordpress
```

---

## 📞 Support

### En cas de problème

1. **Vérifier les logs** :
   - Logs PHP : `/var/log/php-fpm/error.log`
   - Logs WordPress : `wp-content/debug.log` (si `WP_DEBUG` activé)
   - Logs serveur : `/var/log/nginx/error.log` ou `/var/log/apache2/error.log`

2. **Debug mode WordPress** :
   ```php
   // wp-config.php
   define( 'WP_DEBUG', true );
   define( 'WP_DEBUG_LOG', true );
   define( 'WP_DEBUG_DISPLAY', false );
   ```

3. **Contacter le développeur** :
   - GitHub Issues : https://github.com/ylureault/Insuffle-Theme-Wordpress/issues

---

## ✅ CHECKLIST FINALE

### Pré-migration
- [ ] Backup BDD complet
- [ ] Backup fichiers complet
- [ ] Screenshots réglages thème actuel
- [ ] Liste des menus
- [ ] Liste des widgets
- [ ] Environnement staging prêt

### Migration staging
- [ ] Thème installé
- [ ] Menus configurés
- [ ] Widgets configurés
- [ ] Customizer configuré
- [ ] Homepage créée
- [ ] Tests fonctionnels OK
- [ ] Tests responsive OK
- [ ] Tests performance OK
- [ ] Tests SEO OK
- [ ] Tests accessibilité OK

### Migration production
- [ ] Backup production fait
- [ ] Thème activé
- [ ] Vérification immédiate OK
- [ ] Formulaires testés
- [ ] Analytics monitored
- [ ] SEO monitored

### Post-migration
- [ ] Optimisations effectuées
- [ ] Cache configuré
- [ ] Ancien thème supprimé (après 1 semaine)
- [ ] BDD nettoyée
- [ ] Monitoring en place

---

**Bonne migration ! 🚀**
