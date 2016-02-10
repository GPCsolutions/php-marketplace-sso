#!/bin/sh
# Builds a Google Apps Marketplace publication ZIP

SCRIPT=$(readlink -f "$0")
SCRIPTPATH=$(dirname "$SCRIPT")

# Regenerate icons
cd ${SCRIPTPATH}/icons
./render_png.sh

# Build ZIP
cd ${SCRIPTPATH}
zip --filesync --recurse-paths php-marketplace-sso.zip --exclude=*.sh --exclude=*.git* --exclude=*.svg .
