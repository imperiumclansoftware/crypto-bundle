# CryptoBundle developpement instructions
    ## Install an host symfony framework
    ### Use Symfony installer
    ```bash
    symfony new --full <your directory>
    ```
    ### Use Composer
    ```bash
    composer create-project symfony/website-skeleton <your directory>
    ```
    ## Append this bundle repository
    ```json
    // host app composer.json
    {
    "repositories": [
        {
            "type": "path",
            "url": "D:\\Developpement\\crypto-bundle\\"
        }
    ]
}
    ```## Install Bundle
    ```bash
    composer require ics/crypto-bundle
    ```
    