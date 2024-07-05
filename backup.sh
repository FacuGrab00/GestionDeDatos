#!/bin/bash

# Obtener la ruta absoluta del directorio actual
SCRIPTPATH="$( cd "$(dirname "$0")" >/dev/null 2>&1 ; pwd -P )"

# Cargar variables del archivo .env si existe en la raíz del proyecto
ENV_FILE="$SCRIPTPATH/.env"
if [ -f "$ENV_FILE" ]; then
    source "$ENV_FILE"
else
    echo "Error: Archivo $ENV_FILE no encontrado en la raíz del proyecto."
    exit 1
fi

# Verificar que todas las variables necesarias estén definidas
if [ -z "$USER_BACKUP" ] || [ -z "$DB_DATABASE" ] || [ -z "$MYSQL_PASSWORD" ]; then
    echo "Error: Algunas variables en el archivo .env no están definidas."
    exit 1
fi

# Generar nombre de archivo de backup
DATE=$(date '+%Y-%m-%d_%H-%M-%S')
BACKUP_DIR="/home/$USER/"
FILENAME="$BACKUP_DIR/$DATABASE-backup-$DATE.sql"

# Comando para realizar el backup
mysqldump -u $USER -p$MYSQL_PASSWORD $DATABASE > $FILENAME

# Verificar si el backup se realizó exitosamente
if [ $? -eq 0 ]; then
    echo "Backup de la base de datos $DATABASE realizado correctamente en: $FILENAME"
else
    echo "Error al realizar el backup de la base de datos $DATABASE"
fi
