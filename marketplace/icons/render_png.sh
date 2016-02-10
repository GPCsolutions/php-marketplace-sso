#!/bin/sh
# Renders png icons at specified sizes from svg source

SIZES=( 128 96 48 32 16 )

for size in "${SIZES[@]}"
do
    inkscape -z -e ${size}.png -w ${size} -h ${size} icon.svg
done
