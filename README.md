## TO INSTALL THIS PROJECT (UBUNTU LTS 20.04 +)

1. INTALL DOCKER
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
2. INSTALL LANDO
    ```
    wget https://files.lando.dev/installer/lando-x64-stable.deb
    sudo dpkg -i lando-x64-stable.deb
    ```

3. RUN PROJECT (PROJECT ROOT)
    ```
    lando start
    ```

*PRONTO, AMBIENTE OK*

**CRIANDO UM NOVO SITE**
4. CREATE SITE (PROJECT ROOT)
    ```
    lando site-create <nome do site>
    ```
*SIGA AS ORIENTAÇÕES DO PROMPT, CONFIRA O ARQUIVO lando.yml, CASO O SITE NÃO ESTEJA NO PROXY, SIGA O PASSO A SEGUIR*

5. ADD SITE INTO A .LANDO.YML (PROJECT ROOT)
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
