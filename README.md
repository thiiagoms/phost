<div align="center">
    <a href="https://github.com/thiiagoms/phost">
        <img src="assets/elephant.png" alt="Logo" width="80" height="80">
    </a>
    <h3 align="center">Create virtual hosts with PHost :elephant:</h3>
    <p float="left">
        <img
            src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"
            alt="PHP"
        >
    </p>
</div>

Simple CLI tool designed to simplify the process of creating and managing virtual host configurations on a local development environment. It provides a convenient way to set up virtual hosts for web projects, making it easier to access them through custom domain names.

- [Dependencies](#Dependencies)
- [Install](#Install)
- [Run](#Run)

### Dependencies :heavy_plus_sign:
* PHP 8.1+
* Composer or Docker

### Install :package:

01 -) Clone:
```bash
$ git clone https://github.com/thiiagoms/phost
```

02 -) Change to `phost` directory:
```bash
$ cd phost
phost $
```

03 -) Install dependencies with `composer` package manager:
```bash
phost $ composer install
```

### Run :runner:

01 -) Give `phost` permissions:
```bash
phost $ chmod +x phost
```

02 -) Run `phost` with **sudo**:
```bash
phost $ ./phost

  ██████╗ ██╗  ██╗ ██████╗ ███████╗████████╗
  ██╔══██╗██║  ██║██╔═══██╗██╔════╝╚══██╔══╝
  ██████╔╝███████║██║   ██║███████╗   ██║ 
  ██╔═══╝ ██╔══██║██║   ██║╚════██║   ██║ 
  ██║     ██║  ██║╚██████╔╝███████║   ██║
  ╚═╝     ╚═╝  ╚═╝ ╚═════╝ ╚══════╝   ╚═╝
  
  [*] Author: Thiago AKA thiiagoms
  [*] Version: 1.1
        
>>> domain:
>>> extension: 
```


### Bonus:

01 -) Run lint:
```bash

phost $ composer phpcs
```

02 -) Run tests:
```bash
phost $ composer test
```
