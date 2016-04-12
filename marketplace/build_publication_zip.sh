#!/bin/sh
# Builds a Google Apps Marketplace publication ZIP

APPNAME='php-marketplace-sso'

SCRIPT=$(readlink -f "$0")
SCRIPTPATH=$(dirname "$SCRIPT")

# Regenerate icons
cd ${SCRIPTPATH}/icons
./render_png.sh

# Build ZIP
cd ${SCRIPTPATH}
zip --filesync --recurse-paths ${APPNAME}.zip --exclude=*.sh --exclude=*.git* --exclude=*.svg --exclude=assets/* .
