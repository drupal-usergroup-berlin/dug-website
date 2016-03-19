# Anleitung zur Installation

Dieses Projekt verwendet das Projekt-Template von
http://github.com/drupal-composer/drupal-project


Systemvoraussetzungen:
- git
- composer
- drush
- mysql o. andere DB

Installation auf einem lokalen Webserver

1. repo clonen
git clone git@github.com:drupal-usergroup-berlin/dug-website.git

2. im Root-Verzeichnis ausführen:
composer install

3. default.settings.local.php umbenennen in settings.local.php und die Einträge für die Datenbankverbindung anpassen.

4. im Ordner /web folgendes ausführen:
drush custom-site-install -y

5. im Ordner /web folgendes ausführen:
drush upwd admin --password=admin
