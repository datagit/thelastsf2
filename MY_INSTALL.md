# path: ~/.bash_aliases
alias rm='rm -i'
alias sf2Dev='php app/console --env=dev'
alias sf2Prod='php app/console --env=prod'


http://symfony.com/blog/the-30-most-useful-symfony-bundles-and-making-them-even-better

http://knpbundles.com/antimattr/GoogleBundle

debugger:
php composer.phar require "elao/web-profiler-extra-bundle" "~2.3@dev"

call api:
http://knpbundles.com/LeaseWeb/LswApiCallerBundle

ApiBundle:
st ApiBundle-----------
http://welcometothebundle.com/symfony2-rest-api-the-best-2013-way/
php composer.phar require "friendsofsymfony/rest-bundle" "@dev"
php composer.phar require "jms/serializer-bundle" "@dev"
php composer.phar require "nelmio/api-doc-bundle" "@dev"

php composer.phar require liip/hello-bundle:dev-master

http://symfony.com/doc/master/bundles/FOSRestBundle/index.html
http://symfony.com/doc/current/bundles/FOSRestBundle/7-manual-route-definition.html
https://github.com/nelmio/NelmioApiDocBundle/blob/master/Resources/doc/index.md


php app/console doctrine:generate:entity --entity=DaoApiBundle:Page --format=annotation --fields="title:string(255) body:text" --no-interaction
php app/console doctrine:schema:update --force
php app/console doctrine:generate:form DaoApiBundle:Page --no-interaction
ed ApiBundle-----------

EasyAdminBundle: http://level7systems.co.uk/en/symfony2-admin-panel-in-30-seconds/
st EasyAdminBundle--------------------
php composer.phar require "javiereguiluz/easyadmin-bundle" "~1.0"
php composer.phar require "friendsofsymfony/user-bundle" "~2.0@dev"
php composer.phar require "stof/doctrine-extensions-bundle" "~1.1@dev"
php composer.phar require "vich/uploader-bundle" "^0.14.0"
php composer.phar require "cocur/slugify" "dev-master"
php composer.phar require "liip/imagine-bundle" "dev-master"
php composer.phar require "doctrine/doctrine-fixtures-bundle" "dev-master"

required configuration
framework:
    translator: { fallback: "%locale%" }

php app/console doctrine:database:create
php app/console doctrine:schema:create
php app/console doctrine:schema:update --force
    
php app/console fos:user:create admin admin@level7systems.co.uk admin
php app/console fos:user:promote admin ROLE_ADMIN

php app/console assets:install --symlink

php app/console doctrine:fixtures:load
ed EasyAdminBundle--------------------

FrontendBundle:
st FrontendBundle---------------------
debug code:
https://github.com/raulfraile/LadybugBundle
Extra Form : Captcha GD, Tinymce, Recaptcha, JQueryDate, JQueryAutocomplete, JQuerySlider, JQueryFile, JQueryImage
https://github.com/genemu/GenemuFormBundle


http://kipalog.com/posts
http://jquery-spellchecker.badsyntax.co/ckeditor.html
ed FrontendBundle---------------------