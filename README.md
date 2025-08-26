# 🌐 Site Web – Croisade Eucharistique – Diocèse de Goma

## 📖 Description
Ce projet est un site web développé en **Laravel** et **Livewire** pour le mouvement **Croisade Eucharistique** au sein du Diocèse de Goma.  
Il a pour but de moderniser la coordination, la communication et la formation des membres du mouvement (enfants, animateurs, responsables, aumôniers).

Le site se veut à la fois :
- Un **annuaire numérique** (doyennés, paroisses, membres).
- Un **média d’information** (actualités, activités, témoignages).
- Un **outil spirituel** (prières, hymnes, catéchèse en ligne).

---

## 🎯 Objectifs
- Améliorer la visibilité et la coordination du mouvement.
- Mettre en place une **base de données numérique** des membres.
- Proposer un **calendrier liturgique et des programmes d’activités**.
- Partager des **ressources spirituelles** (prières, chants, documents).
- Favoriser la **communication entre les paroisses et les doyennés**.

---

## 🖼️ Structure du Site
- **Page d’accueil** : présentation, devise, actualités, carte du diocèse.
- **Doyennés** : liste + localisation sur carte interactive.
- **Paroisses** : annuaire des paroisses croisadières.
- **Membres** : formulaire d’inscription en ligne + base sécurisée.
- **Activités & Programmes** : calendrier liturgique, événements, rapports.
- **Ressources spirituelles** : prières, hymnes, catéchèse, documents.
- **À propos** : historique, organigramme, contacts.
- **Contact** : formulaire + coordonnées diocésaines.

---

## 🛠️ Technologies Utilisées
- **Laravel 12**
- **Livewire 3**
- **Bootstrap 5** (ou TailwindCSS)
- **JavaScript (Vanilla ou Alpine.js)**  
- **MySQL** pour la base des membres
- **Google Maps / OpenStreetMap** (cartographie interactive)
- **Git & GitHub** pour le versionnement

---

## 🚀 Installation & Lancement
1. **Cloner le projet**
   ```bash
   git clone https://github.com/ton-compte/croisade-eucharistique-goma.git
   cd croisade-eucharistique-goma
   ```

2. **Installer les dépendances PHP et JS**
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Configurer l’environnement**
   - Copier `.env.example` en `.env`
   - Modifier les paramètres de la base de données
   - Générer la clé Laravel :
     ```bash
     php artisan key:generate
     ```

4. **Migrer la base de données**
   ```bash
   php artisan migrate --seed
   ```

5. **Lancer le serveur**
   ```bash
   php artisan serve
   ```
   Accéder au site via `http://127.0.0.1:8000`

---

## 📅 Roadmap
- [x] Création de la maquette textuelle.
- [ ] Développement du template de base (Laravel + Livewire).
- [ ] Intégration carte interactive des doyennés et paroisses.
- [ ] Mise en place du formulaire d’inscription.
- [ ] Déploiement sur un hébergeur (par ex. Hostinger, OVH, Forge).

---
## ✍️ Auteur
**Gracieux Sikuly Apostolat Croisé et Vis Zelateur Diocesain**  
Ingénieur informaticien avec plus de 5 ans d’expérience en conception et développement de solutions IT.  
Spécialisé en : Laravel, Livewire, gestion de bases de données, sécurité réseau, cloud (AWS), collecte et analyse de données humanitaires (KoboCollect, ODK, Power BI).  

🌍 Basé en Goma, RDC  
📧 Email : [graciersikuly@gmail.com]  
💼 LinkedIn : [https://www.linkedin.com/in/gracieux-sikuly-4aba2118b/]  

## 👥 Contributeurs
- **Coordination diocésaine de la Croisade Eucharistique – Goma**
- **Équipe technique diocesaine (développeurs, cartographes, communicateurs)**
- Contributions bienvenues via **pull requests**.

---

## 📜 Licence
Projet à usage **diocésain et communautaire**.  
La reproduction ou l’utilisation à des fins commerciales est interdite sans autorisation préalable de la coordination diocésaine.
