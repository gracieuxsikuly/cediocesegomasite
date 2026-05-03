# 🌐 Système de Gestion – Croisade Eucharistique – Diocèse de Goma

## 📖 Description
Plateforme web complète développée en **Laravel 12** et **Livewire 3** pour la gestion administrative et la communication du mouvement **Croisade Eucharistique** au sein du Diocèse de Goma.  

Cette application offre une solution intégrée pour :
- **Gérer l'organisation** (doyennés, paroisses, membres, ressources humaines)
- **Coordonner les activités** (événements, programmes, calendrier liturgique)
- **Partager les ressources spirituelles** (documents, prières, ressources)
- **Diffuser des contenus** (radio Maria, galerie photos/vidéos)
- **Gérer les finances** (mouvements financiers, trésorerie)
- **Publier des informations** (actualités, rapports, communications)

---

## 🎯 Objectifs Principaux
- Centraliser la **gestion des données diocésaines** (membres, paroisses, doyennés).
- Améliorer la **coordination interne** entre les différentes structures.
- Faciliter la **communication** avec les fidèles et les responsables.
- Assurer la **traçabilité** des activités, financements et rapports.
- Créer une **vitrine numérique** du mouvement pour les fidèles.

---

## ✨ Fonctionnalités Principales

### 🔧 **Panneau d'Administration (Backend)**
Le système offre un contrôle d'accès basé sur les rôles avec les fonctionnalités suivantes :

#### 📊 **Gestion Organisationnelle**
- **Doyennés** : création, modification et suppression des zones administratives
- **Paroisses** : gestion complète de l'annuaire des paroisses avec localisation
- **Membres** : base de données centralisée des adhérents du mouvement
- **Comptage des membres** : statistiques et suivi démographique
- **Contacts** : carnet d'adresses centralisé pour la communication
- **Niamwezi** : gestion des structures spéciales du mouvement

#### 📅 **Gestion des Activités**
- **Programmes d'activités** : création et gestion du calendrier des événements
- **Rapports de doyennés** : documentation des activités par zone administrative
- **Commentaires** : modération et gestion des retours des utilisateurs

#### 📚 **Gestion des Ressources**
- **Ressources spirituelles** : stockage et partage de documents religieux et catéchétiques
- **Documents électroniques** : gestion centralisée des fichiers diocésains
- **Photos et vidéos** : galerie multimedia et gestion des contenus visuels
- **Sliders** : gestion du contenu en vedette de la page d'accueil

#### 📻 **Émissions Radiophoniques**
- **Émissions Radio Maria** : programmation, documentation et archivage des émissions religieuses

#### 💰 **Gestion Financière**
- **Mouvements financiers** : suivi complet des transactions et de la caisse
- **Gestion des biens** : inventaire des actifs diocésains par catégorie

#### 👥 **Gestion des Utilisateurs**
- **Système de rôles** : 8 rôles configurables (admin, user, activites_ressources, radio_maria, manager_donnees, secretariat, zelateur, tresorerie)
- **Gestion des profils** : édition des informations utilisateur
- **Gestion des comptes** : création, modification et suppression d'utilisateurs avec permissions

### 🌐 **Interface Publique (Frontend)**
Le site public propose une expérience visiteur conviviale et informative :

- **Accueil** : page principale avec contenus en vedette et actualités
- **À propos de nous** : présentation et historique du mouvement
- **Nos doyennés** : annuaire interactif des zones administratives
- **Nos activités** : calendrier public des événements avec filtrage et détails
- **Nos ressources** : partage de contenus spirituels et pédagogiques
- **Émissions Radio Maria** : agenda public et information sur les émissions
- **Galerie photos** : portfolio multimedia des événements et célébrations
- **Contact** : formulaire de communication avec l'équipe diocésaine
- **Pages de détails** : présentation détaillée de chaque activité/événement

---

## 🛠️ Technologies Utilisées

| Technologie | Version | Usage |
|------------|---------|-------|
| **Laravel** | 12 | Framework backend |
| **Livewire** | 3.6+ | Composants réactifs frontend |
| **PHP** | 8.2+ | Langage serveur |
| **MySQL/MariaDB** | 5.7+ | Base de données |
| **TailwindCSS** | - | Design responsive |
| **Alpine.js** | - | Interactivité légère |
| **Jetstream** | 5.3+ | Authentification et équipes |
| **Sanctum** | 4.0+ | API sécurisée |

