# laravel_utils-EntitiesManager
Simple opinionated utility to manage laravel entities.

## What it does

`laravel_utils-EntitiesManager` is a Laravel package that simplifies the management of core data entities in your web application. It provides an opinionated and structured approach to efficiently handle entities, which are fundamental data objects such as users, products, or posts, and so on.

**Key Features:**

* Streamlined Entity Management: This package streamlines the creation, organization, and management of entities in your Laravel application. It simplifies the process of setting up the essential components associated with each entity.

* Clear Folder Structure: When generating an entity, laravel_utils-EntitiesManager creates a clear and consistent folder structure. For example, if you're working with a "Post" entity, it generates folders for controllers, models, providers, repositories, and views specific to that entity.

```
Post
    Controllers
        PostController.php
    Models
        PostModel.php
    Providers
        PostProvider.php
    Repositories
        PostRepository.php
    Views
        PostView.blade.php
```

* This structured approach helps maintain a well-organized codebase.

* Effortless Entity Generation: You can easily generate different components for an entity using simple artisan commands. For example, you can generate a model, controller, or repository for your entity with a single command, saving you time and effort.

```
    // Example: Generate a model for the "Post" entity
    artisan entity:generate Post --layer=model
```

* Consistency Across Entities: By following a consistent naming and organization convention, this package helps to ensure that all entities in your application share a uniform structure. This consistency makes it easier to understand and maintain your codebase.

* Improved Code Maintainability: With a well-structured codebase, developers can more effectively collaborate and maintain the application over time. This package promotes best practices for code organization.

In summary, `laravel_utils-EntitiesManager` simplifies entity management in Laravel by providing a structured approach and tools to generate and organize entity-related components. It enhances code maintainability, encourages best practices, and saves developers valuable time when working with entities in their Laravel applications.

## Installation

Add the package in `composer.json`: 
```
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/p-marco/laravel_utils/EntitiesManager"
        }
    ],
    "require": {
        "p-marco/laravel_utils.entitiesManager": "dev-main"
    }
```


## Usage

```
// Basic usage:
artisan entity:generate {entity} {--layer}

// Create a model or other types (either if the Entity is already present or not):
artisan entity:generate Author --layer=model
artisan entity:generate Comment --layer=view
artisan entity:generate Post --layer=controller

```
The root folder is hardcoded as `App\Entities`. Future plans to make it configurable.