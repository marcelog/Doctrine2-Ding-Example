#!/bin/bash

root=$(readlink -f `dirname ${0}`/..)
. ${root}/config/cli.properties

${bin}/run.sh setup/doctrine ${@}

