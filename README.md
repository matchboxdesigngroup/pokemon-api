# Pokémon API Challenge

## Objective

Your assignment is to create a Pokémon API from a CSV file using PHP and Laravel. The allotted time for this assigment is eight (8) hours. Timer begins when your scheduled email was sent to grant access to the project repo and instructions.

### Brief

Professor Oak is in trouble! A wild Blastoise wreaked havoc in the server room and destroyed every single machine. There are no backups - everything is lost! Professor Oak quickly scribbles down all the Pokémon from memory and hands them to you on a piece of paper (found at `./database/data/pokemon.csv`). Your task is to restore the Pokémon Database from that file and create a Pokémon API so that they’re never lost again.

## Local Development

<details>
<summary>Requirements</summary>

* [Composer](https://getcomposer.org/download/) `>= 2.x`
* [Node.js](http://nodejs.org/) `>= 16.x`
* [npm](https://www.npmjs.com/) `~ 8.x`, this is what the current package-lock.json file is built from. Use `npm ci` instead of `npm install` to preserve dependency lock.
* [PHP](https://secure.php.net/manual/en/install.php) `>= 7.4` (with [`php-mbstring`](https://secure.php.net/manual/en/book.mbstring.php) enabled)
* [Laravel](https://laravel.com/) `>= 8.x`

### Install the Laravel Installer as a global Composer dependency

If you do not have installed globally, use the following command:

```sh
composer global require laravel/installer
```

</details>

<details>
<summary>Installation</summary>

### Create a local environment

*Our recommended method for all Matchbox team members is to clone the repository*

```sh
# via SSH
git clone git@github.com:matchboxdesigngroup/pokemon-api.git

# via HTTPS
git clone https://github.com/matchboxdesigngroup/pokemon-api.git
```

### Configure valet secured with a fresh TLS certificate

```sh
cd pokemon-api
valet secure
```

### Build the app

```sh
composer self-update --2 # Update Composer if needed
composer install
```

### Build the front-end dependencies

Since this code challenge deals primarily with backend API development and testing via Postman (or comparable API GUI), you can forego building the frontend dependedncies if you prefer. Otherwise, run the following commands:

```sh
nvm use 16
npm ci
npm run dev
```

</details>

<details>
<summary>Setup</summary>

### Setup a local database

Open Tableplus (or comparable MySQL GUI) and add a database named `laravel_pokemon_api`

Back in the project, create the `.env` file

```sh
cp .env.example .env
```

Then open the `.env` file and change the DB config to `DB_DATABASE=laravel_pokemon_api`, see example below:

```env
...

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_pokemon_api
DB_USERNAME=root
DB_PASSWORD=

...
```

### Test the app landing page

Now you can visit https://pokemon-api.test in your browser to test the project setup, which should show you a standard Larvael 8 welcome page.

You may have to generate the cert key.

```sh
php artisan key:generate
```

</details>

## Code Challenge Tasks

- Implement assignment using:
    - Language: **PHP**
    - Framework: **Laravel**
- [ ] Commit your code in stages and make use of [Conventional Commit](https://www.conventionalcommits.org/en/v1.0.0/) specifications
- [ ] Create a Pokémon Model that includes all fields outlined in `./database/data/pokemon.csv`
- [ ] Parse the .csv file and create entries for each row in the model by using the Database Seeder approach
- [ ] Leverage Laravel resources, controllers and routes to do the following:
    - [ ] Create API auth endpoints for `/register` and `/login` that will return an Auth Token to be used as a Bearer Token in Postman. This will authenticate the user to make a GET request to your data endpoint.
    - [ ] Create one data API endpoint `/pokemon`
        - [ ] This API endpoint should be searchable, filterable and paginatable
            - [ ] Search: name
                - Bonus: implement fuzzy search using Levenshtein distance
            - [ ] Filter: HP, Attack & Defense
                - e.g. `/pokemon?hp[gte]=100&defense[lte]=200`
            - [ ] Pagination: e.g. `/pokemon?page=1`
- Additionally, you may want to showcase your Laravel/PHP experience by using as many Laravel specific features as possible. For example: Scopes, Resources, Policies, Unit Tests, etc.

> :warning: Submit your final commit and post the Pull Request for your branch before your eight (8) hours are over. Finalize your submission even if you did not complete each task, we will evaluate your work regardless, but it must be submitted within the timeframe allotted.

## Postman (Example)

Here are a few expected results that the API should return. Examples include the `/register` and `/pokemon` endpoints, but you're work should include the login, filterable and paginatable functionality as well.

![Screen Shot API Register](./screenshot-api-register.png)

![Screen Shot API Endpoint](./screenshot-api-endpoint.png)

## Evaluation Criteria

- **PHP** best practices
- Use of **Conventional Commit** specifications; show us your work through your commit history
- We're looking for you to produce working code, with enough room to demonstrate how to structure components in a small program
- Completeness: did you complete the features?
- Correctness: does the functionality act in sensible, thought-out ways?
- Maintainability: is it written in a clean, maintainable way?
- Testing: is the system adequately tested?

## Submission

Please organize, design, test and document your code as if it were going into production - then push your changes to your assigned branch. You can then setup a Pull Request via GitHub and your challenge timer will end on that timestamp.

> :warning: Submit your final commit and post the Pull Request for your branch before your eight (8) hours are over. Finalize your submission even if you did not complete each task, we will evaluate your work regardless, but it must be submitted within the timeframe allotted.

All the best and happy coding,

The Matchbox Design Group Team