---

## 📊 Architecture de Base de Données

Le système utilise les modèles Eloquent suivants :

```
Utilisateurs et Authentification
├── User (utilisateurs du système)
└── Rôles & Permissions

Organisationnel
├── Doyenne (zones administratives)
├── Paroisse (paroisses)
├── Membre (adhérents)
├── Contact (carnet d'adresses)
└── Countmember (statistiques)

Activités & Événements
├── Activiteprogramme (programmes)
├── Rapportdoyenne (rapports)
└── Commentaire (retours)

Ressources
├── Ressource (documents spirituels)
├── DocumentElectronique (fichiers)
├── PhotoVideo (contenus multimedia)
└── Slider (contenus en vedette)

Finances
├── MouvementFinancier (transactions)
└── Bien / CategorieBien (inventaire)

Contenu Spécialisé
├── EmissionRadioMaria (émissions)
├── Niamwezi (structures spéciales)
└── Newsletter (communications)
```

---

## 🚀 Installation & Démarrage

### Prérequis
- PHP 8.2 ou supérieur
- Composer
- Node.js et npm
- MySQL 5.7+ ou MariaDB
- Git

### Étapes d'installation

1. **Cloner le projet**
   ```bash
   git clone https://github.com/gracieuxsikuly/cediocesegomasite.git
   cd cediocesegomasite
   ```

2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```

3. **Installer les dépendances JavaScript**
   ```bash
   npm install && npm run dev
   ```

4. **Configurer l'environnement**
   ```bash
   cp .env.example .env
   ```
   - Éditer `.env` et configurer la base de données
   - Générer la clé d'application :
     ```bash
     php artisan key:generate
     ```

5. **Créer la base de données** (si nécessaire)
   ```bash
   mysql -u root -p -e "CREATE DATABASE cediocesegomasite;"
   ```

6. **Exécuter les migrations**
   ```bash
   php artisan migrate
   ```

7. **Charger les données de démarrage (optionnel)**
   ```bash
   php artisan db:seed
   ```

8. **Lancer le serveur de développement**
   ```bash
   php artisan serve
   ```
   - Le site sera accessible à `http://127.0.0.1:8000`

9. **Lancer le compilateur assets (dans un autre terminal)**
   ```bash
   npm run dev
   ```

### Accès initial
- **Tableau de bord** : `/dashboard` (authentification requise)
- **Site public** : `/` (accessible à tous)

## 👨‍💼 Rôles et Permissions

Le système utilise 8 rôles avec permissions spécifiques :

| Rôle | Permissions |
|------|-----------|
| **admin** | Accès complet à toutes les fonctionnalités |
| **zelateur** | Gestion utilisateurs, biens, documents, caisse |
| **manager_donnees** | Gestion doyennés, paroisses, membres, contacts, statistiques |
| **activites_ressources** | Gestion activités, ressources, photos, sliders, commentaires |
| **radio_maria** | Gestion des émissions radiophoniques |
| **secretariat** | Gestion des documents électroniques et communications |
| **tresorerie** | Gestion de la caisse et des mouvements financiers |
| **user** | Accès de base au tableau de bord (lecture majoritairement) |

---

## 📁 Structure du Projet

```
cediocesegomasite/
├── app/
│   ├── Models/              # Modèles Eloquent
│   ├── Http/
│   │   ├── Controllers/     # Contrôleurs
│   │   └── Middleware/      # Middlewares
│   ├── Livewire/
│   │   ├── Backend/         # Composants administration
│   │   └── Frontend/        # Composants site public
│   ├── Actions/             # Actions métier
│   └── Providers/           # Service providers
├── database/
│   ├── migrations/          # Migrations
│   ├── seeders/             # Seeders
│   └── factories/           # Factories
├── resources/
│   ├── views/               # Templates Blade
│   │   ├── livewire/        # Vues Livewire
│   │   ├── layouts/         # Layouts
│   │   └── components/      # Composants réutilisables
│   ├── css/                 # Stylesheets
│   └── js/                  # Scripts JavaScript
├── routes/
│   ├── web.php              # Routes web
│   ├── api.php              # Routes API (si applicable)
│   └── console.php          # Commandes console
├── public/
│   ├── storage/             # Fichiers uploadés
│   └── assets/              # Assets statiques
├── config/                  # Fichiers de configuration
├── bootstrap/               # Fichiers de démarrage
├── storage/                 # Logs, cache, etc.
├── tests/                   # Tests unitaires et fonctionnels
└── composer.json            # Dépendances PHP
```

