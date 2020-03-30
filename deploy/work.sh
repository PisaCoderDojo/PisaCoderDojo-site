#!/bin/sh
set -e

### Configuration ###

APP_DIR=$1
GIT_URL=https://github.com/PisaCoderDojo/PisaCoderDojo-site.git
RESTART_ARGS=

### Automation steps ###
TMP=/tmp/dojo-site

set -x

# Pull latest code
if ! [ -e "$APP_DIR" ]; then
  echo "ERROR: install wordpress first"
fi

git clone "$GIT_URL" "$TMP"
cd "$TMP"
cp -r themes/dojo-wp-theme "$APP_DIR/wp-content/themes/"
cp -r legacy_api "$APP_DIR/"
rm -r "$TMP"
