#!/bin/bash

# Get our base directory (the one where this script is located)
me=$(dirname ${0})
root=${me}/..
root=`cd ${root}; pwd`

# Try to include the well known config file.
configFile=${root}/config/cli.properties

if [ ! -f ${configFile} ]; then
    echo Missing $configFile
    exit 254
fi

. ${root}/config/cli.properties

eval ${bin}/run.sh setup/doctrine ${@}

