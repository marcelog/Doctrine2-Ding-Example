#!/bin/bash

root=$(readlink -f `dirname ${0}`/..)
. ${root}/config/cli.properties

eval ${bin}/run.sh setup/doctrine ${@}

