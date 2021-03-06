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

# The first argument is the php script to run (the stub). 
if [ ${#@} -lt 1 ]; then
    echo "Missing php script name"
    exit 254
fi

# Remove the first argument, we're going to use it.
stub=${1}
shift

# Invoke php with our custom ini file and include path,
# passing every other argument in the command line to the
# stub.
${phpexec} ${bin}/${stub}.php ${@}