---

## 🔐 Sécurité

### Bonnes pratiques implémentées
- **Authentification Jetstream** : système d'authentification moderne et sécurisé
- **Autorisation basée sur les rôles (RBAC)** : middlewares de vérification des permissions
- **Sanctum** : protection des API
- **CSRF Protection** : tokens CSRF pour tous les formulaires
- **Validation serveur** : validation stricte des données entrantes
- **Hachage des mots de passe** : stockage sécurisé avec bcrypt

### Bonnes pratiques recommandées en production
- Utiliser HTTPS
- Configurer les headers de sécurité
- Effectuer des sauvegardes régulières
- Mettre à jour les dépendances
- Implémenter la journalisation des actions sensibles

---

## 📈 Déploiement

### Options de déploiement
- **Shared Hosting** : Hostinger, OVH, 1&1
- **VPS** : Linode, DigitalOcean, Vultr
- **Managed Hosting** : Laravel Forge, Heroku (avec adaptations)
- **Cloud** : AWS, Google Cloud, Azure

### Considérations avant le déploiement
- Configuration de l'environnement production
- Mise en place de la base de données
- Configuration du domaine et SSL
- Configuration des emails (SMTP)
- Sauvegarde automatisée
- Monitoring et logging

---

## 🧪 Tests

Exécuter les tests :
```bash
php artisan test
```

Tests avec couverture :
```bash
php artisan test --coverage
```

---

## 🐛 Dépannage Courant

### La base de données ne se connecte pas
- Vérifier les paramètres dans `.env`
- S'assurer que MySQL/MariaDB fonctionne
- Vérifier les permissions d'accès

### Les migrations échouent
```bash
php artisan migrate:reset
php artisan migrate
```

### Les assets ne se chargent pas
```bash
npm install
npm run dev
php artisan storage:link
```

### Problèmes d'authentification
- Vérifier les migrations de Jetstream
- Réinitialiser les tables utilisateurs
- Vérifier les configurations d'email

---

## 📚 Ressources Supplémentaires

- [Documentation Laravel](https://laravel.com/docs)
- [Documentation Livewire](https://livewire.laravel.com)
- [Documentation Jetstream](https://jetstream.laravel.com)
- [Documentation MySQL](https://dev.mysql.com/doc/)

---

## 📞 Support et Contact

### Pour des questions techniques
- **Email** : graciersikuly@gmail.com
- **LinkedIn** : [Gracieux Sikuly](https://www.linkedin.com/in/gracieux-sikuly-4aba2118b/)

### Pour des questions organisationnelles
- **Coordination diocésaine** : Croisade Eucharistique – Diocèse de Goma
- **Localisation** : Goma, République Démocratique du Congo

---

**Gracieux Sikuly** – Apostolat Croisé et Vis Zelateur Diocésain

Ingénieur informaticien spécialisé en :
- Développement web (Laravel, Livewire)
- Gestion de bases de données
- Sécurité réseau
- Cloud computing (AWS)
- Collecte et analyse de données humanitaires

🌍 Basé à Goma, RDC

---

## 👥 Contributeurs

- **Coordination diocésaine** de la Croisade Eucharistique – Goma
- **Équipe technique diocésaine** (développeurs, cartographes, communicateurs)
- Contributions bienvenues via **pull requests**

---

## 📜 Licence

**Projet à usage diocésain et communautaire**

La reproduction ou l'utilisation à des fins commerciales est interdite sans autorisation préalable de la coordination diocésaine de la Croisade Eucharistique du Diocèse de Goma.

Pour toute demande de licence ou utilisation spéciale, veuillez contacter la coordination diocésaine.

---

## 📅 Historique des Versions

- **v1.0.0** (Mai 2026) : Version initiale avec fonctionnalités principales
  - Gestion complète des doyennés et paroisses
  - Base de données des membres
  - Calendrier d'activités
  - Panneau d'administration avec contrôle d'accès basé sur les rôles
  - Interface publique complète
  - Émissions Radio Maria

---

**Dernière mise à jour** : Mai 2026
