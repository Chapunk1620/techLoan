#!/bin/bash

# Get current date for backup file name
DATE=$(date +%Y-%m-%d_%H-%M-%S)

# Get the desktop path for the current user
DESKTOP_PATH="db-backup"

# Database credentials from .env file
DB_HOST=$(grep DB_HOST .env | cut -d '=' -f2)
DB_DATABASE=$(grep DB_DATABASE .env | cut -d '=' -f2)
DB_USERNAME=$(grep DB_USERNAME .env | cut -d '=' -f2)
DB_PASSWORD=$(grep DB_PASSWORD .env | cut -d '=' -f2)

# Create backups directory on desktop if it doesn't exist
mkdir -p "$DESKTOP_PATH/database_backups"

# Get the MySQL container name
MYSQL_CONTAINER=$(docker ps --format '{{.Names}}' | grep mysql)

# Create backup using docker exec
echo "Creating backup of $DB_DATABASE..."
docker exec $MYSQL_CONTAINER mysqldump \
    -h$DB_HOST \
    -u$DB_USERNAME \
    -p$DB_PASSWORD \
    $DB_DATABASE > "$DESKTOP_PATH/database_backups/$DB_DATABASE-$DATE.sql"

# Compress the backup
echo "Compressing backup file..."
gzip "$DESKTOP_PATH/database_backups/$DB_DATABASE-$DATE.sql"

echo "Backup completed: $DESKTOP_PATH/database_backups/$DB_DATABASE-$DATE.sql.gz"

# Optional: Remove backups older than 30 days
find "$DESKTOP_PATH/database_backups" -name "*.gz" -type f -mtime +30 -delete