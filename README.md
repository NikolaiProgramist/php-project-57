# Task Manager

[![Actions Status](https://github.com/NikolaiProgramist/php-project-57/actions/workflows/hexlet-check.yml/badge.svg)](https://github.com/NikolaiProgramist/php-project-57/actions) [![lint](https://github.com/NikolaiProgramist/php-project-57/actions/workflows/lint.yml/badge.svg)](https://github.com/NikolaiProgramist/php-project-57/actions/workflows/lint.yml) [![tests](https://github.com/NikolaiProgramist/php-project-57/actions/workflows/tests.yml/badge.svg)](https://github.com/NikolaiProgramist/php-project-57/actions/workflows/tests.yml) [![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=NikolaiProgramist_php-project-57&metric=security_rating)](https://sonarcloud.io/summary/new_code?id=NikolaiProgramist_php-project-57) [![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=NikolaiProgramist_php-project-57&metric=sqale_rating)](https://sonarcloud.io/summary/new_code?id=NikolaiProgramist_php-project-57) [![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=NikolaiProgramist_php-project-57&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=NikolaiProgramist_php-project-57)
[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=NikolaiProgramist_php-project-57&metric=coverage)](https://sonarcloud.io/summary/new_code?id=NikolaiProgramist_php-project-57) [![Bugs](https://sonarcloud.io/api/project_badges/measure?project=NikolaiProgramist_php-project-57&metric=bugs)](https://sonarcloud.io/summary/new_code?id=NikolaiProgramist_php-project-57) [![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=NikolaiProgramist_php-project-57&metric=code_smells)](https://sonarcloud.io/summary/new_code?id=NikolaiProgramist_php-project-57) [![Duplicated Lines (%)](https://sonarcloud.io/api/project_badges/measure?project=NikolaiProgramist_php-project-57&metric=duplicated_lines_density)](https://sonarcloud.io/summary/new_code?id=NikolaiProgramist_php-project-57)

**See the web service:** [Task Manager](https://php-project-57-xp8o.onrender.com).

## Setup

Download this project:

```shell
git clone https://github.com/NikolaiProgramist/php-project-57.git
cd php-project-57
```

### Docker

Uncommiting database variables, and set driver to the `pgsql` in the `.env.example`:

```text
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres
DB_PASSWORD=password
```

Run `docker-compose.yml`:

```shell
docker compose up
```

Follow this link: http://localhost:8000

### Without docker

```shell
make setup
```

Follow this link: http://localhost:8000
