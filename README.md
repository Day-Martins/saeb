## TO INSTALL THIS PROJECT (UBUNTU LTS 20.04 +)

1. INSTALL PHP 8.1
    ```
    sudo add-apt-repository -y ppa:ondrej/php
    sudo apt update -y
    sudo apt upgrade -y    
    sudo apt install -y nginx
    sudo apt install -y -q php8.1-cli
    sudo apt install -y -q php8.1-fpm
    sudo apt install -y -q php8.1-mysql
    sudo apt install -y -q php8.1-gd
    sudo apt install -y -q php8.1-soap
    sudo apt install -y -q php8.1-mbstring
    sudo apt install -y -q php8.1-bcmath
    sudo apt install -y -q php8.1-common
    sudo apt install -y -q php8.1-xml
    sudo apt install -y -q php8.1-curl
    sudo apt install -y -q php8.1-imagick
    sudo apt install -y -q php8.1-zip
    sudo apt install -y -q php8.1-redis
    sudo apt install -y -q php8.1-intl
    sudo apt install -y -q php8.1-xmlrpc
    sudo apt install -y -q php8.1-dev
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
