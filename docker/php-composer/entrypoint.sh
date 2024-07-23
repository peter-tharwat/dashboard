#!/bin/sh

while true; do


  sleep 60

  # Path to the composer.json file
  COMPOSER_JSON_PATH="/var/www/html/${DOMAIN_NAME}/composer.json"

  # Path to store the hash of the last composer.json
  HASH_FILE="/var/www/configs/${DOMAIN_NAME}/composer_json_hash/.composer_json_hash"

  # Compute the current hash of the composer.json file
  CURRENT_HASH=$(md5sum "$COMPOSER_JSON_PATH" | awk '{ print $1 }')

  #AUTO_LOADER="/var/www/html/vendor/autoload.php"
  
  # Check if vendor exists
  #if [ -f "$AUTO_LOADER" ]; then
    # Check if the hash file exists
  if [ -f "$HASH_FILE" ]; then
    # Read the previous hash
    PREVIOUS_HASH=$(cat "$HASH_FILE")

    # Compare the current hash with the previous hash
    if [ "$CURRENT_HASH" = "$PREVIOUS_HASH" ]; then
      echo "composer.json has not changed. Skipping composer install."
      continue
    fi
  fi
  #fi
  # If the hash file does not exist or the hashes are different, run composer install
  echo "composer.json has changed. Running composer install."
  composer update --ignore-platform-reqs

  # Update the hash file with the current hash
  echo "$CURRENT_HASH" > "$HASH_FILE"



  
done