# go_fvaj_faq


<br />
<p align="center">
  <a href="https://github.com/robielcpnv/go_fvaj_faq/blob/main/htdocs/img/favicon-228x228.png">
    <img src="public/assets/logo.png" alt="Logo" width="80" height="80">
  </a>
<h3 align="center">Projet FAQ</h3>

## 1. Objectif

La fondation Action Valaisanne Action Jeunesse dispose de plusieurs NAS Synology sur plusieurs sites distants.
Les pages sont statiques. Simultanément plusieurs dizaines d’utilisateurs peuvent consulter les informations via un navigateur.

## 2. Pratique

• Le service Web est activé pour tous les utilisateurs.
• En mode Webmaster le service dynamique est utilisé : PHP les données sont stockées en JSON
• La page admin.php génère une page Web statique ayant pour source une table JSON. Attention à la sécurité.
• La librairie utilisée sera Tailwind CSS
• La librairie PHP pour le Wiki et au libre choix avec de nombreuse possibilité de mise en page : liens, titres, listes, images, etc.

## 3. Remarque

Dans une prochaine version le backend peut être dans une autre langue : anglais, ou allemand. Veuillez mettre les champs affichés dans une table.

### Informaticien

* [Robiel Tesfazghi](https://github.com/robielcpnv)

### Built With

* [HMTL & CSS]()
  * [Tailwind CSS](https://tailwindcss.com/docs) Version 3.2.1
  * [Tailwind Elements](https://tailwind-elements.com/quick-start/)
* [PHP](https://www.php.net/) Version 8.1
* [PHP Markdown](https://packagist.org/packages/michelf/php-markdown) Version 2.0.0

<!-- GETTING STARTED -->

## Getting Started

### Prerequisites

In order to install all the packages, you'll need :
- [NPM](https://nodejs.org/en/download/)
- [Composer](https://getcomposer.org/download/)

### Installation

1. Clone the repo
   ```sh
    https://github.com/robielcpnv/go_fvaj_faq.git
   ```
2. Install NPM packages
   ```sh
   npm install
   ```
3. Install Composer packages
   ```sh
   composer install
   ```

## License

Distributed under the MIT License. See `LICENSE` for more information.

## CONTACT 

Robiel Tesfazghi - robiel.tesfazghi@cpnv.ch

