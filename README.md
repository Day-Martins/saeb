## TO INSTALL THIS PROJECT (UBUNTU LTS 20.04 +)

1. INSTALL PHP 8.2
    ```
    sudo apt update && apt upgrade -y
    sudo add-apt-repository ppa:ondrej/php
    sudo apt update
    sudo apt install php8.2 -y
    sudo apt-get install -y php8.2-cli 8.2-fpm 8.2-mysql 8.2-gd 8.2-soap 8.2-mbstring 8.2-bcmath 8.2-common 8.2-xml 8.2-curl 8.2-imagick 8.2-zip 8.2-redis 8.2-intl 8.2-xmlrpc 8.2-dev
    ```
2. INTALL DOCKER
    ```
    sudo apt install apt-transport-https ca-certificates curl software-properties-common
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
    sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu focal stable"
    apt-cache policy docker-ce
    sudo apt install docker-ce
    sudo systemctl status docker
    sudo usermod -aG docker ${USER}
    su - ${USER}
    groups
    ```
3. INSTALL LANDO
    ```
    wget https://files.lando.dev/installer/lando-x64-stable.deb
    sudo dpkg -i lando-x64-stable.deb
    ```
4.  INSTALL COMPOSER
    ```
    sudo apt update
    sudo apt install php-cli unzip
    cd ~
    curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
    HASH=`curl -sS https://composer.github.io/installer.sig`
    echo $HASH
    php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
    ```
5. CHANGE PERMISSIONS ON SITES PATH
    ```
    sudo chmod -R 755 <diretorio onde ficarão os sites>
    ```

6. RUN PROJECT (PROJECT ROOT)
    ```
    lando start
    ```

7. CREATE SITE (PROJECT ROOT)
    ```
    lando site-create <nome do site>
    ```

8. MOVE SITE (PROJECT ROOT)
    ```
    sudo sh scripts/move-site <nome do site>
    ```

9. ADD SITE INTO A .LANDO.YML (PROJECT ROOT)
    ```
    Adicione a url do novo site no arquivo .lando.yml na raiz do seu projeto:
    .
    .
    .
    proxy:
        appserver:
            - saeb.multisite.local
            - setre.multisite.local
            - <novosite>.multisite.local  #<--- Insira aqui
    ```



**UTILS**
https://docs.lando.dev/drupal/getting-started.html
https://drushcommands.com
https://www.drush.org/12.x/

# qintess/multisite
