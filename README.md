# Todo API

Une API REST complète pour la gestion de tâches (Todo) développée avec Laravel 11, utilisant SQLite et Laravel Sanctum pour l'authentification.

## Fonctionnalités

- **Authentification** : Inscription, connexion et déconnexion avec tokens JWT via Sanctum
- **Gestion des tâches** : CRUD complet (Créer, Lire, Modifier, Supprimer)
- **Filtrage** : Récupération des tâches par utilisateur
- **Autorisation** : Système de policies pour sécuriser l'accès aux tâches
- **Base de données** : SQLite pour un déploiement simple

## Technologies utilisées

- **Laravel 11** - Framework PHP
- **SQLite** - Base de données
- **Laravel Sanctum** - Authentification API
- **Laravel Policies** - Autorisation
- **Pest** - Tests

## Installation rapide

### Prérequis
- PHP 8.2 ou supérieur
- Composer

### 1. Cloner le projet
```bash
git clone https://github.com/Jordan-Nsadisi/test_todoAPI.git
cd test-todoApi
```

### 2. Installer les dépendances
```bash
composer install
```

### 3. Configuration de l'environnement
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Base de données
```bash
# Les migrations vont automatiquement créer le fichier SQLite
php artisan migrate

# Créer les utilisateurs de test
php artisan db:seed
```

### 5. Lancer le serveur
```bash
php artisan serve
```

L'API sera disponible sur `http://127.0.0.1:8000`

## 👤 Comptes de test

Après avoir exécuté les seeders, vous aurez accès à ces comptes admin :

| Nom | Email | Mot de passe | Rôle |
|-----|--------|-------------|------|
| Jordan Nsadisi | `astro@test.com` | `admin123` | ADMIN |
| Monsieur Mukanza | `admin@test.com` | `admin123` | ADMIN |

## Documentation API

### Base URL
```
http://127.0.0.1:8000/api
```

## Sécurité

- **Authentification** : Laravel Sanctum avec tokens API
- **Autorisation** : Policies Laravel pour contrôler l'accès aux tâches
- **Validation** : Validation stricte des données d'entrée
- **Hachage** : Mots de passe hachés avec bcrypt

