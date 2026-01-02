# Todo API 📝

Une API REST complète pour la gestion de tâches (Todo) développée avec Laravel 11, utilisant SQLite et Laravel Sanctum pour l'authentification.

## 🚀 Fonctionnalités

- **Authentification** : Inscription, connexion et déconnexion avec tokens JWT via Sanctum
- **Gestion des tâches** : CRUD complet (Créer, Lire, Modifier, Supprimer)
- **Filtrage** : Récupération des tâches par utilisateur
- **Autorisation** : Système de policies pour sécuriser l'accès aux tâches
- **Base de données** : SQLite pour un déploiement simple

## 🛠️ Technologies utilisées

- **Laravel 11** - Framework PHP
- **SQLite** - Base de données
- **Laravel Sanctum** - Authentification API
- **Laravel Policies** - Autorisation
- **Pest** - Tests

## ⚡ Installation rapide

### Prérequis
- PHP 8.2 ou supérieur
- Composer

### 1. Cloner le projet
```bash
git clone <repo-url>
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

## 📚 Documentation API

### Base URL
```
http://127.0.0.1:8000/api
```

### 🔐 Authentification

#### Inscription
```http
POST /auth/register
Content-Type: application/json

{
    "firstName": "John",
    "lastName": "Doe", 
    "email": "john@example.com",
    "password": "secret123",
    "password_confirmation": "secret123"
}
```

**Réponse :**
```json
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...",
    "token_type": "Bearer",
    "user": {
        "id": 1,
        "firstName": "John",
        "lastName": "Doe",
        "email": "john@example.com"
    }
}
```

#### Connexion
```http
POST /auth/login
Content-Type: application/json

{
    "email": "astro@test.com",
    "password": "admin123"
}
```

**Réponse :**
```json
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...",
    "token_type": "Bearer", 
    "user": {
        "id": 1,
        "firstName": "Jordan",
        "lastName": "Nsadisi",
        "email": "astro@test.com",
        "role": "ADMIN"
    },
    "message": "user connecté avec succès"
}
```

#### Déconnexion
```http
POST /auth/logout
Authorization: Bearer {token}
```

**Réponse :**
```json
{
    "message": "Déconnexion réussie et token supprimé"
}
```

### 👤 Profil utilisateur

#### Récupérer le profil
```http
GET /user/profile
Authorization: Bearer {token}
```

### ✅ Gestion des tâches

#### Lister toutes les tâches
```http
GET /tasks
Authorization: Bearer {token}
```

#### Créer une tâche
```http
POST /tasks
Authorization: Bearer {token}
Content-Type: application/json

{
    "title": "Ma nouvelle tâche",
    "description": "Description de la tâche",
    "status": "en_cours"
}
```

#### Modifier une tâche
```http
PUT /tasks/{id}
Authorization: Bearer {token}
Content-Type: application/json

{
    "title": "Tâche modifiée",
    "description": "Nouvelle description",
    "status": "terminee"
}
```

#### Supprimer une tâche
```http
DELETE /tasks/{id}
Authorization: Bearer {token}
```

#### Récupérer les tâches d'un utilisateur
```http
GET /tasks/user/{userId}
Authorization: Bearer {token}
```

## 🔒 Sécurité

- **Authentification** : Laravel Sanctum avec tokens API
- **Autorisation** : Policies Laravel pour contrôler l'accès aux tâches
- **Validation** : Validation stricte des données d'entrée
- **Hachage** : Mots de passe hachés avec bcrypt

## 🗂️ Structure du projet

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php      # Authentification
│   │   ├── TasksController.php     # Gestion des tâches  
│   │   └── UserController.php      # Profil utilisateur
│   └── Requests/                   # Validation des requêtes
├── Models/
│   ├── User.php                    # Modèle utilisateur
│   └── Tasks.php                   # Modèle tâche
└── Policies/
    └── TasksPolicy.php             # Autorisations tâches

database/
├── migrations/                     # Migrations de la BDD
└── seeders/
    ├── AdminSeeder.php            # Création des admins
    └── DatabaseSeeder.php         # Seeder principal
```

## 🧪 Tests

Exécuter les tests :
```bash
php artisan test
# ou avec Pest
./vendor/bin/pest
```

## 📋 Status codes

| Code | Signification |
|------|---------------|
| 200 | Succès |
| 201 | Créé |
| 400 | Erreur de validation |
| 401 | Non authentifié |
| 403 | Non autorisé |
| 404 | Ressource non trouvée |
| 500 | Erreur serveur |

## 🤝 Contribution

1. Fork le projet
2. Créer une branche (`git checkout -b feature/nouvelle-fonctionnalite`)
3. Commit les changements (`git commit -m 'Ajout nouvelle fonctionnalité'`)
4. Push vers la branche (`git push origin feature/nouvelle-fonctionnalite`)
5. Ouvrir une Pull Request

## 📄 Licence

Ce projet est sous licence MIT.
