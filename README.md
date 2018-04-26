# Open Blog Site

Web app for writing, commenting on and sharing articles. Developed as an individual university project with pre-set requirements.

# Requirements
- [x] Technologies: MySQL LTS, PHP 5.6, no framework 
- [x] Standardized Website Navigation #3
- [x] Homepage with top 5 most popular articles (view count) #4
- [x] Search results page with fully manipulatable table #5
- [x] User registration #6
- [x] User login #7
- [x] Articles view page #10
- [x] Article views counter #14
- [] Editable User profile #8
- [] Create & update articles #9 #11
- [] Add file attachments to articles #31
- [] Comment on articles, & reply to comments #12
- [] Access control for basic user & site admin #15 #16

# Extras
- [x] Own website design #17
- [x] Full documentation
- [x] Database ERD diagram #1
- [x] Database migration scripts (instead of just SQL dumps)
- [x] Fully standards compliant code following the [PSR-2 coding standards](https://www.php-fig.org/psr/psr-2/)
- [] reCAPTCHA #19
- [] User password hashing & salting #20
- [] Account email verification #21
- [] Host site live on [Heroku](https://open-blog.herokuapp.com/) (currently broken server config) #22

# Setup Guide

To setup this site locally:
1. Install from [git](https://github.com/falansari/open_blog_site.git) or download as [zip](https://github.com/falansari/open_blog_site/archive/master.zip)
2. Install [Composer](https://getcomposer.org/) and run the following command on git bash:
```bash
composer install
```
3. Setup your database credentials in Database.php (Default is localhost, root, no password, development_articles)
4. Run the phinx migration scripts on git bash:
```bash
vendor/bin/phinx migrate
```
5. Run the SQL scripts in db/scripts folder in PHPMyAdmin for your database.