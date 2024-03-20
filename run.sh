#!/bin/bash
php spark cache:clear &&
php spark db:seed DropAllTablesSeeder &&
php spark migrate --all &&
php spark db:seed AvegaCms\\Database\\Seeds\\AvegaCmsInstallSeeder &&
php spark cache:clear